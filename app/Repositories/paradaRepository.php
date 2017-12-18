<?php

namespace App\Repositories;

use App\Models\parada;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class paradaRepository
 * @package App\Repositories
 * @version November 3, 2017, 3:31 am UTC
 *
 * @method parada findWithoutFail($id, $columns = ['*'])
 * @method parada find($id, $columns = ['*'])
 * @method parada first($columns = ['*'])
*/
class paradaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idRuta',
        'nombre',
        'descripcion',
        'latitud',
        'longitud'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return parada::class;
    }
}
