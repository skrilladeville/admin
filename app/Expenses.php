<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'expenses_log';
    protected $casts = [
        'created_at' => 'date:Y F d'
    ];

    /**
     * Accessor to get the name associated with the Office_id.
     *
     * @param  string  $value
     * @return string
     */
    public function getOfficeIdAttribute($value)
    {
        return 'Office No. '. ($value);
    }

    /**
     * Accessor to get the name associated with the Account_id.
     *
     * @param  string  $value
     * @return string
     */
    public function getAccountIdAttribute($value)
    {
        $name = array(
            1 => 'Estrella Salud',
            2 => 'Karl Pero Mamani',
            3 => 'Jenevive Cudis Hernando',
            4 => 'Ruselle Salivedo',
            5 => 'Isidore Quinto Oriel',
            6 => 'Ashley Greenberg',
            7 => 'John Clark Descartin Cinco',
            8 => 'Hazel Relativo'
        );

        return $name[$value]. ' Account';
    }

    /**
     * Accessor to get the name associated with the Category_id.
     *
     * @param  string  $value
     * @return string
     */
    public function getCategoryIdAttribute($value)
    {
        $name = array(
            1 => 'Venue',
            2 => 'Human Resource',
            3 => 'Utility',
            4 => 'Repair',
            5 => 'Equipment',
            6 => 'Accident',
            7 => 'Sponsorship/Charity',
            8 => 'Event',
            9 => 'Promo',
            10 => 'Beauty',
            11 => 'Errand',
            12 => 'Misc',
            13 => 'Food',
            14 => 'Fun',
            15 => 'Maintenance',
            16 => 'Trip'
        );

        return $name[$value];
    }

    /**
     * Accessor to get the name associated with the Staff_id.
     *
     * @param  string  $value
     * @return string
     */
    public function getStaffIdAttribute($value)
    {
        $name = array(
            1 => 'Estrella Salud',
            2 => 'Karl Pero Mamani',
            3 => 'Jenevive Cudis Hernando',
            4 => 'Ruselle Salivedo',
            5 => 'Isidore Quinto Oriel',
            6 => 'Ashley Greenberg',
            7 => 'John Clark Descartin Cinco',
            8 => 'Hazel Relativo'
        );

        return $name[$value];
    }
}