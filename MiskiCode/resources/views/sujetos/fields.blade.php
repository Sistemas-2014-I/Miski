<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Apellidomaterno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellidoMaterno', 'Apellidomaterno:') !!}
    {!! Form::text('apellidoMaterno', null, ['class' => 'form-control']) !!}
</div>

<!-- Apellidopaterno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellidoPaterno', 'Apellidopaterno:') !!}
    {!! Form::text('apellidoPaterno', null, ['class' => 'form-control']) !!}
</div>

<!-- Numdoc Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numDoc', 'Numdoc:') !!}
    {!! Form::text('numDoc', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono', 'Telefono:') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
</div>

<!-- Correo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('correo', 'Correo:') !!}
    {!! Form::text('correo', null, ['class' => 'form-control']) !!}
</div>

<!-- Masculino Field -->
<div class="form-group col-sm-6">
    {!! Form::label('masculino', 'Masculino:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('masculino', false) !!}
        {!! Form::checkbox('masculino', '1', null) !!} 1
    </label>
</div>

<!-- Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion', 'Direccion:') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
</div>

<!-- Avatar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('avatar', 'Avatar:') !!}
    {!! Form::text('avatar', null, ['class' => 'form-control']) !!}
</div>

<!-- Iddocidentidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idDocIdentidad', 'Iddocidentidad:') !!}
    {!! Form::number('idDocIdentidad', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('sujetos.index') !!}" class="btn btn-default">Cancel</a>
</div>
