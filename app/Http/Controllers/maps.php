<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Mapper;
class maps extends Controller
{
    
    
    public function renderMap($id=0){
       Mapper::map(10.2161604,-68.037388);

    return view('paradas.fieldsMaps');
    }
    
    
    public function obtenerHorarios($id){
                //consultas a la BD 
                $horario_UC_M=DB::table("HORARIO_UC_M")->select('Horas','bus')->where("idRuta",$id)->get();
                $horario_M_UC=DB::table("HORARIO_M_UC")->select('Horas','bus')->where("idRuta",$id)->get();
                $rutas1=DB::table("RUTA")->select('nombre','id')->where("id", $id)->get();
                return view('admin.dashboard')->with("horario_UC_M",$horario_UC_M)->with("horario_M_UC",$horario_M_UC)->with("rutas1",$rutas1)->with("rutas",[])->with("info_parada", [] )->with("info_ruta",[])->with("paradas_uc",[])->with("ruta_ubicacion",[])->with("paradas",[]);
    }
    
    
}
