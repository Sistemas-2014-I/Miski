<?php

namespace App\Repositories;

use App\Models\Pedido;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PedidoRepository
 * @package App\Repositories
 * @version November 17, 2017, 12:07 am UTC
 *
 * @method Pedido findWithoutFail($id, $columns = ['*'])
 * @method Pedido find($id, $columns = ['*'])
 * @method Pedido first($columns = ['*'])
*/
class PedidoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cantidad',
        'mtoPrecio',
        'activo',
        'idPedido',
        'idPresentacionProducto'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pedido::class;
    }
}
