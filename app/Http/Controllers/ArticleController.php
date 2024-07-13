<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return response()->json($articles);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $article = new Article();
        $article->title = $request->input('title');
        $article->url = $request->input('url');
        $article->save();
        return response()->json(['article' => [$article->title, $article->url]]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $article = Article::find($request->route('article_id'));
        $article->title = $request->input('title');
        $article->url = $request->input('url');
        $article->save();
        return response()->json(['article' => [$article->title, $article->url]]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $article = Article::find($request->route('article_id'));
        $article->delete();
        return response()->json(['article_id' => [$request->route('article_id')]]);
    }
}
