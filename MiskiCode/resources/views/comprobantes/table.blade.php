<table class="table table-responsive" id="comprobantes-table">
    <thead>
        <tr>
            <th>Fechorregistro</th>
        <th>Serie</th>
        <th>Numcorrelativo</th>
        <th>Obsv</th>
        <th>Mtobaseimponible</th>
        <th>Mtoigv</th>
        <th>Mtodescuento</th>
        <th>Mtototal</th>
        <th>Mtovuelto</th>
        <th>Cortesia</th>
        <th>Anulado</th>
        <th>Idcliente</th>
        <th>Idpedido</th>
        <th>Idtipocomprobante</th>
        <th>Idsucursal</th>
        <th>Idmoneda</th>
        <th>Idworkstation</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($comprobantes as $comprobante)
        <tr>
            <td>{!! $comprobante->fecHorRegistro !!}</td>
            <td>{!! $comprobante->serie !!}</td>
            <td>{!! $comprobante->numCorrelativo !!}</td>
            <td>{!! $comprobante->obsv !!}</td>
            <td>{!! $comprobante->mtoBaseImponible !!}</td>
            <td>{!! $comprobante->mtoIgv !!}</td>
            <td>{!! $comprobante->mtoDescuento !!}</td>
            <td>{!! $comprobante->mtoTotal !!}</td>
            <td>{!! $comprobante->mtoVuelto !!}</td>
            <td>{!! $comprobante->cortesia !!}</td>
            <td>{!! $comprobante->anulado !!}</td>
            <td>{!! $comprobante->idCliente !!}</td>
            <td>{!! $comprobante->idPedido !!}</td>
            <td>{!! $comprobante->idTipoComprobante !!}</td>
            <td>{!! $comprobante->idSucursal !!}</td>
            <td>{!! $comprobante->idMoneda !!}</td>
            <td>{!! $comprobante->idWorkstation !!}</td>
            <td>
                {!! Form::open(['route' => ['comprobantes.destroy', $comprobante->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('comprobantes.show', [$comprobante->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('comprobantes.edit', [$comprobante->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>