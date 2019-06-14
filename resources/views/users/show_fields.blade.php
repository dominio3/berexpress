<!-- BODY
    http://localhost/berexpress/public/users/:id -->

<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $user->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Nombre:') !!}
    <p>{!! $user->name !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'E-mail:') !!}
    <p>{!! $user->email !!}</p>
</div>

<!-- Password Field -->
<div class="form-group">
    {!! Form::label('password', 'Contraseña:') !!}
    <p>{!! $user->password !!}</p>
</div>

<!-- Remember Token Field 
<div class="form-group">
    {!! Form::label('remember_token', 'Remember Token:') !!}
    <p>{!! $user->remember_token !!}</p>
</div>
-->

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Calle domicilio:') !!}
    <p>{!! $user->address !!}</p>
</div>

<!-- Number Field -->
<div class="form-group">
    {!! Form::label('number', 'Número puerta:') !!}
    <p>{!! $user->number !!}</p>
</div>

<!-- State Field -->
<div class="form-group">
    {!! Form::label('state', 'Localidad:') !!}
    <p>{!! $user->state !!}</p>
</div>

<!-- Phone Field -->
<div class="form-group">
    {!! Form::label('phone', 'Teléfono:') !!}
    <p>{!! $user->phone !!}</p>
</div>

<!-- Role Field -->
<div class="form-group">
    {!! Form::label('role', 'Rol:') !!}
    <p>{!! $user->role !!}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Foto:') !!}
    <p>{!! $user->image !!}</p>
</div>

<!-- Visibility Field -->
<div class="form-group">
    {!! Form::label('visibility', 'Visibilidad:') !!}
    <p>{!! $user->visibility !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Actualizado:') !!}
    <p>{!! $user->updated_at !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Creado:') !!}
    <p>{!! $user->created_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Eliminado:') !!}
    <p>{!! $user->deleted_at !!}</p>
</div>

