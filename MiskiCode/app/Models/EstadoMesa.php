<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="EstadoMesa",
 *      required={""},
 *      @SWG\Property(
 *          property="idEstadoMesa",
 *          description="idEstadoMesa",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nombre",
 *          description="nombre",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="colorHexadecimal",
 *          description="colorHexadecimal",
 *          type="string"
 *      )
 * )
 */
class EstadoMesa extends Model
{
    use SoftDeletes;

    public $table = 'estadomesa';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'colorHexadecimal'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idEstadoMesa' => 'integer',
        'nombre' => 'string',
        'colorHexadecimal' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
