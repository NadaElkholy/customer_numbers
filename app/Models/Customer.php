<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Helpers;

/**
 * @SWG\Definition(
 *      definition="Customer",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="phone",
 *          description="phone",
 *          type="string"
 *      )
 * )
 */
class Customer extends Model
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'customer';

    public $fillable = [
        'name',
        'phone'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'phone' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:191',
        'phone' => 'required|string|max:191'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['country', 'state', 'code', 'phone_num'];


    /**
     * Get User Country .
     *
     * @return bool
     */
    public function getCountryAttribute()
    {
        return ($this->phone)? (new Helpers(config('phones.validators')))
            ->country($this->phone) : '';
    }

    /**
     * Get User State .
     *
     * @return bool
     */
    public function getStateAttribute()
    {
        return ($this->phone)? (new Helpers(config('phones.validators')))
            ->state($this->phone) : '';
    }

    /**
     * Get User Code .
     *
     * @return bool
     */
    public function getCodeAttribute()
    {
        return ($this->phone)? (new Helpers(config('phones.validators')))
            ->code($this->phone) : '';
    }

    /**
     * Get User Phone Number .
     *
     * @return bool
     */
    public function getPhoneNumAttribute()
    {
        if(!$this->phone){
            return ' ';
        }
        $phoneArray = explode(' ', $this->phone);
        $phone_num = end($phoneArray);
        return $phone_num;
    }

    
}
