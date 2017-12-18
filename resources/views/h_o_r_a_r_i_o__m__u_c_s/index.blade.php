@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Horarios del municipio a la UC </h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('hORARIOMUCS.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('h_o_r_a_r_i_o__m__u_c_s.table')
            </div>
        </div>
        <div class="text-center">
        {{$hORARIOMUCS->links()}}
        </div>
    </div>
@endsection

