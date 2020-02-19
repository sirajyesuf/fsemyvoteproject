<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

route::fallback(function(){

	return abort(404);

});

//email
Route::get('/email', function() {
    return view('email');
});

//frontpage
route::get('/','WelcomeController@index');
//auth
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/election_status_home/{user}', 'HomeController@electionStatus')->name('home.election.status');

//myprofile

Route::prefix('profile')->middleware(['auth'])->group(function(){
 
route::get('/{user}','ProfileController@index')->name('index');
route::get('setting/{user}','ProfileController@edit')->name('setting');
route::patch('/{user}/update','ProfileController@update')->name('updat
	e');
route::get('/changepwdform','ProfileController@chngpwdform')->name('xx');
route::patch('/pwdchanged/{user}','ProfileController@updatepwd')->name('updatepwd');
});

//for admin

//for creater
   //to create election
route::prefix('create_election')->group(function(){

route::get('/{user}','ElectionController@index')->name('election.index');
route::post('/search','ElectionController@search')->name('election.search');
route::post('/store_db_ele/{id}','ElectionController@store')->name('createelection');
route::get('/e_dashboard/{election}','ElectionController@show')->name('electiondashboard');
//election setting
route::get('ele_setting/{election}','EsettingController@index')->name('esetting.index');
route::post('update_general/{election}','EsettingController@updategeneral')->name('election.update.general');
route::post('ele_message/{election}','EsettingController@setMessage')->name('election.setmessage');
route::post('ele_date_update/{election}','EsettingController@updatedate')->name('date.update');
route::delete('delete/{election}','EsettingController@destroy')->name('delete.election');
//scoreboard
route::get('/scoreboard/{election}','ScoreboardController@index')->name('election.scoreboard.index');

//add candidate
route::get('/addcandidate/{election}','CandidateController@index')->name('addcandidate');
route::post('/store_to_db/{election}','CandidateController@store')->name('storecandidate');

route::get('/listofcandidate/{election}','CandidateController@show')->name('listofcandidate');
route::get('/detail_candidate/{candidate}/{election}','CandidateController@detail')->name('detailofcandidate');
route::delete('/delete_the_candidate/{candidate}/{election}','CandidateController@destroy')->name('delete_candidate');
route::get('/edit_candidate/{candidate}/{election}','CandidateController@edit')->name('candidate.edit');
route::patch('/update/{candidate}/{election}','CandidateController@update')->name('candidate.update');

route::get('/result/{election}','ResultController@index')->name('election.result');
route::get('/result_show/{result}','ResultController@result')->name('election.result.show');
route::get('/result_print/{result}','ResultController@print')->name('election.result.print');

route::get('/moreinfo/{candidate}','CandidateController@moreinfo')->name('candidate.moreinfo');

//add voters

route::get('/add_voters/{election}','VoterController@index')->name('voter.index');
route::post('/store_to_db_voter/{election}','VoterController@store')->name('voter.store');
route::get('listofvoters/{election}','VoterController@show')->name('voters.show');
route::delete('delete-voter/{voter}/{election}','VoterController@destroy')->name('delete.voter');
route::post('search_voter/{election}','VoterController@search')->name('voter.search');




});

//for launch election

route::prefix('launch')->group(function(){
	route::get('/{election}','LaunchController@index')->name('launch.index');
	route::get('/confirm/{election}','LaunchController@firstconfirm')->name('first.confirm');
	route::get('/confirm_last/{election}','LaunchController@lastconfirm')->name('last.confirm');
	route::get('/cancel_election/{election}','LaunchController@cancel')->name('cancel.election');

	route::get('/left_time/{election}','LaunchController@lefttime')->name('election.lefttime');



});

//for private voter

route::prefix('vote_election')->group(function(){
	route::get('login_form/{election}','Auth\VoterLoginController@ShowLoginForm')->name('voter.welcome');

	route::post('login_voter/{election}','Auth\VoterLoginController@Login')->name('voter.login');
	//ajax
	route::get('election_status/{election}','Auth\VoterLoginController@electionStatus')->name('election.status');

	route::get('/voter/{election}','VoterHomeController@index')->name('voter.home');

	route::get('/scoreboard/{election}','VoterHomeController@scoreboard')->name('voter.scoreboard');

	route::post('/vote/{election}/{candidate}/{id?}','ScoreboardController@vote')->name('scoreboard.vote');



});

//for public voter
route::prefix('public')->group(function(){

route::get('/{election}','PublicElectionController@index')->name('voters.public.index');
route::get('/scoreboard/{election}','PublicElectionController@scoreboard')->name('voters.public.scoreboard');
route::post('/signuptovote/{election}','PublicElectionController@singup')->name('signuptovote');
route::get('/vote_for_public_election/{public_voter}/{election}','PublicElectionController@vote')->name('vote_for_public_election')->middleware('signed');
route::get('/left_time/{election}','PublicElectionController@lefttime')->name('public.election.lefttime');


});



//contactus
route::prefix('contactus')->group(function(){

route::get('/','ContactusController@index')->name('contactus.index');
route::post('/send_message','ContactusController@store')->name('contactus.store');

});



	
