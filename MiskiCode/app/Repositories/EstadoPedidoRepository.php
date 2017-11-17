<?php

namespace App\Repositories;

use App\Models\EstadoPedido;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EstadoPedidoRepository
 * @package App\Repositories
 * @version November 17, 2017, 12:03 am UTC
 *
 * @method EstadoPedido findWithoutFail($id, $columns = ['*'])
 * @method EstadoPedido find($id, $columns = ['*'])
 * @method EstadoPedido first($columns = ['*'])
*/
class EstadoPedidoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'abrv',
        'nombre',
        'colorHexadecimal'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return EstadoPedido::class;
    }
}
