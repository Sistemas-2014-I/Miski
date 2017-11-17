<?php

namespace App\Repositories;

use App\Models\Mesa;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MesaRepository
 * @package App\Repositories
 * @version November 16, 2017, 11:48 pm UTC
 *
 * @method Mesa findWithoutFail($id, $columns = ['*'])
 * @method Mesa find($id, $columns = ['*'])
 * @method Mesa first($columns = ['*'])
*/
class MesaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cod',
        'numComensales',
        'idEstadoMesa',
        'idSeccion',
        'idPiso'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Mesa::class;
    }
}
