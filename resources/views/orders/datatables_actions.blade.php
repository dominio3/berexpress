{!! Form::open(['route' => ['orders.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    @if (Auth::user()->role === 'Administrador')
        <a href="{{ route('orders.show', $id) }}" class='btn btn-default btn-xs'>
            <i class="glyphicon glyphicon-eye-open"></i>
        </a>
        <a href="{{ route('orders.edit', $id) }}" class='btn btn-default btn-xs'>
            <i class="glyphicon glyphicon-edit"></i>
        </a>
        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
            'type' => 'submit',
            'class' => 'btn btn-danger btn-xs',
            'onclick' => "return confirm('¿Está seguro de eliminar el pedido?')"
        ]) !!}

    @elseif (Auth::user()->role === 'Cliente')
        <a href="{{ route('orders.show', $id) }}" class='btn btn-default btn-xs'>
            <i class="glyphicon glyphicon-eye-open"></i>
        </a>   
        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
            'type' => 'submit',
            'class' => 'btn btn-danger btn-xs',
            'onclick' => "return confirm('¿Está seguro de eliminar el pedido?')"
        ]) !!}
    @elseif (Auth::user()->role === 'Cadete')
        <a href="{{ route('orders.show', $id) }}" class='btn btn-default btn-xs'>
            <i class="glyphicon glyphicon-eye-open"></i>
        </a>      
        <a href="{{ route('orders.edit', $id) }}" class='btn btn-default btn-xs'>
            <i class="glyphicon glyphicon-edit"></i>
        </a>
    @else
        
    @endif
</div>
{!! Form::close() !!}

<!--
    {!! Form::open(['route' => ['orders.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('orders.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    <a href="{{ route('orders.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('¿Está seguro de eliminar el pedido?')"
    ]) !!}
</div>
{!! Form::close() !!}
-->