<?php

namespace App\Repositories;

use App\Models\TipoComprobante;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TipoComprobanteRepository
 * @package App\Repositories
 * @version November 17, 2017, 12:08 am UTC
 *
 * @method TipoComprobante findWithoutFail($id, $columns = ['*'])
 * @method TipoComprobante find($id, $columns = ['*'])
 * @method TipoComprobante first($columns = ['*'])
*/
class TipoComprobanteRepository extends BaseRepository
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
        return TipoComprobante::class;
    }
}
