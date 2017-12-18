<li class="{{ Request::is('hORARIOMUCS*') ? 'active' : '' }}">
    <a href="{!! route('hORARIOMUCS.index') !!}"><i class="fa fa-clock-o"></i><span>Horarios Muncp a UC</span></a>
</li>

<li class="{{ Request::is('horarioUcMs*') ? 'active' : '' }}">
    <a href="{!! route('horarioUcMs.index') !!}"><i class="fa fa-clock-o"></i><span>Horarios UC a Muncp</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-user"></i><span>Usuarios</span></a>
</li>
<li class="{{ Request::is('rutas*') ? 'active' : '' }}">
    <a href="{!! route('rutas.index') !!}"><i class="fa fa-road"></i><span>Rutas</span></a>
</li>
<li class="{{ Request::is('paradas*') ? 'active' : '' }}">
    <a href="{!! route('paradas.index') !!}"><i class="fa fa-map-marker"></i><span>Paradas externas</span></a>
</li>
<li class="{{ Request::is('paradasUcs*') ? 'active' : '' }}">
    <a href="{!! route('paradasUcs.index') !!}"><i class="fa fa-map-marker"></i><span>Paradas internas </span></a>
</li>

