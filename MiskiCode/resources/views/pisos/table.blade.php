<table class="table table-responsive" id="pisos-table">
    <thead>
        <tr>
            <th>Cod</th>
        <th>Descripcion</th>
        <th>Activo</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($pisos as $piso)
        <tr>
            <td>{!! $piso->cod !!}</td>
            <td>{!! $piso->descripcion !!}</td>
            <td>{!! $piso->activo !!}</td>
            <td>
                {!! Form::open(['route' => ['pisos.destroy', $piso->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('pisos.show', [$piso->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('pisos.edit', [$piso->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>