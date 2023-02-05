<?php

use App\Http\Controllers\BloggerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscriberController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, 'getData']);

Route::post('subscribe',[SubscriberController::class, 'subscribe']);

Route::post('addBlogger',[BloggerController::class, 'addBlogger']);

Route::post('addStory',[BloggerController::class, 'addStory']);

Route::get('addBlogger', function(){
    if(session()->has('email')){
        session()->pull('email');
    }
    return view('addBlogger');
});

Route::get('/login', function(){
    if(session()->has('email')){
        return redirect('profile');
    }
    return view('login');
});

Route::get('/logout', function(){
    if(session()->has('email')){
        session()->pull('email');
    }
    return redirect('login');
});

Route::post("login",[BloggerController::class, 'bloggerLogin']);

Route::get ("/profile",[BloggerController::class, 'getBlogger']);

Route::get('fullStory/{id}',[BloggerController::class, 'showData']);
