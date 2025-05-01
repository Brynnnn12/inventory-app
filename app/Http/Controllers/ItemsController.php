<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemsRequest;
use App\Models\Categories;
use App\Models\Items;
use App\Models\Suppliers;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $items = Items::paginate(10);
        return view('dashboard.items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Categories::pluck('name', 'id');
        $suppliers = Suppliers::pluck('name', 'id');

        return view('dashboard.items.create', compact('categories', 'suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemsRequest $request)
    {
        //
        Items::create($request->validated());
        // dd($request->validated());
        return redirect()->route('dashboard.items.index')->with('success', 'Item Berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Items $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Items $item)
    {
        $categories = Categories::pluck('name', 'id');
        $suppliers = Suppliers::pluck('name', 'id');

        return view('dashboard.items.edit', compact('item', 'categories', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemsRequest $request, Items $item)
    {
        //
        $item->update($request->validated());
        return redirect()->route('dashboard.items.index')->with('success', 'Item Berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Items $item)
    {
        //
        $item->delete();
        return redirect()->route('dashboard.items.index')->with('success', 'Item Berhasil dihapus.');
    }
}
