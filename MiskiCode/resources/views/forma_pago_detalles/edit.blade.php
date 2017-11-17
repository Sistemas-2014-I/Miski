@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Forma Pago Detalle
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($formaPagoDetalle, ['route' => ['formaPagoDetalles.update', $formaPagoDetalle->id], 'method' => 'patch']) !!}

                        @include('forma_pago_detalles.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection