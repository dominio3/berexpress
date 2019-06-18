<!-- CREACION Y EDICION DE ORDERS --> 
<!-- FILTRADO POR ROL --> 

@if (Auth::user()->role === 'Administrador')
    <!-- Date Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('date', 'Fecha:') !!}
        {!! Form::date('date', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Services Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('services_id', 'Servicio:') !!}
        {!! Form::select('services_id', $services ,  null, ['class' => 'form-control']) !!}
    </div>

    <!-- Origin Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('origin', 'Origen:') !!}
        {!! Form::select('origin', $origin , null, ['class' => 'form-control', 'require']) !!}
    </div>

    <!-- Destination Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('destination', 'Destino:') !!}
        {!! Form::select('destination', $destination , null, ['class' => 'form-control', 'require']) !!}
    </div>

    <!-- Distance Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('distance', 'Distancia:') !!}
        {!! Form::number('distance', null, ['class' => 'form-control', 'disabled']) !!}
    </div>

    <!-- Contact Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('contact_name', 'Nombre de contacto:') !!}
        {!! Form::text('contact_name', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Contact Phone Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('contact_phone', 'Telefono de contacto:') !!}
        {!! Form::text('contact_phone', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Takes Field 
    <div class="form-group col-sm-6">
        {!! Form::label('takes', 'Takes:') !!}
        {!! Form::text('takes', null, ['class' => 'form-control']) !!}
    </div>
    -->

    <!-- Rain Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('rain', 'Lluvia:') !!}
        {!! Form::select('rain', $rain , null, ['class' => 'form-control']) !!}
    </div>

    <!-- Bulk Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('bulk', 'Bultos:') !!}
        {!! Form::number('bulk', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Priority Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('priority', 'Prioridad:') !!}
        {!! Form::select('priority',$priority , null, ['class' => 'form-control']) !!}
    </div>

    <!-- Observations Field -->
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('observations', 'Observaciones:') !!}
        {!! Form::textarea('observations', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Subtotal Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('subtotal', 'Subtotal:') !!}
        {!! Form::number('subtotal', null, ['class' => 'form-control', 'disabled']) !!}
    </div>

    <!-- Status Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('status', 'Estado:') !!}
        {!! Form::select('status',$status , null, ['class' => 'form-control' ]) !!}
    </div>

    <!-- Users Id Field -->
    <div class="form-group col-sm-6">
    {!! Form::label('users_id', 'ID Usuario:') !!}
        {!! Form::number('users_id', Auth::user()->id , ['class' => 'form-control']) !!}
    </div>

    <!-- Users Name Field -->
        <div class="form-group col-sm-6">
        {!! Form::label('name', 'Nombre Usuario:') !!}
        {!! Form::text('users_id', Auth::user()->name , ['class' => 'form-control']) !!}
    </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('orders.index') !!}" class="btn btn-default">Cancelar</a>
    </div>

@elseif (Auth::user()->role === 'Cliente')
    <!-- Date Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('date', 'Fecha:') !!}
        {!! Form::date('date', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Services Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('services_id', 'Servicio:') !!}
        {!! Form::select('services_id', $services ,  null, ['class' => 'form-control']) !!}
    </div>

    <!-- Origin Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('origin', 'Origen:') !!}
        {!! Form::select('origin', $origin , null, ['class' => 'form-control', 'require']) !!}
    </div>

    <!-- Destination Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('destination', 'Destino:') !!}
        {!! Form::select('destination', $destination , null, ['class' => 'form-control', 'require']) !!}
    </div>

    <!-- Distance Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('distance', 'Distanciaaaa:') !!}
        {!! Form::number('distance', null, ['class' => 'form-control', 'disabled']) !!}
    </div>

    <!-- Contact Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('contact_name', 'Nombre de contacto:') !!}
        {!! Form::text('contact_name', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Contact Phone Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('contact_phone', 'Telefono de contacto:') !!}
        {!! Form::text('contact_phone', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Takes Field 
    <div class="form-group col-sm-6">
        {!! Form::label('takes', 'Takes:') !!}
        {!! Form::text('takes', null, ['class' => 'form-control']) !!}
    </div>
    -->

    <!-- Rain Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('rain', 'Lluvia:') !!}
        {!! Form::select('rain', $rain , null, ['class' => 'form-control']) !!}
    </div>

    <!-- Bulk Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('bulk', 'Bultos:') !!}
        {!! Form::number('bulk', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Priority Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('priority', 'Prioridad:') !!}
        {!! Form::select('priority',$priority , null, ['class' => 'form-control']) !!}
    </div>

    <!-- Observations Field -->
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('observations', 'Observaciones:') !!}
        {!! Form::textarea('observations', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Subtotal Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('subtotal', 'Subtotal:') !!}
        {!! Form::number('subtotal', null, ['class' => 'form-control', 'disabled']) !!}
    </div>

    <!-- Status Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('status', 'Estado:') !!}
        {!! Form::select('status',$status , null, ['class' => 'form-control', 'disabled']) !!}             
    </div>

    <!-- Users Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::number('users_id', Auth::user()->id , ['class' => 'form-control hidden']) !!}
    </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('orders.index') !!}" class="btn btn-default">Cancelar</a>
    </div>

@elseif (Auth::user()->role === 'Cadete')
    <!-- Date Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('date', 'Fecha:') !!}
        {!! Form::date('date', null, ['class' => 'form-control', 'disabled']) !!}
    </div>

    <!-- Services Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('services_id', 'Servicio:') !!}
        {!! Form::select('services_id', $services ,  null, ['class' => 'form-control', 'disabled']) !!}
    </div>

    <!-- Origin Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('origin', 'Origen:') !!}
        {!! Form::select('origin', $origin , null, ['class' => 'form-control', 'require']) !!}
    </div>

    <!-- Destination Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('destination', 'Destino:') !!}
        {!! Form::select('destination', $destination , null, ['class' => 'form-control', 'require']) !!}
    </div>

    <!-- Distance Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('distance', 'Distancia:') !!}
        {!! Form::number('distance', null, ['class' => 'form-control', 'disabled']) !!}
    </div>

    <!-- Contact Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('contact_name', 'Nombre de contacto:') !!}
        {!! Form::text('contact_name', null, ['class' => 'form-control', 'disabled']) !!}
    </div>

    <!-- Contact Phone Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('contact_phone', 'Telefono de contacto:') !!}
        {!! Form::text('contact_phone', null, ['class' => 'form-control', 'disabled']) !!}
    </div>

    <!-- Takes Field 
    <div class="form-group col-sm-6">
        {!! Form::label('takes', 'Takes:') !!}
        {!! Form::text('takes', null, ['class' => 'form-control', 'disabled']) !!}
    </div>
    -->

    <!-- Rain Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('rain', 'Lluvia:') !!}
        {!! Form::select('rain', $rain , null, ['class' => 'form-control', 'disabled']) !!}
    </div>

    <!-- Bulk Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('bulk', 'Bultos:') !!}
        {!! Form::number('bulk', null, ['class' => 'form-control', 'disabled']) !!}
    </div>

    <!-- Priority Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('priority', 'Prioridad:') !!}
        {!! Form::select('priority',$priority , null, ['class' => 'form-control', 'disabled']) !!}
    </div>

    <!-- Observations Field -->
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('observations', 'Observaciones:') !!}
        {!! Form::textarea('observations', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Subtotal Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('subtotal', 'Subtotal:') !!}
        {!! Form::number('subtotal', null, ['class' => 'form-control', 'disabled']) !!}
    </div>

    <!-- Status Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('status', 'Estado:') !!}
        <!-- CADETE solo debe poder seleccionar algunos estados -->           
        {!! Form::select('status', $statusCadete, null, ['class' => 'form-control' ]) !!}
    </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('orders.index') !!}" class="btn btn-default">Cancelar</a>
    </div>
@else
        
@endif
