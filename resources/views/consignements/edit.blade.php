@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Consignaciones
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($consignement, ['route' => ['consignements.update', $consignement->id], 'method' => 'patch']) !!}

                        @include('consignements.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection