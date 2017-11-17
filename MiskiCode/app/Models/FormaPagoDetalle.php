<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="FormaPagoDetalle",
 *      required={""},
 *      @SWG\Property(
 *          property="idFormaPagoDetalle",
 *          description="idFormaPagoDetalle",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="mtoRecibido",
 *          description="mtoRecibido",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="mtoCobrado",
 *          description="mtoCobrado",
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
 *          property="idFormaPago",
 *          description="idFormaPago",
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
class FormaPagoDetalle extends Model
{
    use SoftDeletes;

    public $table = 'formapagodetalle';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'mtoRecibido',
        'mtoCobrado',
        'mtoVuelto',
        'idFormaPago',
        'idComprobante'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idFormaPagoDetalle' => 'integer',
        'idFormaPago' => 'integer',
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
