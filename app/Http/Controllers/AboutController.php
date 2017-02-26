<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;


class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('isConnected');
    }
    public function create(){

        return view('about.contact');
    }

    public function store(ContactFormRequest $request){

        Mail::send('emails.contact',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'user_message' => $request->get('message')
            ), function($message)
            {
                $message->from('alexandrehamed29@gmail.com');
                $message->to('alexandrehamed@hotmail.fr', 'Admin')->subject('TODOParrot Feedback');
            });

        return\Redirect::route('contact')
            ->with('message','thanks for contacting us !');
    }
}
