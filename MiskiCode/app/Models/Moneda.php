<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Moneda",
 *      required={""},
 *      @SWG\Property(
 *          property="idMoneda",
 *          description="idMoneda",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="codIso",
 *          description="codIso",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="nombre",
 *          description="nombre",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="simbolo",
 *          description="simbolo",
 *          type="string"
 *      )
 * )
 */
class Moneda extends Model
{
    use SoftDeletes;

    public $table = 'moneda';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'codIso',
        'nombre',
        'simbolo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idMoneda' => 'integer',
        'codIso' => 'string',
        'nombre' => 'string',
        'simbolo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
