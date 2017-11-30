<table class="table table-responsive" id="paradasUcs-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Latitud</th>
        <th>Longitud</th>
        <th>Descripcion</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($paradasUcs as $paradasUc)
        <tr>
            <td>{!! $paradasUc->nombre !!}</td>
            <td>{!! $paradasUc->latitud !!}</td>
            <td>{!! $paradasUc->longitud !!}</td>
            <td>{!! $paradasUc->descripcion !!}</td>
            <td>
                {!! Form::open(['route' => ['paradasUcs.destroy', $paradasUc->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('paradasUcs.show', [$paradasUc->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('paradasUcs.edit', [$paradasUc->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>