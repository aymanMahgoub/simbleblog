<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\Comment;
class VisitorController extends Controller
{
    public function __construct(){

        $this->middleware('auth', ['except' => ['index', 'articleByCategory']]);
    }

    public function index(){

    	$articles = Article::where('published',1)->paginate(10);
    	$categories = Category::all();
        return view('visitor.articles',compact('articles','categories'));
    }

    public function show($id){

    	$articles = Article::findOrFail($id);        
        $comments = Comment::all()->where('article_id',$id);
        return view('visitor.showArticle',compact('articles','comments'));
    }

    public function articleByCategory(Request $requset){
        
    	$articles = Article::where('published',1)->where('category_id',$requset->category_id)->paginate(10);
    	$categories = Category::all();
        return view('visitor.articles',compact('articles','categories'));
    }

}
