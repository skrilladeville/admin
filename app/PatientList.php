<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientList extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'patient_profiles';
    protected $appends = array('name');


    /**
     * Accessor to get the fulle name associated with the name.
     *
     * @param  string  $value
     * @return string
     */
    public function getNameAttribute($value)
    {
        return $this->lastname. ', ' .$this->firstname . ' / ' .$this->health_card ;
    }
}