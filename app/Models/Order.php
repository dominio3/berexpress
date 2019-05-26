<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Order",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="date",
 *          description="date",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="services_id",
 *          description="services_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="origin",
 *          description="origin",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="destination",
 *          description="destination",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="distance",
 *          description="distance",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="contact_name",
 *          description="contact_name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="contact_phone",
 *          description="contact_phone",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="rain",
 *          description="rain",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="bulk",
 *          description="bulk",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="observations",
 *          description="observations",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="subtotal",
 *          description="subtotal",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="status",
 *          description="status",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="users_id",
 *          description="users_id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class Order extends Model
{
    use SoftDeletes;

    public $table = 'orders';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'date',
        'services_id',
        'origin',
        'destination',
        'distance',
        'contact_name',
        'contact_phone',
        'takes',
        'rain',
        'bulk',
        'observations',
        'subtotal',
        'status',
        'users_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'date' => 'date',
        'services_id' => 'integer',
        'origin' => 'integer',
        'destination' => 'integer',
        'distance' => 'float',
        'contact_name' => 'string',
        'contact_phone' => 'string',
        'rain' => 'string',
        'bulk' => 'integer',
        'observations' => 'string',
        'subtotal' => 'float',
        'status' => 'string',
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function service()
    {
        return $this->belongsTo(\App\Models\Service::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function origin()
    {
        return $this->belongsTo(\App\Models\Location::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function destination()
    {
        return $this->belongsTo(\App\Models\Location::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function consignements()
    {
        return $this->hasMany(\App\Models\Consignement::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/

}
