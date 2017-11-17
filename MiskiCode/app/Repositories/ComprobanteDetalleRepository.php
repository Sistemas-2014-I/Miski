<?php

namespace App\Repositories;

use App\Models\ComprobanteDetalle;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ComprobanteDetalleRepository
 * @package App\Repositories
 * @version November 17, 2017, 12:01 am UTC
 *
 * @method ComprobanteDetalle findWithoutFail($id, $columns = ['*'])
 * @method ComprobanteDetalle find($id, $columns = ['*'])
 * @method ComprobanteDetalle first($columns = ['*'])
*/
class ComprobanteDetalleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cantidad',
        'mtoPrecio',
        'idPresentacionProducto',
        'idComprobante'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ComprobanteDetalle::class;
    }
}
