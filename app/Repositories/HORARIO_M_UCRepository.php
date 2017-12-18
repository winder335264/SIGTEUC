<?php

namespace App\Repositories;

use App\Models\HORARIO_M_UC;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class HORARIO_M_UCRepository
 * @package App\Repositories
 * @version December 11, 2017, 11:28 pm UTC
 *
 * @method HORARIO_M_UC findWithoutFail($id, $columns = ['*'])
 * @method HORARIO_M_UC find($id, $columns = ['*'])
 * @method HORARIO_M_UC first($columns = ['*'])
*/
class HORARIO_M_UCRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idRuta',
        'Horas',
        'bus'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return HORARIO_M_UC::class;
    }
}
