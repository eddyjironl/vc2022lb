<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cgperd;

class cgperdController extends Controller
{
    //
    public function index(){
        return view('cgperd');
    }

    public function save(Request $request){
        // validando los datos
        $request->validate([
            "cyear"=>"required",
            "dtrndate"=>"required"
        ]);
        // verificando el periodo seleccionado.
        $ldStar = strtotime($request["dtrndate"]);
        $lcyear  =$request["cyear"];
        $llcont = Cgperd::where("cyear",$request["cyear"])->get();
        
        if(count($llcont) == 0){
            for ($i=1; $i < 13 ; $i++) { 
                $oCgperd = new Cgperd;
                $lcano  = date("Y",$ldStar);
                $lmonth = date("m",$ldStar);
                $lcmont = date("M",$ldStar);
                $lndays = date("t",$ldStar);
                $ldEnd  = "$lcano-$lmonth-$lndays";
                $numero  = ($i <=9) ? '0' : '';
                $lcperid = $lcyear. "-" .$numero . strval($i);
                $ld1     = date('Y-m-d',$ldStar);
                $oCgperd["cyear"] = $request["cyear"];
                $oCgperd["cperid"] = $lcperid;
                $oCgperd["cdesc"] = 'Año Fiscal '. $lcyear .' Mes ' . $lcmont. '-'. $lcano;
                $oCgperd["cyear"] = $request["cyear"];
                $oCgperd["dstarper"] = $ld1;
                $oCgperd["dendper"] = $ldEnd;
                $oCgperd->save();
                // avanzando al mes siguiente.
                $ldStar = strtotime($ldEnd ."+ 1 days");
            }
            return back()->with("mensaje",'Periodo '.$request["cyear"] .' Creado');
        }else{
            return back()->with("mensaje",'Periodo ya existe');
        }
    }


}
