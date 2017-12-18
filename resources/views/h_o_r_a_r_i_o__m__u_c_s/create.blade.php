@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            H O R A R I O  M  U C
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'hORARIOMUCS.store']) !!}

                        @include('h_o_r_a_r_i_o__m__u_c_s.createField')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
