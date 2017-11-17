@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Caja Detalle
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($cajaDetalle, ['route' => ['cajaDetalles.update', $cajaDetalle->id], 'method' => 'patch']) !!}

                        @include('caja_detalles.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection