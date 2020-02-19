<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Election;
use App\Candidate;
use App\Voter;
use App\PublicElection;
use DB; 
class ScoreboardController extends Controller
{
    public function index(Election $election )

    {       
    	 $sum_vote=Candidate::where('election_id',$election->id)->sum('vote');
          return view('creater.election.scoreboard',['candidates'=>Candidate::where('election_id',$election->id)->get()->sortByDesc('vote'),'election'=>$election,'sum_vote'=>$sum_vote]);

    }




public function vote(Election $election ,Candidate $candidate,$id=null)
{       

  

     $flag=1; 
   if($election->typeof_election){
   	 $flag=11;

 PublicElection::where('election_id',$election->id)->where('id',$id)->update([
  'vote'=>true,

   ]);

   }

else{

  Voter::where('id',Auth::guard('voter')->id())->update([
  'vote'=>true,

   ]);

}

DB::table('candidates')->where('id',$candidate->id)->where('election_id',$election->id)->increment('vote');

if($flag==1){
return  redirect()->back()->withSuccess("u successfully vote for ".$candidate->title);


}

else{

return  redirect()->back()->withSuccess("u successfully vote for ".$candidate->title);


}




}




}
