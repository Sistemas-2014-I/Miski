<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Piso",
 *      required={""},
 *      @SWG\Property(
 *          property="idPiso",
 *          description="idPiso",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="cod",
 *          description="cod",
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
class Piso extends Model
{
    use SoftDeletes;

    public $table = 'piso';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'cod',
        'descripcion',
        'activo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idPiso' => 'integer',
        'cod' => 'string',
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
