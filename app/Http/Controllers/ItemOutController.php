<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemsOutRequest;
use App\Models\ItemOut;
use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // jika user adalah admin, tampilkan semua data
        if (Auth::user()->hasRole('admin')) {
            $itemsOut = ItemOut::with('item')->paginate(10);
        } else {
            // jika user bukan admin, tampilkan data sesuai user yang login
            $itemsOut = ItemOut::where('user_id', Auth::user()->id)->with('item')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        return view('dashboard.itemsOut.index', compact('itemsOut'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //ambil item yang ada di database dan ambil id dan name
        $items = Items::pluck('name', 'id');
        //mengembalikan view create dengan data items
        return view('dashboard.itemsOut.create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemsOutRequest $request)
    {
        // Ambil data yang sudah tervalidasi
        $data = $request->validated();

        // Cari item berdasarkan ID yang dipilih
        $item = Items::findOrFail($data['item_id']);

        // Cek apakah stock mencukupi
        if ($item->stock < $data['quantity']) {
            // Kembali dengan pesan error jika stock tidak mencukupi
            return back()->with('error', 'Stock tidak mencukupi.');
        }

        // Kurangi stock item
        $item->stock -= $data['quantity'];

        // Simpan perubahan stock
        $item->save();

        // Simpan data item keluar
        ItemOut::create($data);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('dashboard.itemsOut.index')
            ->with('success', 'Item berhasil ditambah dan stock berhasil diperbarui.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ItemOut $itemOut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemOut $itemsOut)
    {
        //
        $items = Items::pluck('name', 'id');
        return view('dashboard.itemsOut.edit', compact('itemsOut', 'items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemsOutRequest $request, ItemOut $itemsOut)
    {
        // Ambil data yang sudah tervalidasi
        $data = $request->validated();

        // Cari item yang terkait dengan data yang akan diupdate
        $item = Items::findOrFail($data['item_id']);

        // Hitung selisih jumlah yang lama dengan yang baru
        $oldQuantity = $itemsOut->quantity;

        // Cek jika ada perubahan jumlah
        if ($oldQuantity != $data['quantity']) {
            // Jika jumlah berubah, perbarui stok dengan menambahkan stok yang dikeluarkan sebelumnya
            $item->stock += $oldQuantity; // Kembalikan stok yang sebelumnya keluar

            // Kurangi stok dengan jumlah yang baru
            $item->stock -= $data['quantity'];

            // Pastikan stok cukup sebelum menyimpan perubahan
            if ($item->stock < 0) {
                // Jika stok tidak mencukupi, kembalikan dengan pesan error
                return back()->with('error', 'Stock tidak mencukupi untuk jumlah yang diubah.');
            }

            // Simpan perubahan stok
            $item->save();
        }

        // Perbarui data item keluar
        $itemsOut->update($data);


        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('dashboard.itemsOut.index')->with('success', 'Item berhasil diupdate dan stok berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemOut $itemsOut)
    {
        //
        // dd($itemsOut->id);
        $itemsOut->delete();
        return redirect()->route('dashboard.itemsOut.index')->with('success', 'Item Berhasil dihapus.');
    }
}
