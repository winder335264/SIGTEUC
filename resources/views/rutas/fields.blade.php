<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control','required']) !!}
</div>

<!-- Latitud Field -->
<div class="form-group col-sm-6">
    {!! Form::label('latitud', 'Latitud:') !!}
    {!! Form::number('latitud', null, ['class' => 'form-control','required']) !!}
</div>

<!-- Longitud Field -->
<div class="form-group col-sm-6">
    {!! Form::label('longitud', 'Longitud:') !!}
    {!! Form::number('longitud', null, ['class' => 'form-control','required']) !!}
</div>

<!-- Cantidad Parada Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cantidad_parada', 'Cantidad Parada:') !!}
    {!! Form::number('cantidad_parada', null, ['class' => 'form-control','required']) !!}
</div>

<!-- Cantidad Viaje Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cantidad_viaje', 'Cantidad Viaje:') !!}
    {!! Form::number('cantidad_viaje', null, ['class' => 'form-control','required']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('descripcion', 'descripcion:') !!}
    {!! Form::number('descripcion', 0, ['class' => 'form-control','required']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('distancia', 'Distancia:') !!}
    {!! Form::text('distancia', null, ['class' => 'form-control','required']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('Duracion', 'Duracion:') !!}
    {!! Form::text('duracion', null, ['class' => 'form-control','required']) !!}
</div>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('rutas.index') !!}" class="btn btn-default">Cancel</a>
</div>
