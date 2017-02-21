<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    //
    protected $table = 'papers';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
