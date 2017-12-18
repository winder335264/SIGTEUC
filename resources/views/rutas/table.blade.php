<table class="table table-responsive" id="rutas-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Latitud</th>
        <th>Longitud</th>
        <th>Cantidad Parada</th>
        <th>Cantidad Viaje</th>
        <th>Distancia</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($rutas as $ruta)
        <tr>
            <td>{!! $ruta->nombre !!}</td>
            <td>{!! $ruta->latitud !!}</td>
            <td>{!! $ruta->longitud !!}</td>
            <td>{!! $ruta->cantidad_parada !!}</td>
            <td>{!! $ruta->cantidad_viaje !!}</td>
            <td>{!! $ruta->distancia !!}</td>
            <td>
                {!! Form::open(['route' => ['rutas.destroy', $ruta->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('rutas.show', [$ruta->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('rutas.edit', [$ruta->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>