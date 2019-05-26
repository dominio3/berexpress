<?php

namespace App\Repositories;

use App\Models\Location;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LocationRepository
 * @package App\Repositories
 * @version May 26, 2019, 1:34 pm -03
 *
 * @method Location findWithoutFail($id, $columns = ['*'])
 * @method Location find($id, $columns = ['*'])
 * @method Location first($columns = ['*'])
*/
class LocationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Configure the Model
     **/
    public function model()
    {
        return Location::class;
    }
}
