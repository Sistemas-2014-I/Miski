@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Moneda
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($moneda, ['route' => ['monedas.update', $moneda->id], 'method' => 'patch']) !!}

                        @include('monedas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection