<table class="table table-responsive" id="paradas-table">
    <thead>
        <tr>
            <th>Idruta</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Latitud</th>
        <th>Longitud</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($paradas as $parada)
        <tr>
            <td>{!! $parada->idRuta !!}</td>
            <td>{!! $parada->nombre !!}</td>
            <td>{!! $parada->descripcion !!}</td>
            <td>{!! $parada->latitud !!}</td>
            <td>{!! $parada->longitud !!}</td>
            <td>
                {!! Form::open(['route' => ['paradas.destroy', $parada->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('paradas.show', [$parada->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('paradas.edit', [$parada->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>