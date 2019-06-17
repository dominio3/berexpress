<!-- CREACION Y EDICION DE USERS --> 
<!-- FILTRADO POR ROL --> 

@if (Auth::user()->role === 'Administrador')
    <!-- Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('name', 'Nombre:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Email Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('email', 'E-mail:') !!}
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Password Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('password', 'Contraseña:') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>

    <!-- Remember Token Field 
    <div class="form-group col-sm-6">
        {!! Form::label('remember_token', 'Remember Token:') !!}
        {!! Form::text('remember_token', null, ['class' => 'form-control', 'disabled']) !!}
    </div>
    -->

    <!-- Address Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('address', 'Calle domicilio:') !!}
        {!! Form::text('address', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Number Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('number', 'Número puerta:') !!}
        {!! Form::number('number', null, ['class' => 'form-control']) !!}
    </div>

    <!-- State Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('state', 'Localidad:') !!}
        {!! Form::text('state', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Phone Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('phone', 'Teléfono:') !!}
        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Role Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('role', 'Rol:') !!}
        {!! Form::select('role', $roles , null, ['class' => 'form-control']) !!}
    </div>

    <!-- Image Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('image', 'Foto:') !!}
        {!! Form::text('image', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Visibility Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('visibility', 'Visibilidad:') !!}
        {!! Form::select('visibility', ['Habilitado', 'Deshabilitado'], null, ['class' => 'form-control']) !!}
    </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('users.index') !!}" class="btn btn-default">Cancelar</a>
    </div>

@elseif (Auth::user()->role === 'SuperUser')
    <!-- Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('name', 'Nombre:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Email Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('email', 'E-mail:') !!}
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Password Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('password', 'Contraseña:') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>

    <!-- Remember Token Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('remember_token', 'Remember Token:') !!}
        {!! Form::text('remember_token', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Address Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('address', 'Calle domicilio:') !!}
        {!! Form::text('address', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Number Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('number', 'Número puerta:') !!}
        {!! Form::number('number', null, ['class' => 'form-control']) !!}
    </div>

    <!-- State Field 
    <div class="form-group col-sm-6">
        {!! Form::label('state', 'Localidad:') !!}
        {!! Form::text('state', null, ['class' => 'form-control']) !!}
    </div>
    -->

    <!-- Phone Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('phone', 'Teléfono:') !!}
        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Role Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('role', 'Rol:') !!}
        {!! Form::select('role', $roles , null, ['class' => 'form-control']) !!}
    </div>

    <!-- Image Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('image', 'Foto:') !!}
        {!! Form::text('image', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Visibility Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('visibility', 'Visibilidad:') !!}
        {!! Form::select('visibility', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('users.index') !!}" class="btn btn-default">Cancelar</a>
    </div>

    @else
        <!-- Name Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('name', 'Nombre:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Email Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('email', 'E-mail:') !!}
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Password Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('password', 'Contraseña:') !!}
            {!! Form::password('password', ['class' => 'form-control', 'disabled']) !!}
        </div>

        <!-- Remember Token Field 
        <div class="form-group col-sm-6">
            {!! Form::label('remember_token', 'Remember Token:') !!}
            {!! Form::text('remember_token', null, ['class' => 'form-control', 'disabled']) !!}
        </div>
        -->

        <!-- Address Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('address', 'Calle domicilio:') !!}
            {!! Form::text('address', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Number Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('number', 'Número puerta:') !!}
            {!! Form::number('number', null, ['class' => 'form-control']) !!}
        </div>

        <!-- State Field 
        <div class="form-group col-sm-6">
            {!! Form::label('state', 'Localidad:') !!}
            {!! Form::text('state', null, ['class' => 'form-control']) !!}
        </div>
        -->

        <!-- Phone Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('phone', 'Teléfono:') !!}
            {!! Form::text('phone', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Role Field (Cliente/Cadete/Invitado no lo pueden modificar) -->
        <div class="form-group col-sm-6">
            {!! Form::label('role', 'Rol:') !!}
            {!! Form::select('role', $roles , null, ['class' => 'form-control', 'disabled']) !!}
        </div>

        <!-- Image Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('image', 'Foto:') !!}
            {!! Form::text('image', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Visibility Field 
        <div class="form-group col-sm-6">
            {!! Form::label('visibility', 'Visibilidad:') !!}
            {!! Form::text('visibility', null, ['class' => 'form-control']) !!}
        </div>
        -->

        <!-- Submit Field -->
        <div class="form-group col-sm-12">
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
            <a href="{!! route('users.index') !!}" class="btn btn-default">Cancelar</a>
        </div>

    @endif