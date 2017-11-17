<?php

namespace App\Repositories;

use App\Models\CajaDetalle;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CajaDetalleRepository
 * @package App\Repositories
 * @version November 17, 2017, 12:00 am UTC
 *
 * @method CajaDetalle findWithoutFail($id, $columns = ['*'])
 * @method CajaDetalle find($id, $columns = ['*'])
 * @method CajaDetalle first($columns = ['*'])
*/
class CajaDetalleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fecHorApertura',
        'fecHorCierre',
        'mtoApertura',
        'mtoIngreso',
        'mtoEgreso',
        'mtoEstimado',
        'mtoReal',
        'mtoDiferencia',
        'aperturado',
        'idMoneda',
        'idEmpleado',
        'idWorkstation'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CajaDetalle::class;
    }
}
