<li class="{{ Request::is('locations*') ? 'active' : '' }}">
    @if (Auth::user()->role === 'Administrador')
        <a href="{!! route('locations.index') !!}"><i class="fa fa-edit"></i><span>Ubicaciones</span></a>
    @elseif (Auth::user()->role === 'Cliente')
        <!-- VER SOLO UBICACIONES DEL USER CLIENTE DataTables/LocationDataTable -->
        <a href="{!! route('locations.index') !!}"><i class="fa fa-edit"></i><span>Mis Ubicaciones</span></a>
    @else
        <span></span>
    @endif    
</li>

<li class="{{ Request::is('services*') ? 'active' : '' }}">
    @if (Auth::user()->role === 'Administrador' || Auth::user()->role === 'Cliente')
        <a href="{!! route('services.index') !!}"><i class="fa fa-edit"></i><span>Servicios y Costos</span></a>
    @else
        <span></span>
    @endif
</li>

<li class="{{ Request::is('orders*') ? 'active' : '' }}">
    @if (Auth::user()->role === 'Administrador')
        <a href="{!! route('orders.index') !!}"><i class="fa fa-edit"></i><span>Pedidos</span></a>
    @elseif (Auth::user()->role === 'Cliente' || Auth::user()->role === 'Cadete')
        <!-- VER SOLO PEDIDOS DEL USER CLIENTE/CADETE DataTables/OrderDataTable -->
        <a href="{!! route('orders.index') !!}"><i class="fa fa-edit"></i><span>Mis Pedidos</span></a>
    @else
        <span></span>
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
