@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Estado Pedido
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($estadoPedido, ['route' => ['estadoPedidos.update', $estadoPedido->id], 'method' => 'patch']) !!}

                        @include('estado_pedidos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection