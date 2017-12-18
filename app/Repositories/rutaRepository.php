<?php

namespace App\Repositories;

use App\Models\ruta;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class rutaRepository
 * @package App\Repositories
 * @version November 3, 2017, 3:24 am UTC
 *
 * @method ruta findWithoutFail($id, $columns = ['*'])
 * @method ruta find($id, $columns = ['*'])
 * @method ruta first($columns = ['*'])
*/
class rutaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'latitud',
        'longitud',
        'cantidad_parada',
        'cantidad_viaje',
        'distancia'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ruta::class;
    }
}
