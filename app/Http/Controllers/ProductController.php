<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()
            ->whereHas('category', function ($q) {
                $q->whereNull('deleted_at');
            })->get();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::query()->statusActive()->get();

        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        $pathImage = $image->move('images', time().$image->getClientOriginalName());

        Product::query()->create([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $pathImage
        ]);

        session()->flash('success', 'Success');

        return redirect(route('admin.product.index'));
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        $product->delete();
        session()->flash('success', 'Success');

        return redirect(route('admin.product.index'));
    }
}
