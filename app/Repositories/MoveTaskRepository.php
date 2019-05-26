<?php

namespace App\Repositories;

use App\Models\MoveTask;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MoveTaskRepository
 * @package App\Repositories
 * @version May 26, 2019, 1:40 pm -03
 *
 * @method MoveTask findWithoutFail($id, $columns = ['*'])
 * @method MoveTask find($id, $columns = ['*'])
 * @method MoveTask first($columns = ['*'])
*/
class MoveTaskRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'consignement_id',
        'users_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return MoveTask::class;
    }
}
