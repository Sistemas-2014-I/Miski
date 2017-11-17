<table class="table table-responsive" id="workstations-table">
    <thead>
        <tr>
            <th>Cod</th>
        <th>Descripcion</th>
        <th>Aperturado</th>
        <th>Activo</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($workstations as $workstation)
        <tr>
            <td>{!! $workstation->cod !!}</td>
            <td>{!! $workstation->descripcion !!}</td>
            <td>{!! $workstation->aperturado !!}</td>
            <td>{!! $workstation->activo !!}</td>
            <td>
                {!! Form::open(['route' => ['workstations.destroy', $workstation->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('workstations.show', [$workstation->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('workstations.edit', [$workstation->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>