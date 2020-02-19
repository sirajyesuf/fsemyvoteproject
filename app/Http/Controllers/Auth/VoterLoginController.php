<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Election;
use App\Voter;
use Auth;
use Carbon\Carbon;
use DateTime;
use Hash;
use DB;

class VoterLoginController extends Controller
 {  

 	
     public function __construct()
     {
         $this->middleware('guest:voter')->except("logout");

    }


    public function ShowLoginForm(Election $election)

    {

  $message="this election is scheduled to start on ".Carbon::create($election-> start_date)->toDayDateTimeString();
            if(now()->lessThanOrEqualTo(Carbon::create($election->start_date))){
                        
                 return view('voters.login',['election'=>$election,'message'=>$message]);     

                    }

              
                                                                          
          
       return view('voters.login',['election'=>$election]);


     }






     




public function Login(Request $request,Election $election)
{



  $this->validate($request,[
            
             'vid'=>'required|string',
             'key'=>'required|string',


     ]);


  if(!now()->lessThanOrEqualTo(Carbon::create($election->start_date))){
            



    if($election->status){




if(Voter::where('election_id',$election->id)->get()->count() )
    {







             if(Auth::guard('voter')->attempt(['vid'=>request('vid'),'password'=>request('key'),'election_id'=>$election->id])){
       
  
                                     

            
            return  redirect()->intended(route('voter.home',['election'=>$election->id]));
           
    
    }


                         else{


 return back()->withErrors(request()->only('vid'));
                    
                    }


      
       }


    

    



        


    }


    else{


 return back()->withErrors("the election that you need is not live now.sorry!");
  
    }
    
}

else{

return  back()->withErrors("THE ELECTION  WILL START ".Carbon::create($election->start_date)->diffForHumans(now())."  NOW PLS COME BACK AT THAT  TIME.");

}





 

}


public function electionStatus(Election $election)
{   

  
 

if(Carbon::create($election->end_date)->lessThan(now())  ){
             
    

      Election::where('id',$election->id)->update([
             
              'status'=>false,
     

      ]);



        }






}


}