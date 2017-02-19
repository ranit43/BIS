<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VolunteeringSkill extends Model
{
    //
    protected $table = 'volunteeringskill';

    public function volunteeringskills(){
        return $this->belongsToMany('App\User','user_volunteeringskills','user_id','volunteeringskill_id');
    }
}
