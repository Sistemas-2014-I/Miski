<table class="table table-responsive" id="formaPagos-table">
    <thead>
        <tr>
            <th>Abrv</th>
        <th>Nombre</th>
        <th>Activo</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($formaPagos as $formaPago)
        <tr>
            <td>{!! $formaPago->abrv !!}</td>
            <td>{!! $formaPago->nombre !!}</td>
            <td>{!! $formaPago->activo !!}</td>
            <td>
                {!! Form::open(['route' => ['formaPagos.destroy', $formaPago->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('formaPagos.show', [$formaPago->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('formaPagos.edit', [$formaPago->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>