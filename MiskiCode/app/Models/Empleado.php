<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Empleado",
 *      required={""},
 *      @SWG\Property(
 *          property="idEmpleado",
 *          description="idEmpleado",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="sueldo",
 *          description="sueldo",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="fechaIngreso",
 *          description="fechaIngreso",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="fechaCese",
 *          description="fechaCese",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="obsv",
 *          description="obsv",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="activo",
 *          description="activo",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="idSujeto",
 *          description="idSujeto",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="idTipoEmpleado",
 *          description="idTipoEmpleado",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class Empleado extends Model
{
    use SoftDeletes;

    public $table = 'empleado';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'sueldo',
        'fechaIngreso',
        'fechaCese',
        'obsv',
        'activo',
        'idSujeto',
        'idTipoEmpleado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idEmpleado' => 'integer',
        'fechaIngreso' => 'date',
        'fechaCese' => 'date',
        'obsv' => 'string',
        'activo' => 'boolean',
        'idSujeto' => 'integer',
        'idTipoEmpleado' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
