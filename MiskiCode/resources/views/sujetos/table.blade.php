<table class="table table-responsive" id="sujetos-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Apellidomaterno</th>
        <th>Apellidopaterno</th>
        <th>Numdoc</th>
        <th>Telefono</th>
        <th>Correo</th>
        <th>Masculino</th>
        <th>Direccion</th>
        <th>Avatar</th>
        <th>Iddocidentidad</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($sujetos as $sujeto)
        <tr>
            <td>{!! $sujeto->nombre !!}</td>
            <td>{!! $sujeto->apellidoMaterno !!}</td>
            <td>{!! $sujeto->apellidoPaterno !!}</td>
            <td>{!! $sujeto->numDoc !!}</td>
            <td>{!! $sujeto->telefono !!}</td>
            <td>{!! $sujeto->correo !!}</td>
            <td>{!! $sujeto->masculino !!}</td>
            <td>{!! $sujeto->direccion !!}</td>
            <td>{!! $sujeto->avatar !!}</td>
            <td>{!! $sujeto->idDocIdentidad !!}</td>
            <td>
                {!! Form::open(['route' => ['sujetos.destroy', $sujeto->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('sujetos.show', [$sujeto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('sujetos.edit', [$sujeto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>