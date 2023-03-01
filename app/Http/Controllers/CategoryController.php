<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CatageoryRequest;
use App\Models\Article;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::paginate(5);
        return view('admin.categories.index', compact('categories'));
    }


    public function create(){
        return view('admin.categories.create');
    }

    public function store(CatageoryRequest $request){

        Category::create([
            'name' => $request->name,
            'user_id' => Auth::id()
        ]);

        return redirect()->back()->with('success', 'Catégorie créé avce succès.');
    }

    public function edit(Category $categorie){

        return view('admin.categories.edit', compact('categorie'));
    }

    public function updated(Category $categorie, CatageoryRequest $request){
        $categorie->name = $request->name;
        $categorie->user_id = Auth::id();
        $categorie->save();
        return redirect()->route('category')->with('success', 'Catégorie modifié avec succès.');
    }

    public function delete(Category $categorie){
        $categorie->delete();
        return redirect()->back()->with('warning', 'Catégorie supprimée avec succès.');
    }

    public function showByCategorie(Category $categorie){
        // Article::paginate(5);
        return view('articles.showByCategory', compact('categorie'));
    }
}
