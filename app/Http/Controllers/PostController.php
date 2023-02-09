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
       ->latest()
       ->paginate(5);

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

    
    function updateStory(Request $req)
    {
        $req->validate([
            'id' => 'required',
            'blogger_id' => 'required',
            'title' => 'required|min:3|max:50',
            'discription' => 'required|min:3|max:150',
            'category' => 'required|min:3|max:50',
            'story' => 'required|min:3|max:5000'
        ]);

        $story = Post::find($req->id);
        $story->blogger_id = $req->blogger_id;
        $story->title = $req->title;
        $story->discription = $req->discription;
        $story->category = $req->category;
        $story->story = $req->story;

        $story->save();

        return redirect('editStory/'.$req->id)->with('message','Story updated successfully !');
    }
}
