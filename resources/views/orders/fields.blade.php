<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::date('date', null, ['class' => 'form-control']) !!}
</div>

<!-- Services Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('services_id', 'Services Id:') !!}
    {!! Form::select('services_id', $services ,  null, ['class' => 'form-control']) !!}
</div>

<!-- Origin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('origin', 'Origen:') !!}
    {!! Form::select('origin', $origin , null, ['class' => 'form-control']) !!}
</div>

<!-- Destination Field -->
<div class="form-group col-sm-6">
    {!! Form::label('destination', 'Destino:') !!}
    {!! Form::select('destination', $destination , null, ['class' => 'form-control']) !!}
</div>

<!-- Distance Field -->
<div class="form-group col-sm-6">
    {!! Form::label('distance', 'Distancia:') !!}
    {!! Form::number('distance', null, ['class' => 'form-control']) !!}
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

<!-- Takes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('takes', 'Takes:') !!}
    {!! Form::text('takes', null, ['class' => 'form-control']) !!}
</div>

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
    {!! Form::number('subtotal', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Estado:') !!}
    {!! Form::select('status',$status , null, ['class' => 'form-control' ]) !!}
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
