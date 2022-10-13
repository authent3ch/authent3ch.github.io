<?php

namespace App\Http\Controllers;

use App\Mail\SocialMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mail;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }


    public function socialPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required|max:20',
            'email'=>'required|email',
            'message'=>'required|min:10',
        ]);
        if ($validator->fails()) {
            return redirect('/#contact')
                ->withErrors($validator)
                ->withInput();
        } else {
            Mail::to('authent3ch@gmail.com')->send(new SocialMail($request));
            return redirect('https://techtok.lol/youtube');
        }
    }
}
