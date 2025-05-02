<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemsInRequest;
use App\Models\ItemIn;
use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemInController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        if (Auth::user()->role == 'admin') {
            $itemsIn = ItemIn::paginate(10);
        } else {
            $itemsIn = ItemIn::where('user_id', Auth::user()->id)->paginate(10);
        }
        return view('dashboard.itemsIn.index', compact('itemsIn'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $items = Items::pluck('name', 'id');
        return view('dashboard.itemsIn.create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemsInRequest $request)
    {
        $data = $request->validated();

        // Cek jika item_id ada dan valid
        $item = Items::findOrFail($data['item_id']);

        // Jika diperlukan, bisa menambah logika penyesuaian stok atau lainnya.
        // Misalnya, menambah stok barang yang masuk
        $item->stock += $data['quantity']; // Menambahkan jumlah barang ke stok

        // Simpan perubahan stok barang
        $item->save();

        // Simpan data ItemIn
        ItemIn::create($data);

        return redirect()->route('dashboard.itemsIn.index')->with('success', 'Item berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ItemIn $itemIn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemIn $itemsIn)
    {
        $items = Items::pluck('name', 'id');
        return view('dashboard.itemsIn.edit', compact('itemsIn', 'items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemsInRequest $request, ItemIn $itemsIn)
    {
        // Ambil data yang sudah tervalidasi
        $data = $request->validated();

        // Cari item berdasarkan ID yang dipilih
        $item = Items::findOrFail($data['item_id']);

        // Hitung selisih jumlah yang lama dengan yang baru
        $oldQuantity = $itemsIn->quantity;

        // Cek jika ada perubahan jumlah
        if ($oldQuantity != $data['quantity']) {
            // Jika jumlah berubah, perbarui stok dengan mengurangi stok yang sebelumnya masuk
            $item->stock -= $oldQuantity; // Kembalikan stok yang sebelumnya masuk

            // Tambah stok dengan jumlah yang baru
            $item->stock += $data['quantity'];

            // Simpan perubahan stok
            $item->save();
        }

        // Perbarui data ItemIn
        $itemsIn->update($data);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('dashboard.itemsIn.index')->with('success', 'Item berhasil diupdate dan stok berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemIn $itemsIn)
    {
        //
        // dd($itemsIn->id);
        $itemsIn->delete();
        return redirect()->route('dashboard.itemsIn.index')->with('success', 'Item Berhasil dihapus.');
    }
}
