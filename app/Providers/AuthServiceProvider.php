<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Policies\CandidatePolicy;
use App\Candidate;
use App\policies\VoterPolicy;
use App\Voter;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Candidate::class => CandidatePolicy::class,
        Voter::class=>VoterPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('show-election','App\Http\Controllers\ElectionController@showElectiongate');
        Gate::define('delete-candidate', 'App\Http\Controllers\CandidateController@deleteCandidategate');
        Gate::define('show-add_voter_form', 'App\Http\Controllers\VoterController@allow_voter_add_form');
        Gate::define('show-election-setting','App\Http\Controllers\EsettingController@allow_election_setting');
        
        
    }
}
