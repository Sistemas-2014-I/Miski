<?php

namespace App\Repositories;

use App\Models\Presentacion;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PresentacionRepository
 * @package App\Repositories
 * @version November 16, 2017, 11:54 pm UTC
 *
 * @method Presentacion findWithoutFail($id, $columns = ['*'])
 * @method Presentacion find($id, $columns = ['*'])
 * @method Presentacion first($columns = ['*'])
*/
class PresentacionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'activo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Presentacion::class;
    }
}
