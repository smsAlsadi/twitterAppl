<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function create()
{

    return view('emails.email');
}
public function sendEmail(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'subject' => 'required',
        'content' => 'required',
    ]);

    $data = [
        'subject' => $request->subject,
        'email' => $request->email,
        'content' => $request->content
    ];
    $to_name = $data['subject'];
    $to_email = $data['email'];
    // $data = array('name'=>"Ogbonna Vitalis(sender_name)", "body"=> "A test mail");
    Mail::send('emails.content', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
        ->subject($to_name);
        $message->from('omaralsadi86@gmail.com','Test Mail');
    // });
    
    });
    return back()->with(['message' => 'Email successfully sent!']);
}
}
