<?php

namespace App\Repositories;

use App\Models\Cliente;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ClienteRepository
 * @package App\Repositories
 * @version November 16, 2017, 11:47 pm UTC
 *
 * @method Cliente findWithoutFail($id, $columns = ['*'])
 * @method Cliente find($id, $columns = ['*'])
 * @method Cliente first($columns = ['*'])
*/
class ClienteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'esNatural',
        'idSujeto'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Cliente::class;
    }
}
