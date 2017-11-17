<?php

namespace App\Repositories;

use App\Models\Sujeto;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SujetoRepository
 * @package App\Repositories
 * @version November 16, 2017, 11:45 pm UTC
 *
 * @method Sujeto findWithoutFail($id, $columns = ['*'])
 * @method Sujeto find($id, $columns = ['*'])
 * @method Sujeto first($columns = ['*'])
*/
class SujetoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'apellidoMaterno',
        'apellidoPaterno',
        'numDoc',
        'telefono',
        'correo',
        'masculino',
        'direccion',
        'avatar',
        'idDocIdentidad'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Sujeto::class;
    }
}
