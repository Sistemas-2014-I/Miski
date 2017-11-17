@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Seccion
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($seccion, ['route' => ['seccions.update', $seccion->id], 'method' => 'patch']) !!}

                        @include('seccions.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection