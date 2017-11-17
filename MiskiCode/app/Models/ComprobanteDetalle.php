<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="ComprobanteDetalle",
 *      required={""},
 *      @SWG\Property(
 *          property="idComprobanteDetalle",
 *          description="idComprobanteDetalle",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="cantidad",
 *          description="cantidad",
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
 *          property="idPresentacionProducto",
 *          description="idPresentacionProducto",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="idComprobante",
 *          description="idComprobante",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class ComprobanteDetalle extends Model
{
    use SoftDeletes;

    public $table = 'comprobantedetalle';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'cantidad',
        'mtoPrecio',
        'idPresentacionProducto',
        'idComprobante'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idComprobanteDetalle' => 'integer',
        'cantidad' => 'integer',
        'idPresentacionProducto' => 'integer',
        'idComprobante' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
