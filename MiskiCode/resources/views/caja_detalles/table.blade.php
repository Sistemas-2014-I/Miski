<table class="table table-responsive" id="cajaDetalles-table">
    <thead>
        <tr>
            <th>Fechorapertura</th>
        <th>Fechorcierre</th>
        <th>Mtoapertura</th>
        <th>Mtoingreso</th>
        <th>Mtoegreso</th>
        <th>Mtoestimado</th>
        <th>Mtoreal</th>
        <th>Mtodiferencia</th>
        <th>Aperturado</th>
        <th>Idmoneda</th>
        <th>Idempleado</th>
        <th>Idworkstation</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($cajaDetalles as $cajaDetalle)
        <tr>
            <td>{!! $cajaDetalle->fecHorApertura !!}</td>
            <td>{!! $cajaDetalle->fecHorCierre !!}</td>
            <td>{!! $cajaDetalle->mtoApertura !!}</td>
            <td>{!! $cajaDetalle->mtoIngreso !!}</td>
            <td>{!! $cajaDetalle->mtoEgreso !!}</td>
            <td>{!! $cajaDetalle->mtoEstimado !!}</td>
            <td>{!! $cajaDetalle->mtoReal !!}</td>
            <td>{!! $cajaDetalle->mtoDiferencia !!}</td>
            <td>{!! $cajaDetalle->aperturado !!}</td>
            <td>{!! $cajaDetalle->idMoneda !!}</td>
            <td>{!! $cajaDetalle->idEmpleado !!}</td>
            <td>{!! $cajaDetalle->idWorkstation !!}</td>
            <td>
                {!! Form::open(['route' => ['cajaDetalles.destroy', $cajaDetalle->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('cajaDetalles.show', [$cajaDetalle->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('cajaDetalles.edit', [$cajaDetalle->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>