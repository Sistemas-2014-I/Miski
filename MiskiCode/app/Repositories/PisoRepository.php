<?php

namespace App\Repositories;

use App\Models\Piso;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PisoRepository
 * @package App\Repositories
 * @version November 16, 2017, 11:49 pm UTC
 *
 * @method Piso findWithoutFail($id, $columns = ['*'])
 * @method Piso find($id, $columns = ['*'])
 * @method Piso first($columns = ['*'])
*/
class PisoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cod',
        'descripcion',
        'activo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Piso::class;
    }
}
