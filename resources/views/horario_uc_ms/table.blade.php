<table class="table table-responsive" id="horarioUcMs-table">
    <thead>
        <tr>
            <th>Idruta</th>
        <th>Horas</th>
        <th>Bus</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($horarioUcMs as $horarioUcM)
        <tr>
            <td>{!! $horarioUcM->idRuta !!}</td>
            <td>{!! $horarioUcM->horas !!}</td>
            <td>{!! $horarioUcM->bus !!}</td>
            <td>
                {!! Form::open(['route' => ['horarioUcMs.destroy', $horarioUcM->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('horarioUcMs.show', [$horarioUcM->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('horarioUcMs.edit', [$horarioUcM->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>