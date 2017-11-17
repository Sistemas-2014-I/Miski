<?php

namespace App\Repositories;

use App\Models\TipoEmpleado;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TipoEmpleadoRepository
 * @package App\Repositories
 * @version November 16, 2017, 11:50 pm UTC
 *
 * @method TipoEmpleado findWithoutFail($id, $columns = ['*'])
 * @method TipoEmpleado find($id, $columns = ['*'])
 * @method TipoEmpleado first($columns = ['*'])
*/
class TipoEmpleadoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'descripcion',
        'activo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TipoEmpleado::class;
    }
}
