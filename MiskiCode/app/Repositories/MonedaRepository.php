<?php

namespace App\Repositories;

use App\Models\Moneda;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MonedaRepository
 * @package App\Repositories
 * @version November 17, 2017, 12:05 am UTC
 *
 * @method Moneda findWithoutFail($id, $columns = ['*'])
 * @method Moneda find($id, $columns = ['*'])
 * @method Moneda first($columns = ['*'])
*/
class MonedaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'codIso',
        'nombre',
        'simbolo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Moneda::class;
    }
}
