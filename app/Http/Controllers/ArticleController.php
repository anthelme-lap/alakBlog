<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Requests\ArtcleRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index(){
        $articles = Article::paginate(5);
        return view('admin/articles.index',compact('articles'));
    }

    public function create(){
        $categories = Category::all();

        return view('admin/articles.create',compact('categories'));
    }

    public function edit(Article $article){
        
        $categories = Category::all();

        return view('admin.articles.edit', [
            'categories' => $categories,
            'article' => $article
        ]);
    }

    public function updated(Article $article, Request $request){

        // dd($article);
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);

        $article->titre = $request->titre;
        $article->image = $imageName;
        $article->description = $request->description;
        $article->category()->associate($request->category_id);
        $article->user_id = Auth::id();

        $article->save();

        return redirect()->route('article')->with('success', 'Article modifié avec succès.');
    }

    public function store(ArtcleRequest $request){

        // Envoie de fichier image
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);

        // Envoie d'article lié a une categorie et user
        $article = new Article();
        $article->titre = $request->titre;
        $article->image = $imageName;
        $article->description = $request->description;
        $article->category()->associate($request->category_id);
        $article->user()->associate(Auth::id());

        $article->save();

        return redirect()->back()->with('success', 'Article créé avec succès.');
    }

    public function delete(Article $article){
        $article->delete();
        return redirect()->back()->with('warning', 'Article supprimé avec succès.');
    }
}
