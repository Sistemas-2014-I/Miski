<table class="table table-responsive" id="formaPagoDetalles-table">
    <thead>
        <tr>
            <th>Mtorecibido</th>
        <th>Mtocobrado</th>
        <th>Mtovuelto</th>
        <th>Idformapago</th>
        <th>Idcomprobante</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($formaPagoDetalles as $formaPagoDetalle)
        <tr>
            <td>{!! $formaPagoDetalle->mtoRecibido !!}</td>
            <td>{!! $formaPagoDetalle->mtoCobrado !!}</td>
            <td>{!! $formaPagoDetalle->mtoVuelto !!}</td>
            <td>{!! $formaPagoDetalle->idFormaPago !!}</td>
            <td>{!! $formaPagoDetalle->idComprobante !!}</td>
            <td>
                {!! Form::open(['route' => ['formaPagoDetalles.destroy', $formaPagoDetalle->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('formaPagoDetalles.show', [$formaPagoDetalle->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('formaPagoDetalles.edit', [$formaPagoDetalle->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>