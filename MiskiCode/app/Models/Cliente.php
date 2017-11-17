<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Cliente",
 *      required={""},
 *      @SWG\Property(
 *          property="idCliente",
 *          description="idCliente",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="esNatural",
 *          description="esNatural",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="idSujeto",
 *          description="idSujeto",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class Cliente extends Model
{
    use SoftDeletes;

    public $table = 'cliente';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'esNatural',
        'idSujeto'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idCliente' => 'integer',
        'esNatural' => 'boolean',
        'idSujeto' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
