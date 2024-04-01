<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
   public function index()
{
    $categories = Category::all();

    return view('admin.categories.index', compact('categories'));
}

public function create()
{
    return view('admin.categories.create');
}

public function store(Request $request)
{
    Category::create($request->all());
    return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
}

public function show(Category $category)
{
//    return view('admin.articles.show', compact('article'));
}

public function edit(Article $category)
{
//    return view('admin.articles.edit', compact('article'));
}

public function update(Request $request, Category $category)
{
    $category->update($request->all());
//    return redirect()->route('admin.articles.index')->with('success', 'Article updated successfully.');
}

//public function destroy(Article $article)
//{
//    $article->delete();
//    return redirect()->route('admin.articles.index')->with('success', 'Article deleted successfully.');
//}

}
