<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Election;

use App\User;

use Carbon\Carbon;
use DateTime;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   $elections=Election::where('user_id',Auth::user()->id)->latest()->paginate(5);
        return view('creater-home',compact('elections'));
    }



     public function electionStatus(User $user)
     {
          
          foreach(Election::where('user_id',$user->id)->where('status',1)->cursor() as $election){
                     
                     if(Carbon::create($election->end_date)->lessThan(now())){

                         $election->update([
                           
                           'status'=>false,

                         ]);


                    return $election->status;


                     }





          }






     }

}
