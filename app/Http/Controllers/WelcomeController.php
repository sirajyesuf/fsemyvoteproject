<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Election;
use App\PublicElection;


class WelcomeController extends Controller
{
    


public function index()
{

   
$public_elections=Election::where('typeof_election',1)->where('end_date','>',now())->where('status',1)->paginate(3);


return view('welcome',compact('public_elections'));


}


















}
