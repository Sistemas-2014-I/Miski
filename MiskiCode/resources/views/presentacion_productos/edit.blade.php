@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Presentacion Producto
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($presentacionProducto, ['route' => ['presentacionProductos.update', $presentacionProducto->id], 'method' => 'patch']) !!}

                        @include('presentacion_productos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection