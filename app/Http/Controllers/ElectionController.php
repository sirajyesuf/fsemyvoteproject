<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use Auth;
use Gate;
use DateTime;
use App\User;
use App\Election;
use App\Candidate;
use App\Voter;



class ElectionController extends Controller
{     

 public function ajax(Election $election)
 {
  return  carbon::create($election->start_date);

 }

    public function __construct()
    
    {
        $this->middleware('auth');
    }

   
    public function index($id)
    {

        return view('creater.election.index');
    }

    
   


    public function store(Request $request,$id)
    {     








          // if(request()->has('logo')){

          // Election::where('id',$election->id)->update([




          // ]);
          

          //  }
        
         $this->validate(request(),[
            'title'=>'required|string|min:5',
            'description'=>'required|string:max:200',
            'startdate'=>'required|date|after:now',
            'enddate'=>'required|date|after:startdate',
            'typeofelection'=>'required|boolean',
            'logo'=>'bail|required_if:typeofelection,1|image',
             
             ]);


    
          $startdate=carbon::create(request('startdate'));
       
          $enddate=carbon::create(request('enddate'));
                    
                     if(request()->has('logo')){
                  $election=Election::create([

                          'title' => request('title'),
                          'description'=>request('description'),
                          'user_id'=>$id,
                          
                          'start_date' =>$startdate,
                          'end_date'  =>$enddate,
                          
                          'typeof_election'=>request('typeofelection'),
                           'logo'=>request('logo')->store('publicelectionlogo','public'),
                          
                        ]);

                     }
                     else{

$election=Election::create([

                          'title' => request('title'),
                          'description'=>request('description'),
                          'user_id'=>$id,
                          
                          'start_date' =>$startdate,
                          'end_date'  =>$enddate,
                          
                          'typeof_election'=>request('typeofelection'),
                          
                        ]);


                     }   
                          
                       



                     $url = action('ElectionController@show', ['election'=>$election->id]);
                        
                         return redirect($url);

}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Election $election)
    {
      
    if(Gate::allows('show-election',$election)){

      $no_candidates=Candidate::where('election_id',$election->id)->get()->count();
      $no_voters=Voter::where('election_id',$election->id)->get()->count();

return view('creater.election.dashboard',compact('election','no_candidates','no_voters'));
    
       }


return "fu#k";

  

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        

       $request->validate([
         'search'=>'required|string'
       ]);
       $key=request('search');

       $results=Election::query()->where('user_id',Auth::id())->where('title','LIKE',"%{$request->input('search')}%")->get();
       
       return  view('creater-home',compact('results','key'));

    }

  public function showElectiongate($user,$election)
  {
    return $user->id===$election->user_id;

  }

}
