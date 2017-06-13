<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Article;
use Auth;
use laracasts\flash;

class CategoriesController extends Controller
{
    public function index(){

        $categories = Category::paginate(20);
        return view('categories.index',compact('categories'));
    }

    public function create(){

        return view('categories.create');
    }

    public function store(Request $request){
       
        Category::create($request->all());
        flash()->overlay('Category is add successfully Yay','Success');
        return redirect('/categories');
    }

    public function edit($id){

        $category = Category::findOrFail($id);
        return view('categories.edit',compact('category'));
    }

    public function update(Request $request, $id){

        $category = Category::findOrFail($id);
        $category->update($request->all());
        flash('category update successfully')->success();

        return redirect('/categories');
    }

    public function destroy($id){

        $articles = Article::all()->where('category_id',$id)->count();
        
        if($articles > 0){
            flash('there were a articles under this category delete thim frist')->error()->important();
            return redirect('/categories');

        }
        
        else{
            Category::destroy($id);
            flash('Category delete successfully')->warning();
            return redirect('/categories');
        }

    }

}
