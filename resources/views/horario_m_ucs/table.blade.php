<table class="table table-responsive" id="horarioMUcs-table">
    <thead>
        <tr>
            <th>Idruta</th>
        <th>Horas</th>
        <th>Bus</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($horarioMUcs as $horarioMUc)
        <tr>
            <td>{!! $horarioMUc->idRuta !!}</td>
            <td>{!! $horarioMUc->horas !!}</td>
            <td>{!! $horarioMUc->bus !!}</td>
            <td>
                {!! Form::open(['route' => ['horarioMUcs.destroy', $horarioMUc->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('horarioMUcs.show', [$horarioMUc->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('horarioMUcs.edit', [$horarioMUc->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>