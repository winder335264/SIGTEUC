@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Horario Uc M
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'horarioUcMs.store']) !!}

                        @include('horario_uc_ms.createField')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
