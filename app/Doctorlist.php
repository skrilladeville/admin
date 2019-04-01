<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Doctorlist
 *
 * @package App
 * @property string $first_name
 * @property string $last_name
 * @property string $license_no
 * @property string $license_expiration
*/
class Doctorlist extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['first_name', 'last_name', 'license_no', 'license_expiration'];
    

    public static function storeValidation($request)
    {
        return [
            'first_name' => 'max:191|required',
            'last_name' => 'max:191|required',
            'license_no' => 'max:191|required|unique:doctorlists,license_no',
            'license_expiration' => 'date_format:' . config('app.date_format') . '|max:191|required'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'first_name' => 'max:191|required',
            'last_name' => 'max:191|required',
            'license_no' => 'max:191|required|unique:doctorlists,license_no,'.$request->route('doctorlist'),
            'license_expiration' => 'date_format:' . config('app.date_format') . '|max:191|required'
        ];
    }

    

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setLicenseExpirationAttribute($input)
    {
        if ($input) {
            $this->attributes['license_expiration'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        }
    }

    /**
     * Get attribute from date format
     * @param $output
     *
     * @return string
     */
    public function getLicenseExpirationAttribute($output)
    {
        if ($output) {
            return Carbon::createFromFormat('Y-m-d', $output)->format(config('app.date_format'));
        }
    }
    
    
}
