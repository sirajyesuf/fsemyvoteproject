<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Election;
use App\Candidate;
use App\Voter;
use Auth;
class VoterHomeController extends Controller
{      
    public function __construct()
    {
        $this->middleware('auth:voter');
    }



    public function index(Election $election)
    {


        if($election->status){

$candidates=Candidate::where('election_id',$election->id)->get();



        return view('voters.home',compact('candidates','election'));

        }

        else{


Auth::guard('voter')->logout();


        }

              

        


    }


  public function scoreboard(Election $election)
  {
  	

    if($election->status){

      $candidates=Candidate::where('election_id',$election->id)->get()->sortByDesc('vote');
  $sum_vote=Candidate::where('election_id',$election->id)->sum('vote');

  return view('voters.scoreboard',compact('candidates','sum_vote'));
    

    }
  
else{

abort(404);
}


  }


}
