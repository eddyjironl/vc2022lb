<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cgmic5 as Cgmicx;

class cgmic5Controller extends Controller
{
    //
    public function index(){
        $odata = Cgmicx::all();
        return view("cgmic5",compact("odata"));
    }
    public function save(Request $request){
        $request->validate([
            "cmic5no"=>"required",
            "cdesc"=>"required"
        ]);

        $ocgmic2 = new Cgmicx;
        $ocgmic2["cmic5no"] = $request["cmic5no"];
        $ocgmic2["cdesc"]   = $request["cdesc"];
        $ocgmic2["mnotas"]  = $request["mnotas"];
        $ocgmic2->save();
        return back()->with("mensaje","Registro Guardado Efectivamente");
    }
    public function delete($id){
        $ocgmicx = Cgmicx::findOrFail($id);
        $ocgmicx->delete();
        return back()->with("mensaje","Registro Eliminado");
    }
    public function edit($id){
        $odata = Cgmicx::findOrFail($id);
        return view("cgmic5_edit",compact("odata"));
    }
    public function update(Request $request, $id){
        $request->validate([
            "cmic5no"=>"required",
            "cdesc"=>"required"
        ]);
        $ocgmicx = Cgmicx::findOrFail($id);
        $ocgmicx["cmic5no"]  = $request["cmic5no"];
        $ocgmicx["cdesc"]    = $request["cdesc"];
        $ocgmicx["mnotas"]   = $request["mnotas"];
        $ocgmicx->save();
        return back()->with("mensaje","Registro Actualizado");
    }
}
