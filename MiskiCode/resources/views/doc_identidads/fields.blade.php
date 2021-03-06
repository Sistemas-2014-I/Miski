<!-- Cod Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cod', 'Cod:') !!}
    {!! Form::text('cod', null, ['class' => 'form-control']) !!}
</div>

<!-- Abrv Field -->
<div class="form-group col-sm-6">
    {!! Form::label('abrv', 'Abrv:') !!}
    {!! Form::text('abrv', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
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
    <a href="{!! route('docIdentidads.index') !!}" class="btn btn-default">Cancel</a>
</div>
