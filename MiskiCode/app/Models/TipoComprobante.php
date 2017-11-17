<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="TipoComprobante",
 *      required={""},
 *      @SWG\Property(
 *          property="idTipoComprobante",
 *          description="idTipoComprobante",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="cod",
 *          description="cod",
 *          type="string"
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
 *          property="activo",
 *          description="activo",
 *          type="boolean"
 *      )
 * )
 */
class TipoComprobante extends Model
{
    use SoftDeletes;

    public $table = 'tipocomprobante';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'cod',
        'abrv',
        'nombre',
        'activo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idTipoComprobante' => 'integer',
        'cod' => 'string',
        'abrv' => 'string',
        'nombre' => 'string',
        'activo' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
