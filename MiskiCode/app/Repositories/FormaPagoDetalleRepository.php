<?php

namespace App\Repositories;

use App\Models\FormaPagoDetalle;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class FormaPagoDetalleRepository
 * @package App\Repositories
 * @version November 17, 2017, 12:04 am UTC
 *
 * @method FormaPagoDetalle findWithoutFail($id, $columns = ['*'])
 * @method FormaPagoDetalle find($id, $columns = ['*'])
 * @method FormaPagoDetalle first($columns = ['*'])
*/
class FormaPagoDetalleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'mtoRecibido',
        'mtoCobrado',
        'mtoVuelto',
        'idFormaPago',
        'idComprobante'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return FormaPagoDetalle::class;
    }
}
