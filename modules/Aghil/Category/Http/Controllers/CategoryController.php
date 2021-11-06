<?php

namespace Aghil\Category\Http\Controllers;

use Aghil\Category\Http\Requests\CategoryRequest;
use Aghil\Category\Models\Category;
use App\Http\Controllers\Controller;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('Categories::index', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        Category::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'parent_id' => $request->parent_id,
        ]);
        return back();
    }

    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('Categories::edit', compact('category', 'categories'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'parent_id' => $request->parent_id,
        ]);
        return back();
    }

    public function destroy(Category $category)
    {
//        $category->delete();
        return response()->json(['message' => 'عملیات با موفقیت انجام شد.'], status: \Illuminate\Http\Response::HTTP_OK);
    }
}
