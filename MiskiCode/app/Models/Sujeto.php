<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Sujeto",
 *      required={""},
 *      @SWG\Property(
 *          property="idSujeto",
 *          description="idSujeto",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nombre",
 *          description="nombre",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="apellidoMaterno",
 *          description="apellidoMaterno",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="apellidoPaterno",
 *          description="apellidoPaterno",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="numDoc",
 *          description="numDoc",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="telefono",
 *          description="telefono",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="correo",
 *          description="correo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="masculino",
 *          description="masculino",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="direccion",
 *          description="direccion",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="avatar",
 *          description="avatar",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="idDocIdentidad",
 *          description="idDocIdentidad",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class Sujeto extends Model
{
    use SoftDeletes;

    public $table = 'sujeto';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'apellidoMaterno',
        'apellidoPaterno',
        'numDoc',
        'telefono',
        'correo',
        'masculino',
        'direccion',
        'avatar',
        'idDocIdentidad'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idSujeto' => 'integer',
        'nombre' => 'string',
        'apellidoMaterno' => 'string',
        'apellidoPaterno' => 'string',
        'numDoc' => 'string',
        'telefono' => 'string',
        'correo' => 'string',
        'masculino' => 'boolean',
        'direccion' => 'string',
        'avatar' => 'string',
        'idDocIdentidad' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
