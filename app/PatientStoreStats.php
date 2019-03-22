<?php

namespace App;

use App\PatientList;
use Illuminate\Database\Eloquent\Model;

class PatientStoreStats extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'patient_store_stats';

    /**
     * Get the user that owns the stat.
     */
    public function patient()
    {
        return $this->belongsTo('App\PatientList');
    }

    /**
     * Accessor to get the name associated with the product id.
     *
     * @param  string  $value
     * @return string
     */
    public function getPatientIdAttribute($value)
    {
        $patient = PatientList::find($value);

        if( $patient )
            return ucwords($patient->lastname. ', ' .$patient->firstname);
        else
            return '(Failed to get name)';
    }
}
