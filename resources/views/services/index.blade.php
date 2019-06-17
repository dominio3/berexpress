@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Servicios</h1>
        @if (Auth::user()->role === 'Administrador')
            <h1 class="pull-right">
                <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('services.create') !!}">Agregar nuevo</a>
            </h1>
        @else
        @endif
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('services.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

