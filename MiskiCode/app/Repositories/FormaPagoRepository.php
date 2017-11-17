<?php

namespace App\Repositories;

use App\Models\FormaPago;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class FormaPagoRepository
 * @package App\Repositories
 * @version November 17, 2017, 12:04 am UTC
 *
 * @method FormaPago findWithoutFail($id, $columns = ['*'])
 * @method FormaPago find($id, $columns = ['*'])
 * @method FormaPago first($columns = ['*'])
*/
class FormaPagoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'abrv',
        'nombre',
        'activo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return FormaPago::class;
    }
}
