<table class="table table-responsive" id="comprobanteDetalles-table">
    <thead>
        <tr>
            <th>Cantidad</th>
        <th>Mtoprecio</th>
        <th>Idpresentacionproducto</th>
        <th>Idcomprobante</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($comprobanteDetalles as $comprobanteDetalle)
        <tr>
            <td>{!! $comprobanteDetalle->cantidad !!}</td>
            <td>{!! $comprobanteDetalle->mtoPrecio !!}</td>
            <td>{!! $comprobanteDetalle->idPresentacionProducto !!}</td>
            <td>{!! $comprobanteDetalle->idComprobante !!}</td>
            <td>
                {!! Form::open(['route' => ['comprobanteDetalles.destroy', $comprobanteDetalle->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('comprobanteDetalles.show', [$comprobanteDetalle->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('comprobanteDetalles.edit', [$comprobanteDetalle->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>