<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Location",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="address",
 *          description="address",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="number",
 *          description="number",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="town",
 *          description="town",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="postal_code",
 *          description="postal_code",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="country",
 *          description="country",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="latitude",
 *          description="latitude",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="longitude",
 *          description="longitude",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="users_id",
 *          description="users_id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class Location extends Model
{
    use SoftDeletes;

    public $table = 'locations';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'description',
        'address',
        'number',
        'town',
        'postal_code',
        'country',
        'latitude',
        'longitude',
        'users_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'description' => 'string',
        'address' => 'string',
        'number' => 'integer',
        'town' => 'string',
        'postal_code' => 'string',
        'country' => 'string',
        'latitude' => 'float',
        'longitude' => 'float',
        'users_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/

}
