<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    protected $guarded=[];

    public function candidates(){
     
  return $this->hasMany('App\Candidate');

    }
}
