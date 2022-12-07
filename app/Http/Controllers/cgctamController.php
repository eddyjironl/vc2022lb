<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cgctam;
use App\Models\Cgmic1;
use App\Models\Cgmic2;
use App\Models\Cgmic3;
use App\Models\Cgmic4;
use App\Models\Cgmic5;

class cgctamController extends Controller
{
    //
    public function index(){
        $omic1 = Cgmic1::all();
        $omic2 = Cgmic2::all();
        $omic3 = Cgmic3::all();
        $omic4 = Cgmic4::all();
        $omic5 = Cgmic5::all();
        $odata = Cgctam::all();
        return view("cgctam",compact("odata","omic1","omic2","omic3","omic4","omic5"));
    }
    public function save(Request $request){
        // validacion 
        $request->validate([
            "cctaid" =>"required",
            "cdesc"  =>"required",
            "ctype"  =>"required",
            "cgrupid"=>"required"
        ]);
        $oCuenta = new Cgctam;
        $oCuenta["cctaid"]   = $request["cctaid"];
        $oCuenta["cdesc"]    = $request["cdesc"];
        $oCuenta["ctype"]    = $request["ctype"];
        $oCuenta["cgrupid"]  = $request["cgrupid"];
        $oCuenta["lpost"]    = ($request["lpost"])? 1:0;
        $oCuenta["lapplyir"] = ($request["lapplyir"])? 1:0;
        $oCuenta["mnotas"]   = $request["mnotas"];
        $oCuenta["cmic1no"]  = $request["cmic1no"];
        $oCuenta["cmic2no"]  = $request["cmic2no"];
        $oCuenta["cmic3no"]  = $request["cmic3no"];
        $oCuenta["cmic4no"]  = $request["cmic4no"];
        $oCuenta["cmic5no"]  = $request["cmic5no"];
        $oCuenta->save();
        return back()->with("mensaje","Cuenta Guardada");
    }
    public function edit($id){
        $odata = Cgctam::findOrFail($id);
        $omic1 = Cgmic1::all();
        $omic2 = Cgmic2::all();
        $omic3 = Cgmic3::all();
        $omic4 = Cgmic4::all();
        $omic5 = Cgmic5::all();
        return view("cgctam_edit",compact('odata',"omic1","omic2","omic3","omic4","omic5"));
    }
    public function update(Request $request,$id){
        // validacion 
        $request->validate([
            "cctaid" =>"required",
            "cdesc"  =>"required",
            "ctype"  =>"required",
            "cgrupid"=>"required"
        ]);
        $oCuenta = Cgctam::findOrFail($id);
        $oCuenta["cctaid"]   = $request["cctaid"];
        $oCuenta["cdesc"]    = $request["cdesc"];
        $oCuenta["ctype"]    = $request["ctype"];
        $oCuenta["cgrupid"]  = $request["cgrupid"];
        $oCuenta["lpost"]    = ($request["lpost"])? 1:0;
        $oCuenta["lapplyir"] = ($request["lapplyir"])? 1:0;
        $oCuenta["mnotas"]   = $request["mnotas"];
        $oCuenta["cmic1no"]  = $request["cmic1no"];
        $oCuenta["cmic2no"]  = $request["cmic2no"];
        $oCuenta["cmic3no"]  = $request["cmic3no"];
        $oCuenta["cmic4no"]  = $request["cmic4no"];
        $oCuenta["cmic5no"]  = $request["cmic5no"];
        $oCuenta->save();

        $odata = Cgctam::all();
        $omic1 = Cgmic1::all();
        $omic2 = Cgmic2::all();
        $omic3 = Cgmic3::all();
        $omic4 = Cgmic4::all();
        $omic5 = Cgmic5::all();

        return view("cgctam",compact('odata',"omic1","omic2","omic3","omic4","omic5"))->with("mensaje","Registro Actualizado");
    }
    public function delete($id){
        $ocgctam = Cgctam::findOrFail($id);
        $ocgctam->delete();
        return back()->with("mensaje","Registro eliminado");
    }

}
