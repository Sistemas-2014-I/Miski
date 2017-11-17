<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Mesa",
 *      required={""},
 *      @SWG\Property(
 *          property="idMesa",
 *          description="idMesa",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="cod",
 *          description="cod",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="numComensales",
 *          description="numComensales",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="idEstadoMesa",
 *          description="idEstadoMesa",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="idSeccion",
 *          description="idSeccion",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="idPiso",
 *          description="idPiso",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class Mesa extends Model
{
    use SoftDeletes;

    public $table = 'mesa';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'cod',
        'numComensales',
        'idEstadoMesa',
        'idSeccion',
        'idPiso'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idMesa' => 'integer',
        'cod' => 'string',
        'numComensales' => 'boolean',
        'idEstadoMesa' => 'integer',
        'idSeccion' => 'integer',
        'idPiso' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
