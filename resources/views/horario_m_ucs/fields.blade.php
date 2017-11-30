<!-- Horas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('horas', 'Horas:') !!}
    {!! Form::text('horas', null, ['class' => 'form-control']) !!}
</div>

<!-- Bus Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bus', 'Bus:') !!}
    {!! Form::text('bus', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('horarioMUcs.index') !!}" class="btn btn-default">Cancel</a>
</div>
