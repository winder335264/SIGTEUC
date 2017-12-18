<?php

namespace App\Repositories;

use App\Models\mapper;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class mapperRepository
 * @package App\Repositories
 * @version November 3, 2017, 3:06 am UTC
 *
 * @method mapper findWithoutFail($id, $columns = ['*'])
 * @method mapper find($id, $columns = ['*'])
 * @method mapper first($columns = ['*'])
*/
class mapperRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return mapper::class;
    }
}
