<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    function getData(){
        $collection = Post::limit(5)
        ->latest()
        ->get();
        return view('home', ['collection'=>$collection]);
    }
}
