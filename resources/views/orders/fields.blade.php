<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::date('date', null, ['class' => 'form-control']) !!}
</div>

<!-- Services Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('services_id', 'Services Id:') !!}
    {!! Form::select('services_id', $services , null, ['class' => 'form-control', 'placeholder' => 'Seleccione Servicio']) !!}
</div>

<!-- Origin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('origin', 'Origin:') !!}
    {!! Form::select('origin', $locations , null, ['class' => 'form-control', 'placeholder' => 'Seleccione Origen']) !!}
</div>

<!-- Destination Field -->
<div class="form-group col-sm-6">
    {!! Form::label('destination', 'Destination:') !!}
    {!! Form::select('destination', $locations , null, ['class' => 'form-control', 'placeholder' => 'Seleccione Destino']) !!}
</div>

<!-- Distance Field -->
<div class="form-group col-sm-6">
    {!! Form::label('distance', 'Distance:') !!}
    {!! Form::number('distance', null, ['class' => 'form-control']) !!}
</div>

<!-- Contact Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact_name', 'Contact Name:') !!}
    {!! Form::text('contact_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Contact Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact_phone', 'Contact Phone:') !!}
    {!! Form::text('contact_phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Takes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('takes', 'Takes:') !!}
    {!! Form::text('takes', null, ['class' => 'form-control']) !!}
</div>

<!-- Rain Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rain', 'Rain:') !!}
    {!! Form::text('rain', null, ['class' => 'form-control']) !!}
</div>

<!-- Bulk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bulk', 'Bulk:') !!}
    {!! Form::number('bulk', null, ['class' => 'form-control']) !!}
</div>

<!-- Observations Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('observations', 'Observations:') !!}
    {!! Form::textarea('observations', null, ['class' => 'form-control']) !!}
</div>

<!-- Subtotal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subtotal', 'Subtotal:') !!}
    {!! Form::number('subtotal', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', $status, null, ['class' => 'form-control' , 'readonly']) !!}
</div>

<!-- Users Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('users_id', 'Users Id:') !!}
    {!! Form::number('users_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('orders.index') !!}" class="btn btn-default">Cancel</a>
</div>