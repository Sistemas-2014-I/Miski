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
                    {!! Form::open(['route' => 'parametros.store']) !!}

                        @include('parametros.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
