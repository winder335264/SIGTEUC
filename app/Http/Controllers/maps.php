<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Mapper;
class maps extends Controller
{
    
    
    public function renderMap($id=0){
       
        if($id==0){  //PANTALLA PRINCIPAL
        Mapper::map(10.2117472,-67.9088968);
        $rutas=DB::table("RUTA")->select('nombre','id')->get();
          return view('admin.dashboard')->with("rutas",$rutas)->with("info_parada",[] )->with("info_ruta",[] )->with("paradas_uc", [])->with("horario_UC_M", [])->with("horario_M_UC", [])->with("rutas1",[]);
        }else{
              //consultas a la BD 
                $paradas=DB::table("PARADA")->where("idRuta",$id)->get();
                $rutas=DB::table("RUTA")->select('nombre','id')->get();
                $ruta_ubicacion=DB::table("RUTA")->select('latitud','longitud')->where("id", $id)->get();
                $info_parada=DB::table("PARADA")->select('nombre','descripcion')->where("idRuta",$id)->get();
                $info_ruta=DB::table("RUTA")->select('cantidad_parada','cantidad_viaje','distancia','duracion','nombre','descripcion')->where("id",$id)->get();

            if($id==-1){   //PARADAS UC
               
               Mapper::map(10.2759776,-68.0086936, ['zoom' => 16,'center' => true]);
                $paradas_uc=DB::table("PARADA_UC")->select('latitud','longitud','nombre', 'descripcion')->get();
                 for ($i = 0; $i < sizeof($paradas_uc); $i++){
                  Mapper::informationWindow($paradas_uc[$i]->latitud, $paradas_uc[$i]->longitud, $paradas_uc[$i]->nombre, ['open' => true, 'maxWidth'=> 300, 'markers' => ['title' => 'Title']]);
                
                }
                return view('admin.dashboard')->with("rutas",$rutas)->with("info_parada",$info_parada )->with("info_ruta",$info_ruta )->with("paradas_uc",$paradas_uc)->with("horario_UC_M", [])->with("horario_M_UC", [])->with("rutas1",[]);

            }else{ // PARADAS DE CADA MUNICIPIO
            
              
                 
                Mapper::map($ruta_ubicacion[0]->latitud, $ruta_ubicacion[0]->longitud, ['zoom' => 13,'center' => true]);
                for ($i = 0; $i < sizeof($paradas); $i++){
                  Mapper::informationWindow($paradas[$i]->latitud, $paradas[$i]->longitud, $info_parada[$i]->nombre, ['open' => true,  'maxWidth'=> 300, 'markers' => ['title' => 'Title']]);
                }
                return view('admin.dashboard')->with("rutas",$rutas)->with("info_parada", $info_parada )->with("info_ruta",$info_ruta)->with("paradas_uc",[])->with("horario_UC_M", [])->with("horario_M_UC", [])->with("rutas1",[]);
            }
        }
        
    }
    
    
    public function obtenerHorarios($id){
                //consultas a la BD 
                $horario_UC_M=DB::table("HORARIO_UC_M")->select('Horas','bus')->where("idRuta",$id)->get();
                $horario_M_UC=DB::table("HORARIO_M_UC")->select('Horas','bus')->where("idRuta",$id)->get();
                $rutas1=DB::table("RUTA")->select('nombre','id')->where("id", $id)->get();
                return view('admin.dashboard')->with("horario_UC_M",$horario_UC_M)->with("horario_M_UC",$horario_M_UC)->with("rutas1",$rutas1)->with("rutas",[])->with("info_parada", [] )->with("info_ruta",[])->with("paradas_uc",[])->with("ruta_ubicacion",[])->with("paradas",[]);
    }
    
    
}
