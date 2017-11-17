<?php

namespace App\Repositories;

use App\Models\DocIdentidad;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DocIdentidadRepository
 * @package App\Repositories
 * @version November 16, 2017, 11:59 pm UTC
 *
 * @method DocIdentidad findWithoutFail($id, $columns = ['*'])
 * @method DocIdentidad find($id, $columns = ['*'])
 * @method DocIdentidad first($columns = ['*'])
*/
class DocIdentidadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cod',
        'abrv',
        'nombre',
        'activo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DocIdentidad::class;
    }
}
