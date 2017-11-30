<template>
    
  <div>
  <header class="main-header ">

     
    <a v-on:click="reset" class="logo" >
      <span class="logo-lg"> <img src="https://sigteuc-winder-jessm02.c9users.io/adminlte/img/logo8.png" /><b>SIGTE</b>UC</span>
    </a>

  
    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" id="boton"  class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
      
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
   
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  
  <aside class="main-sidebar">

    <section class="sidebar">

    

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form" >
        <div class="input-group" >
          <input type="text" name="q" class="form-control" placeholder="Buscar...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>

      

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Explora SIGTEUC </li>

         <li class="treeview">
          <a href=""><i class="fa fa-bus"></i> <span>Paradas</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
                <li v-for='index in rutas'>
                    <a v-on:click="generarParadasMunicipio(index.id)"> {{index.nombre}}</a>
                    
                </li>
          </ul>
        </li>
        
        
         <li>
          <a v-on:click="getParadasUc">
            <i class="fa fa-university"></i> <span>Paradas en la UC</span>
            <span class="pull-right-container">
              
            </span>
          </a>
        </li>
        
     
        
          <li class="treeview">
          <a ><i class="fa fa-clock-o"></i> <span>Horarios</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          
          <ul class="treeview-menu">
                <li v-for='index in rutas'>
                    <a v-on:click="getHorarios(index.id,index.nombre)"> {{index.nombre}}</a>
                    
                </li>
          </ul>
        </li>
        
      </ul>

      
    </section>
  </aside>


  <div class="content-wrapper">
    <section class="content-header" >
      
     
    
               <span class="info-box-number">{{msg}}</span>
               <example1></example1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> SIGTEUC</a></li>
                <li class="active">Home</li>
              </ol>
    </section>

    <section class="content container-fluid" v-if="band==false">
       
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Ubicación Geográfica</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
    
            <div class="box-body" >
              <div class="row">
                <div class="col-md-12">
                  <div class="chart">
                    <div id="mapa" style="width: 100%; height: 500px;">
	                    <gmap-map
                          :center="center"
                          :zoom="zoom"
                          map-type-id="roadmap"
                          style="width: 100%; height: 500px;"
                      >
	                      
	                      <gmap-marker
                          :key="index"
                          
                          v-for="(m, index) in markers"
                          
                          :position="m.position"
                          :clickable="true"
                          :draggable="true"
                          @click="center=m.position"
                           
                        >
	                        <gmap-info-window  
                          :position="m.position">
                           {{m.nombre}}
                          </gmap-info-window>
	                        
	                      </gmap-marker>
                      
                        
	                    </gmap-map>
                </div>
                  </div>
                </div>
                <div class="col-md-4">
                </div>
              </div>
            </div>
      </div>
      
    <div class="box box-warning box-solid " v-if="paradas.length>0">
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
                        
                          <tr v-for="(index,i) in paradas">
                                
                                  <td>{{i+1}}</td>
                                  <td>{{index.nombre}}</td>
                                  <td>{{index.descripcion}}</td>
                                 
                          </tr>
                           
                  </table>
           
            </div>
          </div>
        </div>
             
      <!-- INFORMACION DE LA RUTA  (PARADAS,DISTANCIA,DURACION) -->
       <div class="box box-warning box-solid"v-if="info!=''" >
            <div class="box-header with-border">
              <h3 class="box-title">Información de la Ruta</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            
            <div class="box-body" style="">
                  <div class="row">
                      <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                          <span class="info-box-icon bg-aqua"><i class="glyphicon glyphicon-map-marker"></i></span>
                          <div class="info-box-content">
                            <span class="info-box-text">Total de Paradas</span>
                            <span class="info-box-number">{{info.cantidad_parada}}</span>
                          </div>
                        </div>
                      </div>
        
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="glyphicon glyphicon-road"></i></span>
            
                        <div class="info-box-content">
                          <span class="info-box-text">Cant. de Viajes</span>
                          <span class="info-box-number">{{info.cantidad_viaje}}</span>
                        </div>
                      </div>
                    </div>

                    <div class="clearfix visible-sm-block"></div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                        <div class="info-box-content">
                          <span class="info-box-text">Duración</span>
                          <span class="info-box-number">{{info.duracion}} h Apróx.</span>
                        </div>
                      </div>
                    </div>
                    
                    
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                      <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text">Distancia</span>
                        <span class="info-box-number">{{ info.distancia}} Km</span>
                      </div>
                    </div>
                  </div>
                </div>
           </div>
       </div>
   
   
    </section>
    
    <span v-else>
          <div class="box box-warning box-solid ">
                    <div class="box-header with-border">
                      <h3 class="box-title">Horarios de {{nombre}} a UC</h3>
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
                                  
                              			  <tr v-for="(index,i) in h_m_uc">
                                        <td>{{index.Horas}}</td>
                                        <td>{{index.bus}}</td>
                                       </tr>
                                 
                      </table>
                    </div>
                  </div>
                </div>
                
           <div class="box box-warning box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Horarios de la UC a  {{nombre}} </h3>
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
                            
                        			  <tr v-for="(index,i) in h_uc_m">
                                  <td>{{index.Horas}}</td>
                                  <td>{{index.bus}}</td>
                                 </tr>
                           
                </table>
              </div>
            </div>
          </div>
      </span>
    
  </div>
 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a>
      </li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
      
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>
              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>
              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>

      </div>
      
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>
          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>
            <p>
              Some information about this general settings option
            </p>
          </div>
        </form>
      </div>
    </div>
  </aside>
 
  <div class="control-sidebar-bg"></div>


</div>

</template>


<script>


//import {load, Map, Marker} from 'vue-google-maps';
import * as VueGoogleMaps from 'vue2-google-maps';
 //load('AIzaSyBfeCLUhsQEcT3qSGQH3aKM_AknKoy8N3Q');

 
    export default {
  
        data () {
      return {
        msg:"Bienvenido al Sistema de Información Geográfica de rutas de la Universidad de Carabobo",
       center: {lat: 10.2117472, lng: -67.9088968},
       zoom:10,
        markers: [],
        rutas:[],
        paradas:[],
        info:'',
        h_uc_m:[],
        h_m_uc:[],
        band:false,
        nombre:'',
        
      }
    },
     created(){
            axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            axios.get('api/rutas').then((response)=>{
                console.log(response);
                this.rutas=response.data.data;
            }).catch((error)=>{
                console.log(error);
            });
        },
      
        ready() {
            console.log('Component ready.')
        },
        methods:{
          getRuta(){
            console.log('hola desde lista');
          },
          generarParadasMunicipio(index){
            this.band=false;
            var i;
            axios.get('api/paradasByrutaId/'+index).then((response)=>{
                console.log(response);
                this.paradas=response.data.data;
                this.markers=[];
                
                for(i=0;i<this.paradas.length;i++){
                  var position={position:{lat: '', lng: ''},nombre:""};
                  position.position.lat=this.paradas[i].latitud;
                  position.position.lng=this.paradas[i].longitud;
                  position.nombre=this.paradas[i].nombre;
                  this.markers.push(position);
                }
                
                console.log(this.markers)
                axios.get('api/rutas/'+index).then((response)=>{
                     
                      this.info=response.data.data;
                      this.center.lat=this.info.latitud;
                      this.center.lgn=this.info.longitud;
                      this.zoom=10;
                     
                  }).catch((error)=>{
                      console.log(error);
                  });
            }).catch((error)=>{
                console.log(error);
            });
          },
          getParadasUc(){
            this.band=false;
            axios.get('api/paradas_ucs').then((response)=>{
             this.paradas=response.data.data;
            }).catch((error)=>{
              console.log(error)
            });
          },
          getHorarios(index,nombre){
            axios.get('api/horarios/'+index).then((response)=>{
              console.log(response);
               this.h_uc_m=response.data.data.h_uc_m;
                this.h_m_uc=response.data.data.h_m_uc;
                this.band=true;
                this.msg="Horario de "+nombre;
                this.nombre=nombre;
            }).catch((error)=>{
              console.log(error)
            });
          },
          reset(){
            
            axios.get('api/rutas').then((response)=>{
               
                this.rutas=response.data.data;
            }).catch((error)=>{
                console.log(error);
            });
           this.msg="Bienvenido al Sistema de Información Geográfica de rutas de la Universidad de Carabobo";
             this.center.lat=10.2117472;
             this.center.lng= -67.9088968;
             this.zoom=10;
              this.markers= [];

              this.paradas=[];
              this.info='';
              this.h_uc_m=[];
              this.h_m_uc=[];
              this.band=false;
              this.nombre='';
                
        }
    }
    }
    
    
    
    
</script>
