<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $guarded = [];

    public function patientProfile()
    {
        return $this->belongsTo('App\ProfilePatient');
    }

    public function doctorProfile()
    {
        return $this->belongsTo('App\ProfileDoctor');
    }
}
