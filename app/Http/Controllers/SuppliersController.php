<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuppliersRequest;
use App\Models\Suppliers;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $suppliers = Suppliers::paginate(10);
        return view('dashboard.suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SuppliersRequest $request)
    {
        //
        Suppliers::create($request->validated());

        return redirect()->route('dashboard.suppliers.index')->with('success', 'Supplier Berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Suppliers $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Suppliers $supplier)
    {
        //
        return view('dashboard.suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SuppliersRequest $request, Suppliers $supplier)
    {
        //
        $supplier->update($request->validated());

        return redirect()->route('dashboard.suppliers.index')->with('success', 'Supplier Berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Suppliers $supplier)
    {
        //
        $supplier->delete();
        return redirect()->route('dashboard.suppliers.index')->with('success', 'Supplier Berhasil dihapus.');
    }
}
