<?php

namespace App\Repositories;

use App\Models\Workstation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class WorkstationRepository
 * @package App\Repositories
 * @version November 17, 2017, 12:00 am UTC
 *
 * @method Workstation findWithoutFail($id, $columns = ['*'])
 * @method Workstation find($id, $columns = ['*'])
 * @method Workstation first($columns = ['*'])
*/
class WorkstationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cod',
        'descripcion',
        'aperturado',
        'activo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Workstation::class;
    }
}
