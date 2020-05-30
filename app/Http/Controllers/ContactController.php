<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use Redirect;

class ContactController extends Controller
{
    
    public function store(Request $request)
    {
        $data=$this->validate($request,[
            'name' => 'required',
            'email' => 'email|required',
            'subject' => 'required',
            'message'=>'required',
        ]);
        $message= new Contact();
        $message->name=$request->name;
        $message->email=$request->email;
        $message->subject=$request->subject;
        $message->message=$request->message;
        $message->save();
        return Redirect::to(URL::previous() . "#whatever")->with('success', 'Your Message Sent I Will Contact You Soon');

    }


    public function update(Request $request, Contact $message)
    {
        $data=$this->validate($request,[
            'name' => 'required',
            'email' => 'email|required',
            'subject' => 'required',
            'message'=>'required',
        ]);
        $message->name=$request->name;
        $message->email=$request->email;
        $message->subject=$request->subject;
        $message->message=$request->message;
        $message->save();
        return Redirect::back();   
    }

    public function destroy(Contact $message)
    {
        $message->delete();
        return Redirect::back();  
    }
    
}