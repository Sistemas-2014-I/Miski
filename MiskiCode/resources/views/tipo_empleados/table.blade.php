<table class="table table-responsive" id="tipoEmpleados-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Descripcion</th>
        <th>Activo</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($tipoEmpleados as $tipoEmpleado)
        <tr>
            <td>{!! $tipoEmpleado->nombre !!}</td>
            <td>{!! $tipoEmpleado->descripcion !!}</td>
            <td>{!! $tipoEmpleado->activo !!}</td>
            <td>
                {!! Form::open(['route' => ['tipoEmpleados.destroy', $tipoEmpleado->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tipoEmpleados.show', [$tipoEmpleado->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('tipoEmpleados.edit', [$tipoEmpleado->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>