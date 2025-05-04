<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Categories::paginate(10);
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        //
        Categories::create($request->validated());

        return redirect()->route('dashboard.categories.index')->with('success', 'Category Berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $categories) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $category)
    {
        //
        return view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Categories $category)
    {
        // Validasi input dan update data kategori
        $category->update($request->validated());

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('dashboard.categories.index')
            ->with('success', 'Category Berhasil Diupdate.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $category)
    {
        //
        $category->delete();
        return redirect()->route('dashboard.categories.index')->with('success', 'Category Berhasil dihapus.');
    }
}
