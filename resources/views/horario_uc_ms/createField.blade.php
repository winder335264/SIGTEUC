<!-- Horas Field -->

<div class="form-group col-sm-6">
    {!! Form::label('idRuta', 'idRuta:') !!}
    {!! Form::text('idRuta', null , ['class' => 'form-control','required']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('horas', 'Horas:') !!}
    {!! Form::text('Horas', null , ['class' => 'form-control','required']) !!}
</div>

<!-- Bus Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bus', 'Bus:') !!}
    {!! Form::text('bus', null, ['class' => 'form-control','required']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('horarioUcMs.index') !!}" class="btn btn-default">Cancel</a>
</div>
