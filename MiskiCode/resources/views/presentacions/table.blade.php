<table class="table table-responsive" id="presentacions-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Activo</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($presentacions as $presentacion)
        <tr>
            <td>{!! $presentacion->nombre !!}</td>
            <td>{!! $presentacion->activo !!}</td>
            <td>
                {!! Form::open(['route' => ['presentacions.destroy', $presentacion->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('presentacions.show', [$presentacion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('presentacions.edit', [$presentacion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>