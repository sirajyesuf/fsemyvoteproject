<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;
use App\Election;
use App\Voter;
use App\Candidate;
use Gate;


class EsettingController extends Controller
{
	public function __construct()
    
    {
        $this->middleware('auth');
    }

    public function index(Election $election)
    { 
    	if(Gate::allows('show-election-setting',$election)){

      return view('creater.election.setting-index',compact('election'));
       
        }
        
        dd("fuck");

    }

    public function updategeneral(Request $request,Election $election)
    {


          if(Gate::allows('show-election-setting',$election)){ 
    $request->validate([
        'title'=>'required|string|max:255',
        
    ]);

       if(!request()->filled('description')){

        Election::where('id',$election->id)->where('user_id',$election->user_id)->update([

              'title'=>request('title'),

        ]);
        
         
          }
        else{

           $request->validate([
        'description'=>'required|string|max:150',
        
                 ]);

           Election::where('id',$election->id)->where('user_id',$election->user_id)->update([

              'title'=>request('title'),
              'description'=>request('description'),

        ]);


     }
        

       return back()->withSuccess('the election update successfully');
        }
    }

    public function setMessage(Request $request,Election $election)
    {
       if(Gate::allows('show-election-setting',$election)){

            $this->validate(request(),[
              'message'=>'required|string|max:150',
             ]);
dd(  request()->all());            

            return back()->withSuccess('the date of the election update successfully ');
        
          }    
              
      

    }
    public function updatedate(Request $request,Election $election)
    {          
           if(Gate::allows('show-election-setting',$election)){

            $this->validate(request(),[
              'startdate'=>'required|date|after:now',
              'enddate'=>'required|date|after:startdate',
             ]);

            $startdate=carbon::create(request('startdate'));
         
            $enddate=carbon::create(request('enddate'));


            Election::where('id',$election->id)->where('user_id',$election->user_id)->update([
               'start_date' =>$startdate,
                'end_date'  =>$enddate,

             
            ]);

            return back()->withSuccess('the date of the election update successfully ');
        
          }


    }


    public function destroy(Election $election)
    {  if(Gate::allows('show-election-setting',$election)){
    	Election::where('id',$election->id)->where('user_id',$election->user_id)->delete();
    	Voter::where('election_id',$election->id)->where('user_id',$election->user_id)->delete();
    	Candidate::where('election_id',$election->id)->delete();
    	return redirect(route('home'))->withSuccess('the election and voters belongs to the election deleted successfully');


    }

    }

    public function allow_election_setting($user ,$election)
    {
        if($user->id===$election->user_id){

        	return true;
        }

        else{

        	return false;
        }


    }
}


