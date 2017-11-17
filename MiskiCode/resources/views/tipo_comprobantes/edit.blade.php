@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tipo Comprobante
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tipoComprobante, ['route' => ['tipoComprobantes.update', $tipoComprobante->id], 'method' => 'patch']) !!}

                        @include('tipo_comprobantes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection