<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class horarioMUc
 * @package App\Models
 * @version November 3, 2017, 1:41 pm UTC
 *
 * @property integer idRuta
 * @property string horas
 * @property string bus
 */
class HORARIO_M_UC extends Model
{
    //use SoftDeletes;

    public $table = 'HORARIO_M_UC';
    

    //protected $dates = ['deleted_at'];


    public $fillable = [
        'idRuta',
        'Horas',
        'bus'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idRuta' => 'integer',
        'horas' => 'string',
        'bus' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
