@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Piso
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($piso, ['route' => ['pisos.update', $piso->id], 'method' => 'patch']) !!}

                        @include('pisos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection