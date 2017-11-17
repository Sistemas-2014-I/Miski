<?php

namespace App\Repositories;

use App\Models\Comprobante;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ComprobanteRepository
 * @package App\Repositories
 * @version November 17, 2017, 12:01 am UTC
 *
 * @method Comprobante findWithoutFail($id, $columns = ['*'])
 * @method Comprobante find($id, $columns = ['*'])
 * @method Comprobante first($columns = ['*'])
*/
class ComprobanteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fecHorRegistro',
        'serie',
        'numCorrelativo',
        'obsv',
        'mtoBaseImponible',
        'mtoIgv',
        'mtoDescuento',
        'mtoTotal',
        'mtoVuelto',
        'cortesia',
        'anulado',
        'idCliente',
        'idPedido',
        'idTipoComprobante',
        'idSucursal',
        'idMoneda',
        'idWorkstation'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Comprobante::class;
    }
}
