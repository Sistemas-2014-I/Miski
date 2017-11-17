<table class="table table-responsive" id="empleados-table">
    <thead>
        <tr>
            <th>Sueldo</th>
        <th>Fechaingreso</th>
        <th>Fechacese</th>
        <th>Obsv</th>
        <th>Activo</th>
        <th>Idsujeto</th>
        <th>Idtipoempleado</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($empleados as $empleado)
        <tr>
            <td>{!! $empleado->sueldo !!}</td>
            <td>{!! $empleado->fechaIngreso !!}</td>
            <td>{!! $empleado->fechaCese !!}</td>
            <td>{!! $empleado->obsv !!}</td>
            <td>{!! $empleado->activo !!}</td>
            <td>{!! $empleado->idSujeto !!}</td>
            <td>{!! $empleado->idTipoEmpleado !!}</td>
            <td>
                {!! Form::open(['route' => ['empleados.destroy', $empleado->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('empleados.show', [$empleado->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('empleados.edit', [$empleado->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>