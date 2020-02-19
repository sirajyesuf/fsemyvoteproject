<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Election;
use App\Result;
use App\Allcandidates;
use Auth;

class ResultController extends Controller
{
   
public function index(Election $election)
{

	$results=Result::where('election_id',$election->id)->get()->sortBYDesc('created_at');



	
	return view('creater.result.index',compact('election','results'));
}

public function result(Result $result)
{


$election=$result;
$token=$election->election_token;
$user=Auth::user();
$now=now()->toDateString();


$candidates=Allcandidates::where('batch',$result->id)->get()->sortByDesc('vote');

$sum_ofvote=Allcandidates::where('batch',$result->id)->sum('vote');

	return view('creater.result.show',compact('election','candidates','user','sum_ofvote','now','token'));


}

public function print(Result $result)
{

$election=$result;


$user=Auth::user();

$candidates=Allcandidates::where('batch',$result->id)->get();

$sum_ofvote=Allcandidates::where('batch',$result->id)->sum('vote');

	return view('creater.result.print',compact('election','candidates','user','sum_ofvote'));




}





















}
