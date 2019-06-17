@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Pedidos</h1>
        @if (Auth::user()->role === 'Administrador' || Auth::user()->role === 'Cliente')
            <h1 class="pull-right">
                <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('orders.create') !!}">Agregar nuevo</a>
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
                    @include('orders.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

