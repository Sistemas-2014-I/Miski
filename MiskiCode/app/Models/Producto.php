<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Producto",
 *      required={""},
 *      @SWG\Property(
 *          property="idProducto",
 *          description="idProducto",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="cod",
 *          description="cod",
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
 *          property="fecVencimiento",
 *          description="fecVencimiento",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="transformado",
 *          description="transformado",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="activo",
 *          description="activo",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="idCategoria",
 *          description="idCategoria",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class Producto extends Model
{
    use SoftDeletes;

    public $table = 'producto';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'cod',
        'nombre',
        'descripcion',
        'fecVencimiento',
        'transformado',
        'activo',
        'idCategoria'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idProducto' => 'integer',
        'cod' => 'string',
        'nombre' => 'string',
        'descripcion' => 'string',
        'fecVencimiento' => 'date',
        'transformado' => 'boolean',
        'activo' => 'boolean',
        'idCategoria' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
