<?php

namespace App\Http\Controllers;

use App\Models\Blogger;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class BloggerController extends Controller
{
    function addBlogger(Request $req)
    {
        $req->validate([
            'firstName' => 'required|min:3|max:14',
            'lastName' => 'required|min:3|max:14',
            'nickName' => 'required|min:3|max:14',
            'city' => 'required|min:3|max:50',
            'email' => 'required|email:strict|unique:users',
            'password' => ['required','confirmed','max:14',
                            Password::min(6) 
                            ->letters()
                            ->mixedCase()
                            ->numbers()
                            ->symbols()]
        ]);

        $pw = $req['password'];
        $encrypted = crypt::encryptString($pw);

        $blogger = new Blogger;
        $blogger->firstName = $req->firstName;
        $blogger->lastName = $req->lastName;
        $blogger->nickName = $req->nickName;
        $blogger->city = $req->city;
        $blogger->email = $req->email;
        $blogger->password = $encrypted;

        $blogger->save();

        return redirect('addBlogger')->with('message','New blogger added successfully !');
    }


    function bloggerLogin(Request $req)
    {
        // $data = $req->input();
        // $req -> session()->put('user', $data['user']);
        $req->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // return redirect('profile');
        $data = DB::table('bloggers')
            ->where('email', $req['email'])
            ->get();

        if (count($data) == 0) {
            return redirect('login')->withInput()->withErrors(['email' => 'Email is incorrect']);
        }
            $pw = $data[0]->password;
            $decrypted = crypt::decryptString($pw);

            if ($decrypted == $req['password']) {
                $sessionData = $req->input();
                $req->session()->put('email', $sessionData['email']);
                return redirect('profile');
            } else {
                return redirect('login')->withInput()->withErrors(['password' => 'Password is incorrect']);
            };
    }

    function getBlogger()
    {
        if(session()->has('email')){
            $blogger = session('email');

       $data = DB::table('bloggers')
       ->where('email', $blogger)
       ->get();

       session()->put('blogger_id', $data[0]->id);
       session()->put('firstName', $data[0]->firstName);
       session()->put('lastName', $data[0]->lastName);
       session()->put('nickName', $data[0]->nickName);
       session()->put('city', $data[0]->city);

       return view('profile', compact('data'));
        } else {
            return redirect('/login');
        }
       

    }

    function addStory(Request $req)
    {
        $req->validate([
            'blogger_id' => 'required',
            'title' => 'required|min:3|max:50|unique:posts',
            'discription' => 'required|min:3|max:150',
            'category' => 'required|min:3|max:50',
            'img' => 'required',
            'story' => 'required|min:3|max:5000'
        ]);

        $destination = 'public/images';
        $image = $req->file('img');
        $image_name = $image->getClientOriginalName();
        $image_url = $req->file('img')->storeAs($destination, $image_name);

        $story = new Post;
        $story->blogger_id = $req->blogger_id;
        $story->title = $req->title;
        $story->image = $image_name;
        $story->discription = $req->discription;
        $story->category = $req->category;
        $story->story = $req->story;

        $story->save();

        return redirect('profile')->with('message','New Story added successfully !');
    }

    function showData($id){
        $data = Post::with('blogger')
        ->where('id',$id)
        ->get();
        return view('fullStory', ['data' => $data[0]]);
    }

    function updateAccount(Request $req){
        $req->validate([
            'firstName' => 'required|min:3|max:14',
            'lastName' => 'required|min:3|max:14',
            'nickName' => 'required|min:3|max:14',
            'city' => 'required|min:3|max:50',
            'email' => 'required|email:strict|unique:users'
        ]);

        $blogger = Blogger::find($req->id);
        $blogger->firstName = $req->firstName;
        $blogger->lastName = $req->lastName;
        $blogger->nickName = $req->nickName;
        $blogger->city = $req->city;
        $blogger->email = $req->email;

        $blogger->save();

        session()->put('firstName', $blogger->firstName);
        session()->put('lastName', $blogger->lastName);
        session()->put('nickName', $blogger->nickName);
        session()->put('city', $blogger->city);
        session()->put('email', $blogger->email);

        return redirect('profile');
    }

    function forgotPw(Request $req){
        $req->validate([
            'email' => 'required|email:strict|unique:users',
            'password' => ['required','confirmed','max:14',
                            Password::min(6) 
                            ->letters()
                            ->mixedCase()
                            ->numbers()
                            ->symbols()]
        ]);

        $pw = $req['password'];
        $encrypted = crypt::encryptString($pw);

        $data = DB::table('bloggers')
        ->where('email',$req['email'])
        ->get();

        if (count($data) == 0) {
            return redirect('forgotPw')->withInput()->withErrors(['email' => 'Email is incorrect']);
        } else {
            $blogger = Blogger::find($data[0]->id);
            $blogger->password = $encrypted;

            $blogger->save();

            return redirect('login')->with('message','Password reset is successful !');
        }
    }
}
