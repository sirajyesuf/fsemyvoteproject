<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Election;
use App\Candidate;
use App\PublicElection;
use App\Mail\Public_mail;
use Mail;
use URL;
use Carbon\Carbon;
use DB;


class PublicElectionController extends Controller
{
    




public function index(Election $election){


if($election->status){

return view('voters.public.index',['candidates'=>Candidate::where('election_id',$election->id)->get(),'election'=>$election]);


         }


  abort(404);







 }



 public function scoreboard(Election $election)
 {
   

   if($election->status){


        return view('voters.public.scoreboard',['candidates'=>Candidate::where('election_id',$election->id)->get()->sortByDesc('vote'),'election'=>$election,'sum_vote'=>Candidate::where('election_id',$election->id)->sum('vote')]);



   }
     abort(404);



 }



//to ensure whate ..........

 public function singup(Request $request,Election $election)
  
 {
 	

$this->validate($request,[
  'email'=>'required|string|email'


]);



foreach(PublicElection::where('election_id',$election->id)->get() as $voter){
            if(request('email')==$voter->email){
                  
               return back()->withErrors("this email is taken!");

               
              
            }

}



$public_voter=PublicElection::create([
'email'=>request('email'),
'election_id'=>$election->id,


]);
// dump($election->id);

// dump($public_voter->id);


$public_voter_id1=DB::table('public_elections')->where('election_id',$election->id)->where('email',request('email'))->value('id');

// dump($public_voter_id1);

$end_date=Carbon::create($election->end_date);
$diff_date=$end_date->diffInMinutes(now());
$url=URL::temporarySignedRoute('vote_for_public_election',now()->addMinutes($diff_date),['public_voter'=>DB::table('public_elections')->where('election_id',$election->id)->where('email',request('email'))->value('id'),'election'=>$election->id]);

mail::to(request('email'))->send(new Public_mail($url));

  return back()->withSuccess('the link is send successfully pls check ur email.');


 }


 public function vote(PublicElection $public_voter,Election $election)

 {

 
 $canvote=true;

   
return view('voters.public.index',['candidates'=>Candidate::where('election_id',$election->id)->get(),'election'=>$election,'canvote'=>$canvote,'public_voter'=>$public_voter]);


 }

 public function lefttime(Election $election)
 {
  return now()->diffAsCarboninterval($election->end_date);
  

}


}
