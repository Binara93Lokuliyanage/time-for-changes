<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\subscribe;

class SubscriberController extends Controller
{
    function subscribe(Request $req)
    {
        $req->validate([
            'name' => 'required|max:50|min:3|',
            'birth_date' => 'required|min:3|max:14',
            'email' => 'required|email:strict|unique:users'
        ]);

        $subscriber = new Subscriber;
        $subscriber->name = $req->name;
        $subscriber->birth_date = $req->birth_date;
        $subscriber->email = $req->email;

        $data = [
            'name' => $subscriber->name,
            'birth_date' => $subscriber->birth_date,
            'email' => $subscriber->email
        ];

        Mail::to($subscriber->email)->send(new subscribe($data));

        // echo $data;
        $subscriber->save();

        return redirect('/')->with('message','success');
    }
}
