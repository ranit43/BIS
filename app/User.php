<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function skills(){
        return $this->belongsToMany('App\Skill','users_skills','user_id','skill_id');
    }

    public function volunteeringskill(){
        return $this->belongsToMany('App\VolunteeringSkill','user_volunteeringskill','user_id','volunteeringskill_id');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function achievements()
    {
        return $this->hasMany('App\Achievement');
    }

    public function projects()
    {
        return $this->hasMany('App\Project');
    }

    public function papers()
    {
        return $this->hasMany('App\Paper');
    }

    /*public function users(){
        return $this->belongsToMany('App\Skill','users_skills','user_id','skill_id');
    }*/

}
