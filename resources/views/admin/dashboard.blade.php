@extends('admin.layout')


@section ('content')

<section id="content2">

 @if (sizeof($horario_UC_M)<=0 || sizeof($horario_M_UC)<=0 )
         <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Ubicación Geográfica</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="">
              <div class="row">
                <div class="col-md-12">
                  <div class="chart">
                    <div id="mapa" style="width: 100%; height: 500px;">
	                    {!! Mapper::render() !!}
                </div>
                  </div>
                </div>
                <div class="col-md-4">
                </div>
              </div>
            </div>
      </div>
      @endif     

              
        @if (sizeof($info_parada)>0 || sizeof($paradas_uc)>0 ) 
                <!--TABLAS DE LA INFORMACION DE PARADAS (NOMBRE Y DESCRIPCION)-->
           <div class="box box-warning box-solid ">
            <div class="box-header with-border">
              <h3 class="box-title">Información de las Paradas</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="">
              <div class="table-responsive">
                <table class="table">
                          <tr>
                            <th style="width: 10px">#</th>
                            <th style="width: 40px">Nombre</th>
                            <th style="width: 40px">Descripcion</th>
                          </tr>
                           @if(sizeof($info_parada)>0)
                             @for ($i = 0; $i < sizeof($info_parada); $i++)
                        			  <tr>
                                  <td>{{$i+1}}</td>
                                  <td>{{$info_parada[$i]->nombre}}</td>
                                  <td>{{$info_parada[$i]->descripcion}}</td>
                                 </tr>
                            @endfor
                          @endif	
                           @if(sizeof($paradas_uc)>0)
                             @for ($i = 0; $i < sizeof($paradas_uc); $i++)
                        			<tr>
                                <td>{{$i+1}}</td>
                                <td>{{$paradas_uc[$i]->nombre}}</td>
                                <td>{{$paradas_uc[$i]->descripcion}}</td>
                              </tr>
                              @endfor
                          @endif
                  </table>
           
            </div>
          </div>
        </div>
      @endif   

     
        
        
	</section>

@endsection


   
   
   
@section ('horario')
<section id="horario">
   
   
      @if ( sizeof($horario_M_UC)>0 ) 
                 <div class="box box-warning box-solid ">
                    <div class="box-header with-border">
                      <h3 class="box-title">Horarios de {{$rutas1[0]->nombre}} a UC</h3>
                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                      </div>
                    </div>
                  <div class="box-body" style="">
                    <div class="table-responsive">
                      <table class="table">
                                <tr>
                                  <th style="width: 10px">Horario</th>
                                  <th style="width: 10px">Bus</th>
                                </tr>
                                   @for ($i = 0; $i < sizeof($horario_M_UC); $i++)
                              			  <tr>
                                        <td>{{$horario_M_UC[$i]->Horas}}</td>
                                        <td>{{$horario_M_UC[$i]->bus}}</td>
                                       </tr>
                                  @endfor
                      </table>
                    </div>
                  </div>
                </div>
              @endif 
        
        
          @if (sizeof($horario_UC_M)>0 ) 
           <div class="box box-warning box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Horarios de la UC a  {{$rutas1[0]->nombre}} </h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
              </div>
            <div class="box-body" style="">
              <div class="table-responsive">
                <table class="table">
                          <tr>
                            <th style="width: 10px">Horario</th>
                            <th style="width: 10px">Bus</th>
                          </tr>
                             @for ($i = 0; $i < sizeof($horario_UC_M); $i++)
                        			  <tr>
                                  <td>{{$horario_UC_M[$i]->Horas}}</td>
                                  <td>{{$horario_UC_M[$i]->bus}}</td>
                                 </tr>
                            @endfor
                </table>
              </div>
            </div>
          </div>
        @endif  
        
        	</section>
   @endsection
   