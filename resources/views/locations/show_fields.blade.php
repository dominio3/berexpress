<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $location->id !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Descripción:') !!}
    <p>{!! $location->description !!}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Calle domicilio:') !!}
    <p>{!! $location->address !!}</p>
</div>

<!-- Number Field -->
<div class="form-group">
    {!! Form::label('number', 'Numero puerta:') !!}
    <p>{!! $location->number !!}</p>
</div>

<!-- Town Field -->
<div class="form-group">
    {!! Form::label('town', 'Partido:') !!}
    <p>{!! $location->town !!}</p>
</div>

<!-- Postal Code Field -->
<div class="form-group">
    {!! Form::label('postal_code', 'Código Postal:') !!}
    <p>{!! $location->postal_code !!}</p>
</div>

<!-- Country Field -->
<div class="form-group">
    {!! Form::label('country', 'Pais:') !!}
    <p>{!! $location->country !!}</p>
</div>

<!-- Latitude Field -->
<div class="form-group">
    {!! Form::label('latitude', 'Latitud:') !!}
    <p>{!! $location->latitude !!}</p>
</div>

<!-- Longitude Field -->
<div class="form-group">
    {!! Form::label('longitude', 'Longitud:') !!}
    <p>{!! $location->longitude !!}</p>
</div>

<!-- Atention Hour Field -->
<div class="form-group">
    {!! Form::label('atention_hour', 'Horario de atención:') !!}
    <p>{!! $location->atention_hour !!}</p>
</div>

<!-- Users Id Field -->
<div class="form-group">
    {!! Form::label('users_id', 'Id Usuario:') !!}
    <p>{!! $location->users_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Creado:') !!}
    <p>{!! $location->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Actualizado:') !!}
    <p>{!! $location->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Eliminado:') !!}
    <p>{!! $location->deleted_at !!}</p>
</div>

