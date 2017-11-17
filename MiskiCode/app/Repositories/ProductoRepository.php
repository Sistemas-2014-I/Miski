<?php

namespace App\Repositories;

use App\Models\Producto;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductoRepository
 * @package App\Repositories
 * @version November 16, 2017, 11:52 pm UTC
 *
 * @method Producto findWithoutFail($id, $columns = ['*'])
 * @method Producto find($id, $columns = ['*'])
 * @method Producto first($columns = ['*'])
*/
class ProductoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cod',
        'nombre',
        'descripcion',
        'fecVencimiento',
        'transformado',
        'activo',
        'idCategoria'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Producto::class;
    }
}
