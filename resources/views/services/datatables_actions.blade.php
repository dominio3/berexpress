@if (Auth::user()->role === 'Administrador')
    {!! Form::open(['route' => ['services.destroy', $id], 'method' => 'delete']) !!}
    <div class='btn-group'>
        <a href="{{ route('services.show', $id) }}" class='btn btn-default btn-xs'>
            <i class="glyphicon glyphicon-eye-open"></i>
        </a>
        <a href="{{ route('services.edit', $id) }}" class='btn btn-default btn-xs'>
            <i class="glyphicon glyphicon-edit"></i>
        </a>
        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
            'type' => 'submit',
            'class' => 'btn btn-danger btn-xs',
            'onclick' => "return confirm('¿Está seguro de eliminar el servicio?')"
        ]) !!}
    </div>
    {!! Form::close() !!}
@else

@endif


