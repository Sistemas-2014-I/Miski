@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Comprobante Detalle
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($comprobanteDetalle, ['route' => ['comprobanteDetalles.update', $comprobanteDetalle->id], 'method' => 'patch']) !!}

                        @include('comprobante_detalles.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection