<?php

namespace App\Repositories;

use App\Models\EstadoMesa;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EstadoMesaRepository
 * @package App\Repositories
 * @version November 17, 2017, 12:02 am UTC
 *
 * @method EstadoMesa findWithoutFail($id, $columns = ['*'])
 * @method EstadoMesa find($id, $columns = ['*'])
 * @method EstadoMesa first($columns = ['*'])
*/
class EstadoMesaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'colorHexadecimal'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return EstadoMesa::class;
    }
}
