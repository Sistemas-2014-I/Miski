<table class="table table-responsive" id="docIdentidads-table">
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
    @foreach($docIdentidads as $docIdentidad)
        <tr>
            <td>{!! $docIdentidad->cod !!}</td>
            <td>{!! $docIdentidad->abrv !!}</td>
            <td>{!! $docIdentidad->nombre !!}</td>
            <td>{!! $docIdentidad->activo !!}</td>
            <td>
                {!! Form::open(['route' => ['docIdentidads.destroy', $docIdentidad->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('docIdentidads.show', [$docIdentidad->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('docIdentidads.edit', [$docIdentidad->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>