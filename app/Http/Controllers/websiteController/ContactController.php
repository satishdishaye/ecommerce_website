<?php

namespace App\Http\Controllers\websiteController;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendContactMail;
use App\Models\Subscriber;


class ContactController extends Controller
{
    public function contact(Request $request)
    {
         return view("website.contact");
    }


    public function sendContact(Request $request)
    {
        $request->validate([
            "name"=>'required|string',
            "email"=>'required',
            "message"=>'required',

        ]);

        $email=$request->email;
        $name=$request->name;
        $message=$request->message;


       
    try {
        Mail::to('satishdishaye952@gmail.com')->send(new SendContactMail($name, $email, $message));
        return redirect()->back()->with(['success' => "Your message has been sent successfully!"]);
        } catch (\Exception $e) 
        {
        return redirect()->back()->with(['error' => "Failed to send your message. Please try again later."]);
       }

    }



    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email'
        ]);

        Subscriber::create([
            'email' => $request->email
        ]);
        return redirect()->back()->with('success', 'You have successfully subscribed to our newsletter!');
    }
}
