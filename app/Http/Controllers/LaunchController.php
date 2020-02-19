<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\sendEmailForVoters;
use Carbon\Carbon;
use DateTime;
use Auth;
use Illuminate\Support\Str;
use App\Events\EmailForVoters;
use URL;

use App\Election;
use App\Candidate;
use App\Voter;
use App\Result;
use App\Allcandidates;
class LaunchController extends Controller
{
    
public function index(Election $election)
{   
   $start_date=Carbon::create($election->start_date)->toDayDateTimeString();
  
   $end_date=Carbon::create($election->end_date)->toDayDateTimeString();

  $firstconfirmstart="firstconfirmstart";   

  return view('creater.launch.index',compact('firstconfirmstart','election','start_date','end_date'));
      
}

public function firstconfirm(Election $election)
{
	 $now=Carbon::now();
	
 if(Carbon::create($election->end_date)>$now){
  $firstconfirm="firstconfirm";
  $candidates=Candidate::where('election_id',$election->id)->where('user_id',Auth::id())->get();
  $number_voter=Voter::where('election_id',$election->id)->where('user_id',Auth::id())->get()->count();
  return view('creater.launch.index',compact('election','firstconfirm','number_voter','candidates'));

 }

else{

return back()->withErrors('the  start date and end date of the election is in the past pls change it.');

}


}

public function lastConfirm(Election $election)
{



  $num_candidate=Candidate::where('election_id',$election->id)->where('user_id',Auth::id())->get()->count();
  $num_voter=Voter::where('election_id',$election->id)->where('user_id',Auth::id())->get()->count();
  

  if($num_candidate > 0){


    if(!$election->typeof_election){
      if($num_voter>0){


              //launch private election

    

      foreach (Voter::where('election_id', $election->id)->where('user_id',Auth::id())->cursor() as $voter) {

$giventime=Carbon::create($election->end_date)->diffInMinutes(now())+60;
// $url= URL::temporarySignedRoute('voter.welcome',now()->addMinutes($giventime),["election"=>$election->id]);
$url1=url(route('voter.welcome',['election'=>$election->id]));

$user_email=Auth::user()->email;

$voter_email=$voter->email;
            
event(new EmailForVoters($url1,$user_email,$voter_email,$voter->key,$voter->vid));
        
 Voter::where('election_id', $election->id)->where('user_id',Auth::id())->update([

 'vote'=>false,

 ]);

}


 $start_date=Carbon::create($election->start_date);
  
 $end_date=Carbon::create($election->end_date);

 if(now()->diffInMinutes($start_date,false)<0){

  //change the status of the election

 Election::where('id',$election->id)->where('user_id',Auth::id())->update([
  'status'=>true,
  'url'=>$url1,

 ]);



     //launch in two minute
 


 return redirect(route('electiondashboard',['election'=>$election->id]))->withSuccess("the election is started");

 }


 else{

  //above 2 min

  //change the status of the election

 Election::where('id',$election->id)->where('user_id',Auth::id())->update([
  'status'=>true,
  'url'=>$url1
 ]);



    
 


 return redirect(route('electiondashboard',['election'=>$election->id]))->withSuccess("the election will start after  ".now()->DiffAsCarbonInterval($election->start_date));
          

 }



  


      }

      else{

    return back()->withErrors("pls add atleast 1 voter ");

      }



    }
   else{
            //launch public election
            // dump("public launch");

  Election::where('id',$election->id)->where('user_id',Auth::id())->update([
  'status'=>true,
  
 ]); 

  if(now()->DiffInMinutes(Carbon::create($election->start_date),false)<0){
    return redirect(route('electiondashboard',['election'=>$election->id]))->withSuccess("the election is started");

  }

  else{
    return redirect(route('electiondashboard',['election'=>$election->id]))->withSuccess('the election will  start after  '.now()->DiffAsCarbonInterval($election->start_date));
  }
            




    }
  }
  else{
  return back()->withErrors("pls add atleast 1 candidate");

  }

  




}




public function cancel(Election $election)
{

Election::where('id',$election->id)->where('user_id',Auth::id())->update([
    'status'=>false,

]);

// transfer the data to the result table  and allcandidates table

$result=Result::create([

 'title'=>$election->title,
 'description'=>$election->description,
 'start_date'=>$election->start_date,
 'end_date'=>$election->end_date,
 'user_id'=>Auth::id(),
 'election_id'=>$election->id,
 'election_token'=>str::random(20),
 

 ]);


$candidates=Candidate::where('election_id',$election->id)->where('user_id',Auth::id())->get();


foreach ($candidates as $candidate) {

  Allcandidates::create([
 'title'=>$candidate->title,
 'description'=>$candidate->description,
 'logo'=>$candidate->logo,
 'vote'=>$candidate->vote,
 'batch'=>$result->id,


]);


}

Candidate::where('election_id',$election->id)->where('user_id',Auth::id())->update([
'vote'=>0,

]);



// foreach(Voter::where('election_id',$election->id)->cursor() as $voter){
//   Auth::voter()->logout();



// }





return back()->withSuccess("the election is successfully canceled.");



}



public function lefttime(Election $election)
 {


if(now()->greaterThanOrEqualTo(Carbon::create($election->start_date)))
{

  if(now()->greaterThanOrEqualTo(Carbon::create($election->end_date))){

Election::where('id',$election->id)->where('user_id',Auth::id())->update([
   'status'=>false,
]);


}

else{

 return now()->diffAsCarbonInterval($election->end_date);

}


}




else{

  


  return  1;

}








}



}

