@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tareas Pendientes
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'moveTasks.store']) !!}

                        @include('move_tasks.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
