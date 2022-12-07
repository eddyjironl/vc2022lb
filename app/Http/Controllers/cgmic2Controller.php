<?php

namespace App\Http\Controllers;

use App\Models\Cgmic2;
use Illuminate\Http\Request;
use App\Models\Cgmici;

class cgmic2Controller extends Controller
{
    //
    public function index(){
        $odata = Cgmic2::all();
        return view("cgmic2",compact("odata"));
    }

    public function save(Request $request){
        $request->validate([
            "cmic2no"=>"required",
            "cdesc"=>"required"
        ]);

        $ocgmic2 = new Cgmic2;
        $ocgmic2["cmic2no"] = $request["cmic2no"];
        $ocgmic2["cdesc"]   = $request["cdesc"];
        $ocgmic2["mnotas"]  = $request["mnotas"];
        $ocgmic2->save();
        return back()->with("mensaje","Registro Guardado Efectivamente");
    }

    public function delete($id){
        $ocgmicx = Cgmic2::findOrFail($id);
        $ocgmicx->delete();
        return back()->with("mensaje","Registro Eliminado");
    }
    public function edit($id){
        $odata = Cgmic2::findOrFail($id);
        return view("cgmic2_edit",compact("odata"));
    }
    public function update(Request $request, $id){
        $request->validate([
            "cmic2no"=>"required",
            "cdesc"=>"required"
        ]);
        $ocgmicx = Cgmic2::findOrFail($id);
        $ocgmicx["cmic2no"]  = $request["cmic2no"];
        $ocgmicx["cdesc"]    = $request["cdesc"];
        $ocgmicx["mnotas"]   = $request["mnotas"];
        $ocgmicx->save();
        return back()->with("mensaje","Registro Actualizado");
    }
}
