<?php

namespace App\Repositories;

use App\Models\horarioUcM;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class horarioUcMRepository
 * @package App\Repositories
 * @version November 3, 2017, 1:39 pm UTC
 *
 * @method horarioUcM findWithoutFail($id, $columns = ['*'])
 * @method horarioUcM find($id, $columns = ['*'])
 * @method horarioUcM first($columns = ['*'])
*/
class horarioUcMRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idRuta',
        'horas',
        'bus'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return horarioUcM::class;
    }
}
