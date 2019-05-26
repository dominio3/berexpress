<?php

namespace App\Repositories;

use App\Models\Service;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ServiceRepository
 * @package App\Repositories
 * @version May 26, 2019, 1:38 pm -03
 *
 * @method Service findWithoutFail($id, $columns = ['*'])
 * @method Service find($id, $columns = ['*'])
 * @method Service first($columns = ['*'])
*/
class ServiceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'description',
        'price'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Service::class;
    }
}
