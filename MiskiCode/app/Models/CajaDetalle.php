<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="CajaDetalle",
 *      required={""},
 *      @SWG\Property(
 *          property="idCajaDetalle",
 *          description="idCajaDetalle",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="mtoApertura",
 *          description="mtoApertura",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="mtoIngreso",
 *          description="mtoIngreso",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="mtoEgreso",
 *          description="mtoEgreso",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="mtoEstimado",
 *          description="mtoEstimado",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="mtoReal",
 *          description="mtoReal",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="mtoDiferencia",
 *          description="mtoDiferencia",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="aperturado",
 *          description="aperturado",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="idMoneda",
 *          description="idMoneda",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="idEmpleado",
 *          description="idEmpleado",
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
class CajaDetalle extends Model
{
    use SoftDeletes;

    public $table = 'cajadetalle';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'fecHorApertura',
        'fecHorCierre',
        'mtoApertura',
        'mtoIngreso',
        'mtoEgreso',
        'mtoEstimado',
        'mtoReal',
        'mtoDiferencia',
        'aperturado',
        'idMoneda',
        'idEmpleado',
        'idWorkstation'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idCajaDetalle' => 'integer',
        'aperturado' => 'boolean',
        'idMoneda' => 'integer',
        'idEmpleado' => 'integer',
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
