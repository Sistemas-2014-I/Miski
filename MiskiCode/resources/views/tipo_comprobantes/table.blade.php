<table class="table table-responsive" id="tipoComprobantes-table">
    <thead>
        <tr>
            <th>Cod</th>
        <th>Abrv</th>
        <th>Nombre</th>
        <th>Activo</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($tipoComprobantes as $tipoComprobante)
        <tr>
            <td>{!! $tipoComprobante->cod !!}</td>
            <td>{!! $tipoComprobante->abrv !!}</td>
            <td>{!! $tipoComprobante->nombre !!}</td>
            <td>{!! $tipoComprobante->activo !!}</td>
            <td>
                {!! Form::open(['route' => ['tipoComprobantes.destroy', $tipoComprobante->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tipoComprobantes.show', [$tipoComprobante->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('tipoComprobantes.edit', [$tipoComprobante->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>