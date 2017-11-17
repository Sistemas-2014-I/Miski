<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="EstadoPedido",
 *      required={""},
 *      @SWG\Property(
 *          property="idEstadoPedido",
 *          description="idEstadoPedido",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="abrv",
 *          description="abrv",
 *          type="string"
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
class EstadoPedido extends Model
{
    use SoftDeletes;

    public $table = 'estadopedido';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'abrv',
        'nombre',
        'colorHexadecimal'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idEstadoPedido' => 'integer',
        'abrv' => 'string',
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
