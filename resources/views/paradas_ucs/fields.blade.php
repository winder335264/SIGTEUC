<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Latitud Field -->
<div class="form-group col-sm-6">
    {!! Form::label('latitud', 'Latitud:') !!}
    {!! Form::text('latitud', null, ['class' => 'form-control']) !!}
</div>

<!-- Longitud Field -->
<div class="form-group col-sm-6">
    {!! Form::label('longitud', 'Longitud:') !!}
    {!! Form::text('longitud', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('paradasUcs.index') !!}" class="btn btn-default">Cancel</a>
</div>
