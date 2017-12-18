<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class paradasUc
 * @package App\Models
 * @version November 3, 2017, 12:24 pm UTC
 *
 * @property string nombre
 * @property doulbe latitud
 * @property double longitud
 * @property string descripcion
 */
class paradasUc extends Model
{
    //use SoftDeletes;

    public $table = 'PARADA_UC';
    

    //protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'latitud',
        'longitud',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'longitud' => 'double',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
