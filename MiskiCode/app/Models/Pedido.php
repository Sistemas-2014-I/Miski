<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Pedido",
 *      required={""},
 *      @SWG\Property(
 *          property="idPedidoDetalle",
 *          description="idPedidoDetalle",
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
 *          property="activo",
 *          description="activo",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="idPedido",
 *          description="idPedido",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="idPresentacionProducto",
 *          description="idPresentacionProducto",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class Pedido extends Model
{
    use SoftDeletes;

    public $table = 'pedidodetalle';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'cantidad',
        'mtoPrecio',
        'activo',
        'idPedido',
        'idPresentacionProducto'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idPedidoDetalle' => 'integer',
        'cantidad' => 'integer',
        'activo' => 'boolean',
        'idPedido' => 'integer',
        'idPresentacionProducto' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
