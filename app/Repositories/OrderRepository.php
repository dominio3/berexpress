<?php

namespace App\Repositories;

use App\Models\Order;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class OrderRepository
 * @package App\Repositories
 * @version June 6, 2019, 6:47 pm -03
 *
 * @method Order findWithoutFail($id, $columns = ['*'])
 * @method Order find($id, $columns = ['*'])
 * @method Order first($columns = ['*'])
*/
class OrderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        'priority',
        'observations',
        'subtotal',
        'status',
        'users_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Order::class;
    }
}
