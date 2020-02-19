<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUs;

class ContactusController extends Controller
{
    public function index()
    {
    	
 return view('contactus.contactus');


    }


public function store(Request $request)
{
  $this->validate($request,[

 'content'=>'required|string',
 'fullname'=>'required|string',
 'email'=>'required|string|email',
 'subject'=>'required|string',

  ]);



ContactUs::create([

'fullname'=>request('fullname'),
'email' =>request('email'),
'subject'=>request('subject'),
'content'=>request('content'),
'status'=>false,




]);



return back()->withSuccess('the Message is successfully send.');





}


}
