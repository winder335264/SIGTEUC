@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            H O R A R I O  M  U C
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('h_o_r_a_r_i_o__m__u_c_s.show_fields')
                    <a href="{!! route('hORARIOMUCS.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
