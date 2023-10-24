<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::query()->get();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required'
        ]);

        Category::query()->create([
           'name' => $request->name,
           'parent_id' => $request->parent_id ?? null
        ]);

        session()->flash('success', 'Success');

        return redirect(route('admin.category.index'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $category->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id ?? null
        ]);

        session()->flash('success', 'Success');

        return redirect(route('admin.category.index'));
    }

    public function destroy(Category $category)
    {
        $category->delete();

        session()->flash('success', 'Success');

        return redirect(route('admin.category.index'));
    }
}
