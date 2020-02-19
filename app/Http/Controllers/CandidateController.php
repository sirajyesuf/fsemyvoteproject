<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Gate;
use App\Candidate;
use App\Election;

class CandidateController extends Controller
{
    

    public function __construct()
    
    {
        // $this->middleware('auth');
    }



    public function index(Election $election)
    {      
        return view('creater.candidate.index',compact('election'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Election $election)
    {      
        
            $this->validate(request(),[
           'title'=>'required|string|min:5',
           'description'=>'required|string|max:150',
           'logo'=>'required|file|image',
           
        ]);

                


    try {

  // Create a new SimpleImage object
  $image = new \claviska\SimpleImage();

  
  $image->fromFile(request('logo'))->resize(200, 200)->toFile(request('logo'));                       
    

} catch(Exception $err) {
  
}


     $candidate= Candidate::create([

         'title'=>request('title'),
         'description'=>nl2br(request('description'),False),
         'election_id'=>$election->id,
         'user_id'=>Auth::id(),
         'logo'=>request()->logo->store('logo','public'),

         ]);


     

    

      
   

return  redirect()->back()->withSuccess('the candidate  is successfully created.');




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Election $election)
    {

    $listofcandidates=Candidate::where('election_id',$election->id)->paginate(2);
    return view('creater.candidate.listofcandidate',compact('listofcandidates','election'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate,Election $election)
    {
      return view('creater.candidate.edit',compact('candidate','election'));
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Candidate $candidate,Election $election)
    {
        
        $request->validate([

           'title'=>'string|max:255',
           'description'=>'nullable|string',
           'logo'=>'nullable|file|image',
         
                  ]);
        $this->authorize('update',$candidate);

        if(request()->hasFile('logo') and request()->filled('description') ){

                    $cand=Candidate::where('id',$candidate->id)->where('election_id',$election->id)->update([
              'title'=>request('title'),
              'description'=>request('description'),
              'logo'=>request('logo')->store('logo','public'),
          ]);

        }

        if(request()->filled('description')){

            $cand=Candidate::where('id',$candidate->id)->where('election_id',$election->id)->update([
              'title'=>request('title'),
              'description'=>request('description'),



        ]);

        }

        if(request()->hasFile('logo') ){

             $cand=Candidate::where('id',$candidate->id)->where('election_id',$election->id)->update([
              'title'=>request('title'),
              'logo'=>request('logo')->store('logo','public'),]);
        }

if(request()->has('title') ){

             $cand=Candidate::where('id',$candidate->id)->where('election_id',$election->id)->update([
              'title'=>request('title'),]);
        }

        
       



         return redirect(route('listofcandidate',['election'=>$election->id]))->withSuccess('the candidate successfully update!');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate,Election $election)
    {    
        
        $this->authorize('delete',$candidate);
           
    Candidate::where('id',$candidate->id)->where('election_id',$election->id)->delete();

    return redirect(route('listofcandidate',['election'=>$election->id]))->withSuccess('the candidate successfully deleted!');
    
        

    }
    public function detail(Candidate $candidate,Election $election)
    {
        
             $this->authorize('view',$candidate);

        return view('creater.candidate.detail',compact('candidate','election'));
    }

public function moreinfo(Candidate $candidate)
{
    return view('creater.candidate.moreinfo',compact('candidate'));
}


    
}
