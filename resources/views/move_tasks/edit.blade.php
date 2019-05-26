@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Move Task
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($moveTask, ['route' => ['moveTasks.update', $moveTask->id], 'method' => 'patch']) !!}

                        @include('move_tasks.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection