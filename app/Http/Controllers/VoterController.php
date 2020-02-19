<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Gate;
use App\Election;
use App\Voter;
class VoterController extends Controller
{    
  public function __construct()
        {
        
        $this->middleware('auth');
        
        }


    public function index(Election $election)
    {
       
         

      if(Gate::allows('show-add_voter_form',$election)){

        return view('creater.voter.index',compact('election'));
        }

      abort(403);

      
    }

    public function store(Request $request,Election $election)
    {

    	        $test = Election::where( 'id', $election->id )->get()->first();
            
              if( Auth::id() != $test->user_id ){
                abort(403);
              }
          $request->validate([
            'vid'=>'required|string',

            'name'=>'required|string|max:255',

            'key'=>'required|string|max:20',

            'email'=>'required|email',

          ]);



foreach(Voter::where('election_id',$election->id)->get() as $voter){
      

          if($voter->vid==request('vid')){

        return back()->withErrors("the voter id is already taken");


                                          } 



      if($voter->email==request('email')){
           
        return back()->withErrors("the email is already taken");

                                           }



    }


        Voter::create([
          'name'=>request('name'),
          'vid'=>request('vid'),
          'password'=>Hash::make(request('key')),
          'key'=>request('key'),
          'email'=>request('email'),
          'election_id'=>$election->id,
          'user_id'=>Auth::id(),

 
        ]);

        return back()->withSuccess('the voter is successfully added');

          }






public function show(Election $election)
{      
       if(Gate::allows('show-add_voter_form',$election)){
        $voters=Voter::where('election_id',$election->id)->paginate(3);
 
      return view('creater.voter.listofvoters',compact('voters','election'));

        }
        return "dog";

	  

}
public function destroy(Voter $voter,Election $election)
{
 

  // Voter::where('id',$voter->id)->where('election_id',$election->id)->delete();
  dd($voter);

  $voter->delete();
  
  
  
}

public function search(Request $request,Election $election)
{
   
   $request->validate([
       'search'=>'required|string' 
   ]);
   $key=request('search');

   $results=Voter::query()->where('election_id',$election->id)->where('name','LIKE',"%{$key}%")->paginate(5);

  return view('creater.voter.listofvoters',compact('results','key','election'));


}

public function allow_voter_add_form($user,$election)
{
   

  if($user->id===$election->user_id){

    return true;
  }
  else{

    return false;
  }
}

}
