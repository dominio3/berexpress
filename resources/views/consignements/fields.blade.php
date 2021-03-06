<!-- Document Field -->
<div class="form-group col-sm-6">
    {!! Form::label('document', 'Documento:') !!}
    {!! Form::text('document', null, ['class' => 'form-control']) !!}
</div>

<!-- Line01 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('line01', 'Line01:') !!}
    {!! Form::number('line01', null, ['class' => 'form-control']) !!}
</div>

<!-- Line02 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('line02', 'Line02:') !!}
    {!! Form::number('line02', null, ['class' => 'form-control']) !!}
</div>

<!-- Line03 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('line03', 'Line03:') !!}
    {!! Form::number('line03', null, ['class' => 'form-control']) !!}
</div>

<!-- Line04 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('line04', 'Line04:') !!}
    {!! Form::number('line04', null, ['class' => 'form-control']) !!}
</div>

<!-- Line05 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('line05', 'Line05:') !!}
    {!! Form::number('line05', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_price', 'Precio total:') !!}
    {!! Form::number('total_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Estado:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Users Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('users_id', 'Id Usuario:') !!}
    {!! Form::number('users_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('consignements.index') !!}" class="btn btn-default">Cancelar</a>
</div>
