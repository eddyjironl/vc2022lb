<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cgperd;
use App\Models\Cgctam;
use App\Models\Cgmonm;
use App\Models\Cgsetup;


class cgsetupController extends Controller
{
    //
    public function index(){
        $monedas  = Cgmonm::all();
        $periodos = Cgperd::all();
        $cuentas  = Cgctam::all();
        $odatos1  = Cgsetup::all();
        // verificando si hay algo 
        if (count($odatos1) >= 1){
            return view("cgsetup_edit", compact("periodos","cuentas","monedas", "odatos1"));
        }else{
            return view("cgsetup", compact("periodos","cuentas","monedas"));
        }
    }
    public function save(Request $request){
        // buscando datos.
        //$idsetup = Cgsetup::all();

        /*
        echo dump($idsetup);
        echo "segundo valor buscado el id<br>";
        echo $idsetup->ntrnno1;
        return ;
        

        if (count($idsetup)!=0){
            Cgsetup::findOrFail($idsetup['id']);
        }
        */
        if (empty($request["id"])){
            // crea un registro nuevo porque no tiene Id
            $osetup  = new Cgsetup;
        }else{
            $osetup  = Cgsetup::findOrFail($request['id']);
            
        }
        // Primer panel de informacion.
        $osetup["ntrnno1"]  = $request["ntrnno1"];
        $osetup["ntrnno2"]  = $request["ntrnno2"];
        $osetup["ntrnno3"]  = $request["ntrnno3"];
        $osetup["ntrnno4"]  = $request["ntrnno4"];
        $osetup["ncashamt"] = $request["ncashamt"];
        $osetup["nrentax"]  = $request["nrentax"];
        // cuentas y otros relacionados.
        $osetup["cperid"]  = $request["cperid"];
        $osetup["cmonid"]  = $request["cmonid"];
        $osetup["cctano1"] = $request["cctano1"];
        $osetup["cctano2"] = $request["cctano2"];
        $osetup["cctano3"] = $request["cctano3"];
        $osetup["cctano4"] = $request["cctano4"];
            
        $osetup["lnConfRChk"] = $request["lnConfRChk"];
        // tab 2 

        //$osetup["ngrupid"] = $request["ngrupid"];
        //agrupaciones
        
        $osetup["cmic1desc"] = $request["cmic1desc"];
        $osetup["cmic2desc"] = $request["cmic2desc"];
        $osetup["cmic3desc"] = $request["cmic3desc"];
        $osetup["cmic4desc"] = $request["cmic4desc"];
        $osetup["cmic5desc"] = $request["cmic5desc"];

        $osetup["lmic1desc"] = ($request["lmic1desc"])? 1:0;
        $osetup["lmic2desc"] = ($request["lmic2desc"])? 1:0;
        $osetup["lmic3desc"] = ($request["lmic3desc"])? 1:0;
        $osetup["lmic4desc"] = ($request["lmic4desc"])? 1:0;
        $osetup["lmic5desc"] = ($request["lmic5desc"])? 1:0;

        $osetup["nmic1desc"] = ($request["nmic1desc"]==null) ? 0:$request["nmic1desc"];
        $osetup["nmic2desc"] = ($request["nmic2desc"]==null) ? 0:$request["nmic2desc"];
        $osetup["nmic3desc"] = ($request["nmic3desc"]==null) ? 0:$request["nmic3desc"];
        $osetup["nmic4desc"] = ($request["nmic4desc"]==null) ? 0:$request["nmic4desc"];
        $osetup["nmic5desc"] = ($request["nmic5desc"]==null) ? 0:$request["nmic5desc"];
        
        $osetup["lmic1desc1"] = ($request["lmic1desc1"])? 1:0;
        $osetup["lmic1desc2"] = ($request["lmic1desc2"])? 1:0;
        $osetup["lmic1desc3"] = ($request["lmic1desc3"])? 1:0;
        $osetup["lmic1desc4"] = ($request["lmic1desc4"])? 1:0;

        $osetup["lmic2desc1"] = ($request["lmic2desc1"])? 1:0;
        $osetup["lmic2desc2"] = ($request["lmic2desc2"])? 1:0;
        $osetup["lmic2desc3"] = ($request["lmic2desc3"])? 1:0;
        $osetup["lmic2desc4"] = ($request["lmic2desc4"])? 1:0;

        $osetup["lmic3desc1"] = ($request["lmic3desc1"])? 1:0;
        $osetup["lmic3desc2"] = ($request["lmic3desc2"])? 1:0;
        $osetup["lmic3desc3"] = ($request["lmic3desc3"])? 1:0;
        $osetup["lmic3desc4"] = ($request["lmic3desc4"])? 1:0;

        $osetup["lmic4desc1"] = ($request["lmic4desc1"])? 1:0;
        $osetup["lmic4desc2"] = ($request["lmic4desc2"])? 1:0;
        $osetup["lmic4desc3"] = ($request["lmic4desc3"])? 1:0;
        $osetup["lmic4desc4"] = ($request["lmic4desc4"])? 1:0;

        $osetup["lmic5desc1"] = ($request["lmic5desc1"])? 1:0;
        $osetup["lmic5desc2"] = ($request["lmic5desc2"])? 1:0;
        $osetup["lmic5desc3"] = ($request["lmic5desc3"])? 1:0;
        $osetup["lmic5desc4"] = ($request["lmic5desc4"])? 1:0;

        // firmas
        $osetup["cfirma1"] = $request["cfirma1"];
        $osetup["ctitulo1"] = $request["ctitulo1"];
        $osetup["lviewf1"] = ($request["lviewf1"])? 1:0;

        $osetup["cfirma2"] = $request["cfirma2"];
        $osetup["ctitulo2"] = $request["ctitulo2"];
        $osetup["lviewf2"] = ($request["lviewf2"])? 1:0;

        $osetup["cfirma3"] = $request["cfirma3"];
        $osetup["ctitulo3"] = $request["ctitulo3"];
        $osetup["lviewf3"] = ($request["lviewf3"])? 1:0;
        
        $osetup->save();

        return back()->with("mensaje","modulo configurado");
    } 
    public function new(){
        // primero creando un nuevo registro
        $odatos   = new Cgsetup;
        $odatos->save();
        $odatos1   = Cgsetup::all();
        $monedas  = Cgmonm::all();
        $periodos = Cgperd::all();
        $cuentas  = Cgctam::all();
        return view("cgsetup_edit", compact("periodos","cuentas","monedas", "odatos1"));

    }
}
