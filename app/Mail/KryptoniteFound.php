<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Symfony\Component\HttpFoundation\Request;

class KryptoniteFound extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'ignore@batcave.io';
        $name = 'Ignore Me';
        $subject = 'Krytonite Found';

        return $this->view('contact.form')
            ->from($address, $name)
            ->cc($address, $name)
            ->bcc($address, $name)
            ->replyTo($address, $name)
            ->subject($subject);


    }

    public function buildd(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'subject'=>'subject',
            'email'=>'email',
            'content'=>'content',
        ],[
            'title.required'=>'titre requis',
            'subject.required'=>'sujet requis',
            'email.required'=>'email.requis',
            'content.required'=>'message requis',
        ]
            );

    }
}
