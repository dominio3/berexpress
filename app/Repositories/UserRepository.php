<?php

namespace App\Repositories;

use App\Models\User;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UserRepository
 * @package App\Repositories
 * @version May 26, 2019, 1:38 pm -03
 *
 * @method User findWithoutFail($id, $columns = ['*'])
 * @method User find($id, $columns = ['*'])
 * @method User first($columns = ['*'])
*/
class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'password',
        'remember_token',
        'address',
        'number',
        'state',
        'phone',
        'role',
        'image',
        'visibility'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }
}
