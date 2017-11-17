@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Presentacion
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($presentacion, ['route' => ['presentacions.update', $presentacion->id], 'method' => 'patch']) !!}

                        @include('presentacions.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection