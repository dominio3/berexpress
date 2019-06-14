<li class="{{ Request::is('locations*') ? 'active' : '' }}">
    <a href="{!! route('locations.index') !!}"><i class="fa fa-edit"></i><span>Mis Ubicaciones</span></a>
</li>

<li class="{{ Request::is('services*') ? 'active' : '' }}">
    @if (Auth::user()->role === 'Administrador' || Auth::user()->role === 'Cliente')
        <a href="{!! route('services.index') !!}"><i class="fa fa-edit"></i><span>Servicios y Costos</span></a>
    @else
        <!-- VER SOLO PEDIDOS DEL USER CADETE -->
        <span></span>
    @endif
</li>

<li class="{{ Request::is('orders*') ? 'active' : '' }}">
    @if (Auth::user()->role === 'Administrador')
        <a href="{!! route('orders.index') !!}"><i class="fa fa-edit"></i><span>Pedidos</span></a>
    @elseif (Auth::user()->role === 'Cliente')
        <!-- VER SOLO PEDIDOS DEL USER CLIENTE -->
        <a href="{!! route('orders.index') !!}"><i class="fa fa-edit"></i><span>Mis Pedidos (falta implementar)</span></a>
    @else
        <!-- VER SOLO PEDIDOS DEL USER CADETE -->
        <a href="{!! route('orders.index') !!}"><i class="fa fa-edit"></i><span>Mis Pedidos (falta implementar)</span></a>
    @endif
</li>

<li class="{{ Request::is('consignements*') ? 'active' : '' }}">
    @if (Auth::user()->role === 'Administrador')
        <a href="{!! route('consignements.index') !!}"><i class="fa fa-edit"></i><span>Consignaciones</span></a>
    @else
        <span></span>
    @endif
</li>

<li class="{{ Request::is('moveTasks*') ? 'active' : '' }}">
    @if (Auth::user()->role === 'Administrador')
        <a href="{!! route('moveTasks.index') !!}"><i class="fa fa-edit"></i><span>Tareas Pendientes</span></a>
    @else
        <span></span>
    @endif 
</li>
<li class="{{ Request::is('users*') ? 'active' : '' }}">
    @if (Auth::user()->role === 'Administrador')
        <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Usuarios</span></a>
    @else
        <span></span>
    @endif
</li>
