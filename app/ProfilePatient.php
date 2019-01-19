<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfilePatient extends Model
{
    public function feedbacks()
    {
        return $this->hasMany('App\Feedback');
    }
}
