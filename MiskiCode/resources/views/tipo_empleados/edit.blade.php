@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tipo Empleado
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tipoEmpleado, ['route' => ['tipoEmpleados.update', $tipoEmpleado->id], 'method' => 'patch']) !!}

                        @include('tipo_empleados.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection