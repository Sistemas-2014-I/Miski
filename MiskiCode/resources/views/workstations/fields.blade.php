<!-- Cod Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cod', 'Cod:') !!}
    {!! Form::text('cod', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Aperturado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('aperturado', 'Aperturado:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('aperturado', false) !!}
        {!! Form::checkbox('aperturado', '1', null) !!} 1
    </label>
</div>

<!-- Activo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activo', 'Activo:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('activo', false) !!}
        {!! Form::checkbox('activo', '1', null) !!} 1
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('workstations.index') !!}" class="btn btn-default">Cancel</a>
</div>
