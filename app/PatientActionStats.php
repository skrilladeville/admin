<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientActionStats extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'patient_action_stats';
    protected $casts = [
        'date' => 'date:Y F d'
    ];
}
