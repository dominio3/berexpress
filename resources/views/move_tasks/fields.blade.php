<!-- Consignement Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('consignement_id', 'Id Consignación:') !!}
    {!! Form::number('consignement_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Users Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('users_id', 'Id Usuario:') !!}
    {!! Form::number('users_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('moveTasks.index') !!}" class="btn btn-default">Cancelar</a>
</div>
