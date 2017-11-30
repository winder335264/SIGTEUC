<template>
  <v-app
   
    id="inspire"
  >
      <!--boton de hamburguesa y lista latera-->
    <v-navigation-drawer
      persistent
      clipped
      enable-resize-watcher
      v-model="drawer"
      app
     
    >
    <!--MENU LATERAL-->
      <v-list  dense>
        <v-subheader class="mt-3 black--text ">Explora SIGTEUC<v-icon >navigate_next</v-icon><v-icon>navigate_next</v-icon><v-icon>navigate_next</v-icon></v-subheader>
        
            <!--BOTON GENERAR PARADAS DE LA UC-->
         <v-list-group v-for="item in items3" :value="item.active" v-bind:key="item.title">
             <v-list-tile slot="item" @click="getParadasUc">
                
                  <img src="paraMenu24.png">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  {{ item.action }}
                
                <v-list-tile-content>
                  <v-list-tile-title>{{ item.text }}</v-list-tile-title>
                </v-list-tile-content>
            </v-list-tile>
        </v-list-group>
        
            <!--BOTON PARADAS-->

         <v-list-group v-for="item in items2" :value="item.active" v-bind:key="item.title">
           
             <v-list-tile slot="item" @click="">
              <img src="busMenu.png">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  {{ item.action }}
              <v-list-tile-content>
                <v-list-tile-title>{{ item.text }}</v-list-tile-title>
              </v-list-tile-content>
              <v-list-tile-action>
                <v-icon>keyboard_arrow_down</v-icon>
              </v-list-tile-action>
            </v-list-tile>
            
            <v-list-tile v-for="index in item.items" v-bind:key="index.nombre" @click="">
              <v-list-tile-content>
                <v-list-tile-title v-on:click="generarParadasMunicipio(index.id)">{{ index.nombre }}</v-list-tile-title>
              </v-list-tile-content>
              <v-list-tile-action>
                <v-icon x-large >{{ index.action }}</v-icon>
              </v-list-tile-action>
            </v-list-tile>
            
        </v-list-group>
        
        
            <!--BOTON  HORARIOS-->
        <v-list-group v-for="item in items" :value="item.active" v-bind:key="item.title">
          
             <v-list-tile slot="item" @click="">
                 <img src="relojMenu.png">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  {{ item.action }}
                <v-list-tile-content>
                  <v-list-tile-title>{{ item.text }}</v-list-tile-title>
                </v-list-tile-content>
                <v-list-tile-action>
                  <v-icon>keyboard_arrow_down</v-icon>
                </v-list-tile-action>
            </v-list-tile>
            
            <v-list-tile v-for="index in item.items" v-bind:key="index.nombre" @click="">
              <v-list-tile-content>
                <v-list-tile-title v-on:click="getHorarios(index.id,index.nombre)">{{ index.nombre }}</v-list-tile-title>
              </v-list-tile-content>
              <v-list-tile-action>
                <v-icon x-large >{{ index.action }}</v-icon>
              </v-list-tile-action>
            </v-list-tile>
            
        </v-list-group>
        
        <!--BOTON  PARADAS CERCANAS A UNA DIRECCION-->
         <v-list-group v-for="item in items4" :value="item.active" v-bind:key="item.title">
             <v-list-tile slot="item" @click="getParadasCercanasDireccion(1)">
               <img src="ubicacionesMenu.png">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  {{ item.action }}
              <v-list-tile-content>
                <v-list-tile-title>{{ item.text }}</v-list-tile-title>
              </v-list-tile-content>
            </v-list-tile>
        </v-list-group>
        
        <!--BOTON MI UBICACION-->
           <v-list-group v-for="item in items5" :value="item.active" v-bind:key="item.title">
             <v-list-tile slot="item" @click="getParadasCercanasDireccion(3)">
              <img src="marcaMenu.png">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  {{ item.action }}
              <v-list-tile-content>
                <v-list-tile-title>{{ item.text }}</v-list-tile-title>
              </v-list-tile-content>
            </v-list-tile>
        </v-list-group>
        
      </v-list>
      
    </v-navigation-drawer>
    
    
    <!--BUSCADOR DE LA CABECERA-->
    <v-toolbar color="cyan" dense fixed clipped-left app>
      
        <v-toolbar-title  style="width: 300px" class="ml-0 pl-3">
          <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
          <v-btn  flat v-on:click="reset" class="dark--text">   <img src="mundial.png">&nbsp;&nbsp;
          <b1>SIGTEUC</b1></v-btn>
        </v-toolbar-title>
        
        <v-layout row align-center  class="white--text">
         <v-flex xs> 
            <v-text-field 
             class="white--text"
              placeholder="Introduzca nombre de una Ruta ..."
              single-line
              primary
              :append-icon-cb="() => {}"
              hide-details
              v-model = "BuscarRuta"
              v-on:keyup.enter.native="BuscarRuta1()"
            ></v-text-field>
          </v-flex>
              
           <v-btn icon light   class="icono4"  v-on:click.native="BuscarRuta1()" >
              <v-icon >search</v-icon>
            </v-btn>
          
        </v-layout>
        
        <v-snackbar
          :timeout="timeout"
          :color="color"
          :vertical="mode === 'vertical'"
          :top="verdadero"
          :right= "verdadero"
          v-model="snackbar">
          {{ text }}
          <v-btn dark flat @click.native="snackbar = false">Close</v-btn>
        </v-snackbar>
        
        
      
    </v-toolbar>
    
    <!--cuerpo-->
    <main>
      <v-content>
        <v-container fluid grid-list-md v-if="band==true">
          <v-layout  row wrap justify-center align-center >

              <v-flex  >
                <v-card  v-if = "bandBuscador==false" color="grey lighten-2" class="black--text" >
                  <v-card-title >  
                  <img src="panel.png">&nbsp;&nbsp;&nbsp;
                   <v-subheader><b1>Dirección:</b1></v-subheader> 
                     <v-text-field  
                        class="white--text"
                        placeholder="Introduzca una dirección ..."
                        single-line
                        required
                        primary
                        :append-icon-cb="() => {}"
                        v-model = "BuscarParadaDireccion"
                        v-on:keyup.enter.native="getParadasCercanasDireccion(2)">
                     </v-text-field>
                        <v-btn icon light   class="icono4"  v-on:click.native="getParadasCercanasDireccion(2)" >
                          <v-icon >search</v-icon>
                        </v-btn> </span>
                  </v-card-title>
                </v-card>    
              </v-flex>
              
              
              <!-- SE GENERA EL MAPA DE GOOGLE MAPS-->
              <v-flex xs12 class="black--text" >
                  <v-card color="grey lighten-2" class="black--text"  >
                     <v-card-title> 
                        <img src="tierra1.png">&nbsp;&nbsp;&nbsp;
                        <h6>Ubicación Geográfica</h6>  
                     </v-card-title>
                   </v-card>    
              </v-flex>
                
                <v-flex xs12 class="black--text" >
                  <div id="map"></div>
                  <mapa id="mapa" v-bind:center.sync="center" v-bind:markers.sync="markers" :zoom="zoom" ></mapa>
               </v-flex>
               
                <!-- SE GENERA LA INFORMACION DE CADA PARADA DE CADA MUNICIPIO-->
              <v-flex xs12 class="black--text" >
                <v-card color="grey lighten-2" class="black--text" >
                   <v-card-title ><img src="paradaBus.png">&nbsp;&nbsp;&nbsp;
                     <h6>Información de las Paradas</h6>
                   </v-card-title>
                </v-card>    
              </v-flex>
              
                <v-divider  v-if="markers.length>0"></v-divider >
                <v-flex xs12 class="black--text" v-if="paradas.length>0">
                   <info  :headers="headers" :items="paradas"></info>
                </v-flex>
               
               <v-flex xs12 class="black--text" v-else-if = "paradasCercanas.length>0" >
                   <infoParadaCercanas :items="paradasCercanas"></infoParadaCercanas>
               </v-flex>

                <!-- SE MUESTRAN LA INFORMACION DE LAS RUTAS  (DISTANCIA , PARADAS, TIEMPO RECORRIDO)-->
            <v-flex v-if = "bandInfoRuta==true" xs12 class="black--text  "  >
              <v-card color="grey lighten-2" class="black--text" >
                <v-card-title><img src="autobus.png">&nbsp;&nbsp;&nbsp;
                  <h6>Información de la Ruta</h6>
                </v-card-title>
              </v-card>    
            </v-flex>
           
                  
                  <v-flex  xs6  sm class="black--text " v-if="paradas.length>0 && ban==false && bandGeo ==false">
                    <inforuta img="total_de_paradas.jpg" title="Paradas" :msg="info.cantidad_parada"></inforuta>
                  </v-flex>

                  <v-flex  xs6 sm class="black--text " v-if="paradas.length>0 && ban==false && bandGeo ==false">
                      <inforuta img="viajes.jpg" title="Viajes" :msg="info.cantidad_viaje"></inforuta>
                  </v-flex>
                  
                  <v-flex xs6 sm class="black--text  " v-if="paradas.length>0 && ban==false && bandGeo ==false">
                      <inforuta img="duracion.jpg" title="Duración" :msg="info.duracion" msg1="H Apróx."></inforuta>
                  </v-flex>
                  
                  <v-flex  xs6 sm class="black--text  " v-if="paradas.length>0 && ban==false && bandGeo ==false">
                      <inforuta img="distancia.jpg" title="Distancia" :msg="info.distancia" msg1="Km Apróx."></inforuta>
                  </v-flex>
                  
               
                
           
  
          </v-layout>
        </v-container>
        
          <!-- SE MUESTRAN LOS HORARIOS-->
        <v-container fluid grid-list-md v-if="bandHorario== false">
            <v-layout  row wrap justify-center align-center >
              <v-flex xs12 class="black--text  " >
                
                <v-card color="grey lighten-2" class="black--text">
                 <v-card-title>
                   <img src="ver.png">
                   <h6>Horarios de {{nombre}} a UC</h6>
                 </v-card-title>
                </v-card>
                </v-flex>
                
                <v-flex xs12 class="black--text  " >
                    <horarios :nombre="nombre" :headers="headers1" :items="h_m_uc"></horarios>
                </v-flex>
                
                <v-flex xs12 class="black--text  " >
                  <v-card color="grey lighten-2" class="black--text">
                    <v-card-title>
                      <img src="ver.png">
                      <h6>Horarios de la UC a {{nombre}}</h6>
                    </v-card-title>
                  </v-card>    
                </v-flex>
              
              <v-flex xs12 class="black--text "  >
                  <horarios :nombre="nombre" :headers="headers1" :items="h_uc_m"></horarios>
              </v-flex>
              
              
            </v-layout>
         </v-container>
         
         
      </v-content>
    </main>
  </v-app>
</template>



<script>

const rows = []
  for (let i = 0; i <= 100; i++) {
    rows.push({
      campaign: 'Lorem ipsum dolor sit amet',
      group: 'Lorem ipsum dolor sit amet'
    })
  }

import * as VueGoogleMaps from 'vue2-google-maps';
import Autocomplete from 'vue2-autocomplete-js';
import VueGoogleAutocomplete from 'vue-google-autocomplete'

  export default{
    components: { Autocomplete,VueGoogleAutocomplete },
    data: () => ({
      
        rows,
        drawer: true,
        
        zoom:10,
        info:'',
        h_m_uc:'',
        h_uc_m:'',
        msg:'',
        nombre:'',
        searchPlace:'',
        BuscarRuta: '',
        BuscarParadaDireccion:'',
        verdadero:true,
        
        band:true,
        ban:true,
        bandGeo: true,
        bandDireccion: true,
        bandBuscador:true,
        bandInfoRuta:true,
        bandHorario: true,
        
        snackbar: false,
        color: 'red',
        mode: '',
        timeout: 4000,
        text: 'Nombre de la Ruta no encontrada',
        
       
        
        rutas:[],
        markers:[],
        paradas:[],
        distancia:[],
        paradasCercanas:[],
        
        center: {lat: 10.1111422, lng: -67.8813446},   
        currentLocation : { lat : 0, lng : 0},
        vecdistancia:{lng:"",lat:""},
   
        items2: [
          { picture: 28, text: 'Paradas Externas',active:false,action: '',items:[]},
        ],
        
        items: [
          { picture: 68, text: 'Horarios',active:false,action: '',items:[] },
        ],
        
        items3: [
          { picture: 48, text: 'Paradas Internas',active:false,action: '  '},
        ],
        
        items4: [
          { picture: 48, text: 'Paradas Cercanas',active:false,action: ''},
        ],
        
        items5: [
          { picture: 48, text: 'Mi Ubicación',active:false,action: ''},
        ],
      
        headers: [
          {text: 'Paradas',sortable: false,align:'left'},
          { text: 'Descripcion', sortable: false, },
        ],
        
        headers1: [
          {text: 'Horarios',sortable: false,align:'left'},
          { text: 'Bus', sortable: false, },
        ],

    }),
    
     watch:{
        lng(value){
          console.log(value);
        }
     },
   
    props: {
      source: String
    },
    created(){
        
        axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        axios.get('api/rutas').then((response)=>{
            this.items2[0].items=response.data.data;
            this.items[0].items=response.data.data;
            
        }).catch((error)=>{
            console.log(error);
        });
    },

    methods:{
     
        //FUNCION PARA BUSCAR UNA RUTA MOSTRANDO TODA SU INFORMACION
        BuscarRuta1(){
         axios.get('api/rutas/').then((response)=>{
               console.log("entre aqui");
              if(response.status==200 ) {
                var i,bandera=false;
                for(i=0 ;i<response.data.data.length;i++){
                  if(this.BuscarRuta.toUpperCase() == response.data.data[i].nombre.toUpperCase()){
                    this.generarParadasMunicipio(response.data.data[i].id)
                    bandera=true;
                  }
                }
                if(bandera == false)
                  this.snackbar=true;
                }

           }).catch((error)=>{
               console.log(error);
            });
      },
        // GEOLOCALIZACION --- PARADAS MAS CERCANAS A MI UBICACION
        success(pos) {
            var crd = pos.coords;
            var i,W;
            this.currentLocation.lat = crd.latitude;
            this.currentLocation.lng = crd.longitude;
                  axios.get("api/paradasRutas").then((response)=>{
                  console.log(response)
                  if(response.status==200){
                  
                      var position={position:{lat:  this.currentLocation.lat, lng: this.currentLocation.lng },nombre:"Mi Ubicación"};
                      this.markers=[];
                      this.markers.push(position);
                      this.distancia=[];
                      
                      for(i=0;i<response.data.data.length;i++){
                            var result={position:{lat: '', lng: ''},nombre:"",id:"",result:""};
                            result.position.lat=response.data.data[i].latitud;
                            result.position.lng=response.data.data[i].longitud;
                            
                            var R = 6371; // RADIO DE LA TIERRA EN KM 
                            var dLat = ((result.position.lat-this.currentLocation.lat)* Math.PI / 180);  //SE CAMBIA A RADIANES
                            var dLon = ((result.position.lng-this.currentLocation.lng)* Math.PI / 180);  
                            var a = Math.sin(dLat/2) * Math.sin(dLat/2) + 
                            Math.cos(result.position.lat* Math.PI / 180) * Math.cos(this.currentLocation.lat* Math.PI / 180) * 
                            Math.sin(dLon/2) * Math.sin(dLon/2);  
                            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
                            var d = R * c; 
                            result.result=d;
                            
                            result.nombre=response.data.data[i].nombre;
                            result.id=response.data.data[i].idRuta;
                            this.distancia.push(result);
                      
                      }
                      
                      this.distancia=this.distancia.sort(function(a, b){return a.result-b.result});
                      this.paradasCercanas=[];
                      console.log(this.distancia)
                      
                    for(W=0;W<5;W++){  //RECORRER EL VECTOR PARA LAS PRIMERAS 5 PARADAS 
                     
                          var position={position:{lat:  this.distancia[W].position.lat, lng: this.distancia[W].position.lng },nombre: W+1 + " -- " + this.distancia[W].nombre};
                          this.markers.push(position);
                          var aux=new Object();
                          aux.nombre=this.distancia[W].nombre;
                          aux.num=W+1;
                          aux.ruta=this.distancia[W].id;
                          aux.distancia=this.distancia[W].result.toFixed(2);
                          aux.nombre_ruta=this.distancia[W].id;
                          this.paradasCercanas.push(aux);
                      }
                      
                    console.log(this.paradasCercanas)
            }
            }).catch((error)=>{
            console.log(error);
            });
                
          
},
        error(err) {
         console.warn('ERROR(' + err.code + '): ' + err.message);
         this.snackbar=trueM
         this.text='Navegador no compatible'
      },
        //BUSCAR PARADAS MAS CERCANA INTRODUCIENDO DIRECCCION 
        getParadasCercanasDireccion(aux){
          
           this.reset();
        if(aux==1){
          
        this.ban=true;
        this.band=true;
        this.bandGeo=false;
        this.bandDireccion= false;
        this.bandBuscador=false;
        this.bandInfoRuta=false;
        this.bandHorario=true;

        
        }else{
          
          if(aux==3){ //PARA GENERAR PARADAS CERCADA USANDO LA GEOLOCALIZACION
             var options = {
                enableHighAccuracy: true,
                timeout: 5000,
                maximumAge: 0
                
              };
              
             
              navigator.geolocation.getCurrentPosition(this.success, this.error, options); // Obteiendo la lat y log de la ubicacion
              this.bandBuscador=true;
              this.bandGeo=false;
              this.ban=true;
              this.bandInfoRuta=false;
              this.bandHorario=true;
             
            
          }else{
           
            this.band=true;
            this.bandInfoRuta=false;
            this.ban=false;
            this.bandGeo=false;
            this.bandBuscador=false;
            this.bandHorario=true;
            
            
            var i;
            var geocoder = new google.maps.Geocoder();
           geocoder.geocode({'address': 'Carabobo,Venezuela'+ this.BuscarParadaDireccion}, (results, status) => {
             
              if (status === 'OK') {
          
                this.currentLocation.lat = results[0].geometry.location.lat();
                this.currentLocation.lng = results[0].geometry.location.lng();
                axios.get("api/paradasRutas").then((response)=>{
                 
                  if(response.status==200){
                   
                    var position={position:{lat:  this.currentLocation.lat, lng: this.currentLocation.lng },nombre:"Mi Ubicación"};
                    this.markers=[];
                    this.markers.push(position);
                    this.distancia=[];
                    this.zoom=12;
                      
                      for(i=0;i<response.data.data.length;i++){
                          var result={position:{lat: '', lng: ''},nombre:"",id:"",result:""};
                          result.position.lat=response.data.data[i].latitud;
                          result.position.lng=response.data.data[i].longitud;
  
                          //FORMULA DE HAVERSINE
                          var R = 6371; // RADIO DE LA TIERRA EN KM 
                          var dLat = ((result.position.lat-this.currentLocation.lat)* Math.PI / 180);  //SE CAMBIA A RADIANES
                          var dLon = ((result.position.lng-this.currentLocation.lng)* Math.PI / 180);  
                          var a = Math.sin(dLat/2) * Math.sin(dLat/2) + 
                          Math.cos(result.position.lat* Math.PI / 180) * Math.cos(this.currentLocation.lat* Math.PI / 180) * 
                          Math.sin(dLon/2) * Math.sin(dLon/2);  
                          var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
                          var d = R * c; 
                          
                          result.result=d;
                          result.nombre=response.data.data[i].nombre;
                          result.id=response.data.data[i].idRuta;
                          this.distancia.push(result);
  
                      }
                       
                    this.distancia=this.distancia.sort(function(a, b){return a.result-b.result}) //ORDENAMOS EL VECTOR DE DISTANCIA
                    this.paradasCercanas=[];
              
                    for(i=0;i<5;i++){ //RECORREMOS EL VECTOR PARA IMPRIMIR  LAS PRIMERAS 5 PARADAS 
                       var position={position:{lat:  this.distancia[i].position.lat, lng: this.distancia[i].position.lng },nombre: i+1 + " -- " + this.distancia[i].nombre};
                        this.markers.push(position);
                            var aux=new Object();
                            aux.nombre=this.distancia[i].nombre;
                            aux.num=i+1;
                            aux.ruta=this.distancia[i].id;
                            aux.distancia=this.distancia[i].result.toFixed(2);
                            aux.nombre_ruta=this.distancia[i].id;
                            this.paradasCercanas.push(aux);
                    }
              
                    console.log(this.paradasCercanas);
                  }
                }).catch((error)=>{
                  console.log(error);
                });
                
              }
      });
          }
        }
      },
        //FUNCION QUE GENERA LAS MARCAS DE LAS PARADAS DE CADA MUNICIPIO
        generarParadasMunicipio(index){
        
            this.reset();
            this.band=true;
            this.bandInfoRuta=true;
            this.ban=false;
            this.bandGeo=false;
            this.bandBuscador=true;
            this.bandHorario=true;

            var i;
          

            axios.get('api/paradasByrutaId/'+index).then((response)=>{
                this.paradas=response.data.data;
                this.markers=[];
            
                  axios.get('api/rutas/'+index).then((response)=>{
                      this.info=response.data.data;
                      this.center.lat=this.info.latitud;
                      this.center.lgn=this.info.longitud;
                      this.zoom=12;
                  }).catch((error)=>{
                      console.log(error);
                  });
            }).catch((error)=>{
                console.log(error);
            });
        },
        //FUNCION QUE GENERA LOS HORARIOS PARA CADA RUTA
        getHorarios(index,nombre){
            axios.get('api/horarios/'+index).then((response)=>{
              console.log(response);
               this.h_uc_m=response.data.data.h_uc_m;
                this.h_m_uc=response.data.data.h_m_uc;
                this.band=false;
                this.bandHorario=false;
                this.paradas=[],
                this.msg="Horario de "+nombre;
                this.nombre=nombre;
            }).catch((error)=>{
              console.log(error)
            });
          },
        //FUNCION QUE GENERA LA PARADAS INTERNAS EN LA UC
        getParadasUc(){
            this.band=true;
            this.ban=true;
            this.bandInfoRuta=false;
            this.bandHorario=true;
            var i;
            axios.get('api/paradas_ucs').then((response)=>{
             this.paradas=response.data.data;
            console.log(this.paradas)
             this.markers=[];
                for(i=0;i<this.paradas.length;i++){
                  var position={position:{lat: '', lng: ''},nombre:""};
                  position.position.lat=this.paradas[i].latitud;
                  position.position.lng=this.paradas[i].longitud;
                  position.nombre=this.paradas[i].nombre;
                  this.markers.push(position);
                  this.zoom=15;
                  this.center={lat: 10.2753418, lng: -68.007531};
                 
                }
            }).catch((error)=>{
              console.log(error)
            });
          },
        //FUNCION PARA REFRESCAR LA VISTA  
        reset(){
            
            axios.get('api/rutas').then((response)=>{
                this.rutas=response.data.data;
            }).catch((error)=>{
                console.log(error);
            });
          
            this.zoom=10;
            this.info='';
            this.nombre='';
            this.snackbar= false;
            
            this.band=true;
            this.ban=true,
            this.bandGeo= true,
            this.bandDireccion=true,
            this.bandBuscador=true,
            this.bandInfoRuta=true,
            this.bandHorario=true,
            
            this.mode= '';
            this.markers= [];
            this.paradas=[];
            this.h_uc_m=[];
            this.h_m_uc=[];
            this.distancia=[];
            this.paradasCercanas=[];

            this.center={lat: 10.1111422, lng: -67.8813446},  
            this.vecdistancia={lng:"",lat:""};
            this.currentLocation = { lat : 0, lng : 0};

        }
          
    }
  }
</script>

<style>
  .input-group__details:after {
    background-color: rgba(255, 255, 255, 0.32) !important;
  }
</style>