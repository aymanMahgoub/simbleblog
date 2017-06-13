<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Article;
use App\Category;
use App\Comment;
use App\User;
use Auth;
use laracasts\flash;

class ArticlesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');

    }

    public function index(){

        $articles = Article::paginate(10);
        return view('articles.index',compact('articles'));
    }

    public function create(){

        $categories = Category::all();
        $categoryCount = Category::all()->count();
        return view('articles.create',compact('categories','categoryCount'));
    }

    public function store(Request $request){

        Article::create($request->all());
        flash()->overlay('Article is add successfully Yay','Success');
        return redirect('/articles');
    }

    public function show($id){

        $articles = Article::findOrFail($id);
        $comments = Comment::all()->where('article_id',$id);    
        return view('articles.show',compact('articles','comments'));
    }

    public function edit($id){

        $articles = Article::findOrFail($id);
        $categories = Category::all();
        return view('articles.edit',compact('articles','categories'));
    }

    public function update(Request $request, $id){

        $articles = Article::findOrFail($id);
        if(!isset ($request->published))
            $articles->update(array_merge($request->all(), ['published' => false ]));

        else
            $articles->update($request->all());

        flash('Article edit successfully')->success();
        return redirect('/articles/'.$id);
    }

    public function destroy($id){

        Article::destroy($id);
        flash('Article delete successfully')->warning();
        return redirect('/articles');
    }

}
