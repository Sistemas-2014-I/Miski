<table class="table table-responsive" id="monedas-table">
    <thead>
        <tr>
            <th>Codiso</th>
        <th>Nombre</th>
        <th>Simbolo</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($monedas as $moneda)
        <tr>
            <td>{!! $moneda->codIso !!}</td>
            <td>{!! $moneda->nombre !!}</td>
            <td>{!! $moneda->simbolo !!}</td>
            <td>
                {!! Form::open(['route' => ['monedas.destroy', $moneda->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('monedas.show', [$moneda->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('monedas.edit', [$moneda->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>