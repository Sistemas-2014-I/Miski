<?php

namespace App\Repositories;

use App\Models\PresentacionProducto;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PresentacionProductoRepository
 * @package App\Repositories
 * @version November 16, 2017, 11:54 pm UTC
 *
 * @method PresentacionProducto findWithoutFail($id, $columns = ['*'])
 * @method PresentacionProducto find($id, $columns = ['*'])
 * @method PresentacionProducto first($columns = ['*'])
*/
class PresentacionProductoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'mtoPrecio',
        'activo',
        'idProducto',
        'idPresentacion',
        'idMoneda'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PresentacionProducto::class;
    }
}
