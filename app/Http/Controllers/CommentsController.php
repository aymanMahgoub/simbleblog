<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;
class CommentsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }   

    public function store(Request $request)
    {
        
        Comment::create($request->all());
        if(Auth::user()->role=='visitor'){
        return redirect('visitor/articles/'.$request->article_id); 
        }
        else
        return redirect('/articles/'.$request->article_id);
    }

    public function destroy(Request $request, $id)
    {
        Comment::destroy($id);

        if(Auth::user()->role=='visitor'){
        return redirect('visitor/articles/'.$request->article_id); 
        }
        else
        return redirect('/articles/'.$request->article_id);
    }
}
