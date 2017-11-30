@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Parada
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($parada, ['route' => ['paradas.update', $parada->id], 'method' => 'patch']) !!}

                        @include('paradas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection