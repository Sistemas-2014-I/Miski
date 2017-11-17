@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Workstation
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('workstations.show_fields')
                    <a href="{!! route('workstations.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
