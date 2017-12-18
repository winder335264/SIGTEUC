<?php
namespace App\Models;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class horarioUcM
 * @package App\Models
 * @version November 3, 2017, 1:39 pm UTC
 *
 * @property integer idRuta
 * @property string horas
 * @property string bus
 */
class horarioUcM extends Model
{
    //use SoftDeletes;
    public $table = 'HORARIO_UC_M';
    
   // protected $dates = ['deleted_at'];
    public $fillable = [
        'idRuta',
        'horas',
        'bus'
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idRuta' => 'integer',
    'Horas' => 'string',
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