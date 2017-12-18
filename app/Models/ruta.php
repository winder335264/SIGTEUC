<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ruta
 * @package App\Models
 * @version November 3, 2017, 3:24 am UTC
 *
 * @property string nombre
 * @property double latitud
 * @property double longitud
 * @property integer cantidad_parada
 * @property integer cantidad_viaje
 * @property float distancia
 */
class ruta extends Model
{
    //use SoftDeletes;

    public $table = 'RUTA';
    

    //protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'latitud',
        'longitud',
        'cantidad_parada',
        'cantidad_viaje',
        'distancia',
        'descripcion',
        'duracion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'latitud' => 'double',
        'longitud' => 'double',
        'cantidad_parada' => 'integer',
        'cantidad_viaje' => 'integer',
        'distancia' => 'string',
        'duracion'=>'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
       
    ];

    
}
