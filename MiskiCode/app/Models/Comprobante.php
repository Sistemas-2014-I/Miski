<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Comprobante",
 *      required={""},
 *      @SWG\Property(
 *          property="idComprobante",
 *          description="idComprobante",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="serie",
 *          description="serie",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="numCorrelativo",
 *          description="numCorrelativo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="obsv",
 *          description="obsv",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="mtoBaseImponible",
 *          description="mtoBaseImponible",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="mtoIgv",
 *          description="mtoIgv",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="mtoDescuento",
 *          description="mtoDescuento",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="mtoTotal",
 *          description="mtoTotal",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="mtoVuelto",
 *          description="mtoVuelto",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="cortesia",
 *          description="cortesia",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="anulado",
 *          description="anulado",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="idCliente",
 *          description="idCliente",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="idPedido",
 *          description="idPedido",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="idTipoComprobante",
 *          description="idTipoComprobante",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="idSucursal",
 *          description="idSucursal",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="idMoneda",
 *          description="idMoneda",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="idWorkstation",
 *          description="idWorkstation",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class Comprobante extends Model
{
    use SoftDeletes;

    public $table = 'comprobante';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'fecHorRegistro',
        'serie',
        'numCorrelativo',
        'obsv',
        'mtoBaseImponible',
        'mtoIgv',
        'mtoDescuento',
        'mtoTotal',
        'mtoVuelto',
        'cortesia',
        'anulado',
        'idCliente',
        'idPedido',
        'idTipoComprobante',
        'idSucursal',
        'idMoneda',
        'idWorkstation'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idComprobante' => 'integer',
        'serie' => 'string',
        'numCorrelativo' => 'string',
        'obsv' => 'string',
        'cortesia' => 'boolean',
        'anulado' => 'boolean',
        'idCliente' => 'integer',
        'idPedido' => 'integer',
        'idTipoComprobante' => 'integer',
        'idSucursal' => 'integer',
        'idMoneda' => 'integer',
        'idWorkstation' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
