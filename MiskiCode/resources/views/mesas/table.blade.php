<table class="table table-responsive" id="mesas-table">
    <thead>
        <tr>
            <th>Cod</th>
        <th>Numcomensales</th>
        <th>Idestadomesa</th>
        <th>Idseccion</th>
        <th>Idpiso</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($mesas as $mesa)
        <tr>
            <td>{!! $mesa->cod !!}</td>
            <td>{!! $mesa->numComensales !!}</td>
            <td>{!! $mesa->idEstadoMesa !!}</td>
            <td>{!! $mesa->idSeccion !!}</td>
            <td>{!! $mesa->idPiso !!}</td>
            <td>
                {!! Form::open(['route' => ['mesas.destroy', $mesa->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('mesas.show', [$mesa->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('mesas.edit', [$mesa->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>