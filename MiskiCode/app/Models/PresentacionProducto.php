<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="PresentacionProducto",
 *      required={""},
 *      @SWG\Property(
 *          property="idPresentacionProducto",
 *          description="idPresentacionProducto",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="mtoPrecio",
 *          description="mtoPrecio",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="activo",
 *          description="activo",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="idProducto",
 *          description="idProducto",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="idPresentacion",
 *          description="idPresentacion",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="idMoneda",
 *          description="idMoneda",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class PresentacionProducto extends Model
{
    use SoftDeletes;

    public $table = 'presentacionproducto';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'mtoPrecio',
        'activo',
        'idProducto',
        'idPresentacion',
        'idMoneda'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idPresentacionProducto' => 'integer',
        'activo' => 'boolean',
        'idProducto' => 'integer',
        'idPresentacion' => 'integer',
        'idMoneda' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
