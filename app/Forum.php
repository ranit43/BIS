<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    //
    protected $table = 'postforum';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
