<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    //
    protected $table = 'skills';

    public function skills(){
        return $this->belongsToMany('App\User','users_skills','user_id','skill_id');
    }

   /* public function users(){
        return $this->belongsToMany('App\User','users_skills','user_id','skill_id');
    }*/
}
