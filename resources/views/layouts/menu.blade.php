<li class="{{ Request::is('locations*') ? 'active' : '' }}">
    <a href="{!! route('locations.index') !!}"><i class="fa fa-edit"></i><span>Mis Ubicaciones</span></a>
</li>

<li class="{{ Request::is('services*') ? 'active' : '' }}">
    <a href="{!! route('services.index') !!}"><i class="fa fa-edit"></i><span>Servicios y Costos</span></a>
</li>

<li class="{{ Request::is('orders*') ? 'active' : '' }}">
    <a href="{!! route('orders.index') !!}"><i class="fa fa-edit"></i><span>Pedidos</span></a>
</li>

<li class="{{ Request::is('consignements*') ? 'active' : '' }}">
    <a href="{!! route('consignements.index') !!}"><i class="fa fa-edit"></i><span>Ruteo</span></a>
</li>

<li class="{{ Request::is('moveTasks*') ? 'active' : '' }}">
    <a href="{!! route('moveTasks.index') !!}"><i class="fa fa-edit"></i><span>Tareas Pendientes</span></a>
</li>
<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Usuarios</span></a>
</li>
