<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Seccion",
 *      required={""},
 *      @SWG\Property(
 *          property="idSeccion",
 *          description="idSeccion",
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
 *          property="descripcion",
 *          description="descripcion",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="activo",
 *          description="activo",
 *          type="boolean"
 *      )
 * )
 */
class Seccion extends Model
{
    use SoftDeletes;

    public $table = 'seccion';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'abrv',
        'nombre',
        'descripcion',
        'activo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idSeccion' => 'integer',
        'abrv' => 'string',
        'nombre' => 'string',
        'descripcion' => 'string',
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
