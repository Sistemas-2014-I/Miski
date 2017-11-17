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

<!-- Colorhexadecimal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('colorHexadecimal', 'Colorhexadecimal:') !!}
    {!! Form::text('colorHexadecimal', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('estadoPedidos.index') !!}" class="btn btn-default">Cancel</a>
</div>
