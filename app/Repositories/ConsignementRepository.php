<?php

namespace App\Repositories;

use App\Models\Consignement;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ConsignementRepository
 * @package App\Repositories
 * @version June 6, 2019, 6:52 pm -03
 *
 * @method Consignement findWithoutFail($id, $columns = ['*'])
 * @method Consignement find($id, $columns = ['*'])
 * @method Consignement first($columns = ['*'])
*/
class ConsignementRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Configure the Model
     **/
    public function model()
    {
        return Consignement::class;
    }
}
