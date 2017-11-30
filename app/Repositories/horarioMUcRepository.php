<?php

namespace App\Repositories;

use App\Models\horarioMUc;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class horarioMUcRepository
 * @package App\Repositories
 * @version November 3, 2017, 1:41 pm UTC
 *
 * @method horarioMUc findWithoutFail($id, $columns = ['*'])
 * @method horarioMUc find($id, $columns = ['*'])
 * @method horarioMUc first($columns = ['*'])
*/
class horarioMUcRepository extends BaseRepository
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
        return horarioMUc::class;
    }
}
