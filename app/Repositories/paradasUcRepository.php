<?php

namespace App\Repositories;

use App\Models\paradasUc;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class paradasUcRepository
 * @package App\Repositories
 * @version November 3, 2017, 12:24 pm UTC
 *
 * @method paradasUc findWithoutFail($id, $columns = ['*'])
 * @method paradasUc find($id, $columns = ['*'])
 * @method paradasUc first($columns = ['*'])
*/
class paradasUcRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'latitud',
        'longitud',
        'descripcion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return paradasUc::class;
    }
}
