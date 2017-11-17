<?php

namespace App\Repositories;

use App\Models\Parametro;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ParametroRepository
 * @package App\Repositories
 * @version November 17, 2017, 12:06 am UTC
 *
 * @method Parametro findWithoutFail($id, $columns = ['*'])
 * @method Parametro find($id, $columns = ['*'])
 * @method Parametro first($columns = ['*'])
*/
class ParametroRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'valor',
        'descripcion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Parametro::class;
    }
}
