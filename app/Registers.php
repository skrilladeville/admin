<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registers extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'registers_log';
    protected $casts = [
        'created_at' => 'date:Y F d'
    ];

    /**
     * Accessor to get the name associated with the Register id.
     *
     * @param  string  $value
     * @return string
     */
    public function getRegisterIdAttribute($value)
    {
        $clientDevice = array(
            1 => 'Samsung Galaxy Tab',
            2 => 'Customer iPad',
            3 => 'Alexa',
            4 => 'Siri',
            5 => 'iPhone X',
            6 => 'Dell Laptop',
            7 => 'Toshiba Laptop',
            8 => 'HP Laptop',
            9 => 'Compaq',
            10 => 'IBM',
            11 => 'Lenovo',
            12 => 'Xiaomi TV Box',
            13 => 'Xbox',
            14 => 'Playstation 4',
            15 => 'Apple TV',
            16 => 'Android Box'
        );

        return $clientDevice[$value];
    }

    /**
     * Accessor to get the name associated with the cashier_id.
     *
     * @param  string  $value
     * @return string
     */
    public function getCashierIdAttribute($value)
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

    /**
     * Accessor to get the name associated with the closer_id.
     *
     * @param  string  $value
     * @return string
     */
    public function getCloserIdAttribute($value)
    {
        return $this->getCashierIdAttribute($value);
    }
}