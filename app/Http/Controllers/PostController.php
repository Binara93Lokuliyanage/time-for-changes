<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    //
    function getData(){
        $collection = Post::limit(5)
        ->latest()
        ->get();
        return view('home', ['collection'=>$collection]);
    }

    function myPosts(){
        if(session()->has('email')){
            $blogger = session('blogger_id');

       $data = DB::table('posts')
       ->where('blogger_id', $blogger)
       ->get();

       return view('myPosts', compact('data'));
        } else {
            return redirect('/login');
        }
    }

    function showData($id){
        $data = Post::where('id',$id)
        ->get();
        return view('editStory', ['data' => $data[0]]);
    }
}
