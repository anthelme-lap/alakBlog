<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $articles = Article::paginate(5);
        $categories = Category::all();

        return view('accueil',[ 'articles' => $articles,'categories' => $categories,]);
    }

    public function detail(Article $article, Request $request){
        
        // liste des catégories
        $categories = Category::all();
        
        // liste des articles ayant la meme catégorie
        $article_by_category = Article::where('category_id', $article->category->id)->get();

        $comments = DB::table('comments')->get();

        // foreach ($article->comments as  $comment) {
        //    dd($comment->content);
        // }

        
        return view('articles.detail', [
            'article' => $article,
            'categories' => $categories,
            'article_by_category' => $article_by_category,
            'comments' => $comments,
        ]);
    }

    public function comment(Request $request){

        $request->validate([
            'content' => 'required'
        ]);

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->article_id = $request->article_id;
        $comment->user_id =Auth::id();

        $comment->save();

        return redirect()->back()->with('success', 'ok pour commentaire');

    }

   
}
