<table class="table table-responsive" id="hORARIOMUCS-table">
    <thead>
        <tr>
            <th>Idruta</th>
        <th>Horas</th>
        <th>Bus</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($hORARIOMUCS as $hORARIOMUC)
        <tr>
            <td>{!! $hORARIOMUC->idRuta !!}</td>
            <td>{!! $hORARIOMUC->Horas !!}</td>
            <td>{!! $hORARIOMUC->bus !!}</td>
            <td>
                {!! Form::open(['route' => ['hORARIOMUCS.destroy', $hORARIOMUC->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('hORARIOMUCS.show', [$hORARIOMUC->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('hORARIOMUCS.edit', [$hORARIOMUC->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>