@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Parametro
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($parametro, ['route' => ['parametros.update', $parametro->id], 'method' => 'patch']) !!}

                        @include('parametros.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection