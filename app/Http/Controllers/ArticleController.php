<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;


class ArticleController extends Controller
{
    public function index()
{
    $articles = Article::all();
    return view('admin.articles.index', compact('articles'));
}

  public function indexGuest()
{
    $articles = Article::all();
     $categories = Category::all();
    return view('articles.index', compact('articles','categories'));
}

  public function indexGuestcategory($category)
{
    $articles = Article::where('category','=',$category)->get();

     $categories = Category::all();
    return view('articles.articlescategory', compact('articles','categories'));
}

public function showGuest(Article $article)
{
    $categories = Category::all();
    
    return view('articles.show', compact('article','categories'));
}



public function create()
{
 $categories = Category::all();

    return view('admin.articles.create', compact('categories'));
}

public function store(Request $request)
{
    Article::create($request->all());
    return redirect()->route('admin.articles.index')->with('success', 'Article created successfully.');
}

public function show(Article $article)
{
    return view('admin.articles.show', compact('article'));
}

public function edit(Article $article)
{

    $categories = Category::all();

    return view('admin.articles.edit', compact('article','categories'));
}

public function update(Request $request, Article $article)
{
    $article->update($request->all());
    return redirect()->route('admin.articles.index')->with('success', 'Article updated successfully.');
}

public function destroy(Article $article)
{
    $article->delete();
    return redirect()->route('admin.articles.index')->with('success', 'Article deleted successfully.');
}

}
