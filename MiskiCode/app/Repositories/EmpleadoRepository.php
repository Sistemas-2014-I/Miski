<?php

namespace App\Repositories;

use App\Models\Empleado;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EmpleadoRepository
 * @package App\Repositories
 * @version November 16, 2017, 11:48 pm UTC
 *
 * @method Empleado findWithoutFail($id, $columns = ['*'])
 * @method Empleado find($id, $columns = ['*'])
 * @method Empleado first($columns = ['*'])
*/
class EmpleadoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'sueldo',
        'fechaIngreso',
        'fechaCese',
        'obsv',
        'activo',
        'idSujeto',
        'idTipoEmpleado'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Empleado::class;
    }
}
