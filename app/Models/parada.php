<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class parada
 * @package App\Models
 * @version November 3, 2017, 3:31 am UTC
 *
 * @property integer idRuta
 * @property string nombre
 * @property string descripcion
 * @property double latitud
 * @property double longitud
 */
class parada extends Model
{
    //use SoftDeletes;

    public $table = 'PARADA';
    

   // protected $dates = ['deleted_at'];


    public $fillable = [
        'idRuta',
        'nombre',
        'descripcion',
        'latitud',
        'longitud'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idRuta' => 'integer',
        'nombre' => 'string',
        'descripcion' => 'string',
        'latitud' => 'double',
        'longitud' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'latitud' => 'longitud double string'
    ];

    
}
