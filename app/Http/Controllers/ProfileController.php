<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{   

    public function __construct()
    
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
    	
    	return view('myprofile.index',compact('user'));

    }

    public function edit(User $user)
    {    
        return view('myprofile.profilesetting',compact('user'));

    }


    public function chngpwdform()
    {
       return view('myprofile.changepassword'); 
    }

    public function updatepwd(User $user)
    {   


         $this->validate(request(),[
             'currentpassword'=>'required|string|min:8',
             'password'=>'required|string|min:8|confirmed',
           
           ]);
         
         
         $hashedPassword=$user->password;
         $flag=0;

         if (Hash::check(request('currentpassword'), $hashedPassword)) {
            $user->password=hash::make(request('password'));
            $user->save();
            $flag=1;
                      
                      }

         else{

            return redirect()->back()->withErrors('Your current password does not matches with the password you provided.please try again.');
             
          }

          if($flag==1){
        return redirect(route('index',['user'=>$user->id]))->withSuccess('password changed successfully');

          }


    }

    public function update(User $user)
    {   $email=$user->email;
        if($email==request('email')){
            $user->name=request('name');
            $user->email=request('email');

            $user->save();
  
            
        }

        else{

     $this->validate(request(),[
           'name'=>'required|string|max:255',
           'email'=>'required|email|unique:users',
        ]);
        $user->name=request('name');
        $user->email=request('email');

        $user->save();
        
        


        }
 return redirect(route('index',['user'=>$user->id]))->withSuccess('ur profile successfully updated');
        
    }
}
