<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Workstation",
 *      required={""},
 *      @SWG\Property(
 *          property="idWorkstation",
 *          description="idWorkstation",
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
 *          property="aperturado",
 *          description="aperturado",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="activo",
 *          description="activo",
 *          type="boolean"
 *      )
 * )
 */
class Workstation extends Model
{
    use SoftDeletes;

    public $table = 'workstation';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'cod',
        'descripcion',
        'aperturado',
        'activo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idWorkstation' => 'integer',
        'cod' => 'string',
        'descripcion' => 'string',
        'aperturado' => 'boolean',
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
