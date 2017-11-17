<table class="table table-responsive" id="productos-table">
    <thead>
        <tr>
            <th>Cod</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Fecvencimiento</th>
        <th>Transformado</th>
        <th>Activo</th>
        <th>Idcategoria</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($productos as $producto)
        <tr>
            <td>{!! $producto->cod !!}</td>
            <td>{!! $producto->nombre !!}</td>
            <td>{!! $producto->descripcion !!}</td>
            <td>{!! $producto->fecVencimiento !!}</td>
            <td>{!! $producto->transformado !!}</td>
            <td>{!! $producto->activo !!}</td>
            <td>{!! $producto->idCategoria !!}</td>
            <td>
                {!! Form::open(['route' => ['productos.destroy', $producto->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('productos.show', [$producto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('productos.edit', [$producto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>