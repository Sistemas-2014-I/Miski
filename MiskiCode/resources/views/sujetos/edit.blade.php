@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Sujeto
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($sujeto, ['route' => ['sujetos.update', $sujeto->id], 'method' => 'patch']) !!}

                        @include('sujetos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection