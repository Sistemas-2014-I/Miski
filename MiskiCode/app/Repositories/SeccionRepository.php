<?php

namespace App\Repositories;

use App\Models\Seccion;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SeccionRepository
 * @package App\Repositories
 * @version November 16, 2017, 11:49 pm UTC
 *
 * @method Seccion findWithoutFail($id, $columns = ['*'])
 * @method Seccion find($id, $columns = ['*'])
 * @method Seccion first($columns = ['*'])
*/
class SeccionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'abrv',
        'nombre',
        'descripcion',
        'activo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Seccion::class;
    }
}
