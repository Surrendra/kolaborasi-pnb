<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productCategories = ProductCategory::all();
        return view('product_categories.index', compact('productCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:10',
                'unique:product_categories,name'
            ],
            'description' => 'required'
        ],[
            'name.required' => 'Kolom Nama harus diisi', 
            'name.max' => 'Kolom Nama maksimal 10 karakter',
            'name.unique' => 'Nama sudah digunakan',
        ]);
        ProductCategory::create($request->except('_token'));

        return redirect()->route('product-categories.index')
            ->with('success', 'Product category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $productCategory = ProductCategory::find($id);
        return view('product_categories.show', compact('productCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $productCategory = ProductCategory::find($id);
        return view('product_categories.edit', compact('productCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:10',
                'unique:product_categories,name,' . $id . ',id'
            ],
            'description' => 'required'
        ], [
            'name.required' => 'Kolom Nama harus diisi',
            'name.max' => 'Kolom Nama maksimal 10 karakter',
            'name.unique' => 'Nama sudah digunakan',
        ]);        

        $productCategory = ProductCategory::find($id);
        $productCategory->update($request->except('_token'));

        return redirect()->route('product-categories.index')
            ->with('success', 'Product category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ProductCategory::find($id)->delete();
        return redirect()->route('product-categories.index')
            ->with('success', 'Product category deleted successfully');
    }
}
