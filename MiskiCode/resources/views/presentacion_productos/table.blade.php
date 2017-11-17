<table class="table table-responsive" id="presentacionProductos-table">
    <thead>
        <tr>
            <th>Mtoprecio</th>
        <th>Activo</th>
        <th>Idproducto</th>
        <th>Idpresentacion</th>
        <th>Idmoneda</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($presentacionProductos as $presentacionProducto)
        <tr>
            <td>{!! $presentacionProducto->mtoPrecio !!}</td>
            <td>{!! $presentacionProducto->activo !!}</td>
            <td>{!! $presentacionProducto->idProducto !!}</td>
            <td>{!! $presentacionProducto->idPresentacion !!}</td>
            <td>{!! $presentacionProducto->idMoneda !!}</td>
            <td>
                {!! Form::open(['route' => ['presentacionProductos.destroy', $presentacionProducto->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('presentacionProductos.show', [$presentacionProducto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('presentacionProductos.edit', [$presentacionProducto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>