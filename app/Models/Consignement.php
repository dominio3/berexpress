<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Consignement",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="document",
 *          description="document",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="line01",
 *          description="line01",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="line02",
 *          description="line02",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="line03",
 *          description="line03",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="line04",
 *          description="line04",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="line05",
 *          description="line05",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="total_price",
 *          description="total_price",
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
class Consignement extends Model
{
    use SoftDeletes;

    public $table = 'consignements';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'document',
        'line01',
        'line02',
        'line03',
        'line04',
        'line05',
        'total_price',
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
        'document' => 'string',
        'line01' => 'integer',
        'line02' => 'integer',
        'line03' => 'integer',
        'line04' => 'integer',
        'line05' => 'integer',
        'total_price' => 'float',
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
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function line01()
    {
        return $this->belongsTo(\App\Models\Order::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function line02()
    {
        return $this->belongsTo(\App\Models\Order::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function line03()
    {
        return $this->belongsTo(\App\Models\Order::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function line04()
    {
        return $this->belongsTo(\App\Models\Order::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function line05()
    {
        return $this->belongsTo(\App\Models\Order::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function moveTasks()
    {
        return $this->hasMany(\App\Models\MoveTask::class);
    }
}
