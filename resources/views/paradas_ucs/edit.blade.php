@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Paradas Uc
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($paradasUc, ['route' => ['paradasUcs.update', $paradasUc->id], 'method' => 'patch']) !!}

                        @include('paradas_ucs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection