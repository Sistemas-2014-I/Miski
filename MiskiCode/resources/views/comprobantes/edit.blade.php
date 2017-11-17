@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Comprobante
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($comprobante, ['route' => ['comprobantes.update', $comprobante->id], 'method' => 'patch']) !!}

                        @include('comprobantes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection