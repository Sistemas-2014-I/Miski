<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Parametro",
 *      required={""},
 *      @SWG\Property(
 *          property="idParametro",
 *          description="idParametro",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="valor",
 *          description="valor",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="descripcion",
 *          description="descripcion",
 *          type="string"
 *      )
 * )
 */
class Parametro extends Model
{
    use SoftDeletes;

    public $table = 'parametro';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'valor',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idParametro' => 'integer',
        'valor' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
