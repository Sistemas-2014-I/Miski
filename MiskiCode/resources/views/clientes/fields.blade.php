<!-- Esnatural Field -->
<div class="form-group col-sm-6">
    {!! Form::label('esNatural', 'Esnatural:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('esNatural', false) !!}
        {!! Form::checkbox('esNatural', '1', null) !!} 1
    </label>
</div>

<!-- Idsujeto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idSujeto', 'Idsujeto:') !!}
    {!! Form::number('idSujeto', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('clientes.index') !!}" class="btn btn-default">Cancel</a>
</div>
