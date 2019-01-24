<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileDoctor extends Model
{
    

    public function feedbacks()
    {
        return $this->hasMany('App\Feedback');
    }
}
