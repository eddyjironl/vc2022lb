<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cgmic3;

class cgmic3Controller extends Controller
{
    //    
    public function index(){
        $odata = Cgmic3::all();
        return view("cgmic3",compact("odata"));
    }

    public function save(Request $request){
        $request->validate([
            "cmic3no"=>"required",
            "cdesc"=>"required"
        ]);

        $ocgmic2 = new Cgmic3;
        $ocgmic2["cmic3no"] = $request["cmic3no"];
        $ocgmic2["cdesc"]   = $request["cdesc"];
        $ocgmic2["mnotas"]  = $request["mnotas"];
        $ocgmic2->save();
        return back()->with("mensaje","Registro Guardado Efectivamente");
    }

    public function delete($id){
        $ocgmicx = Cgmic3::findOrFail($id);
        $ocgmicx->delete();
        return back()->with("mensaje","Registro Eliminado");
    }
    public function edit($id){
        $odata = Cgmic3::findOrFail($id);
        return view("cgmic3_edit",compact("odata"));
    }
    public function update(Request $request, $id){
        $request->validate([
            "cmic3no"=>"required",
            "cdesc"=>"required"
        ]);
        $ocgmicx = Cgmic3::findOrFail($id);
        $ocgmicx["cmic3no"]  = $request["cmic3no"];
        $ocgmicx["cdesc"]    = $request["cdesc"];
        $ocgmicx["mnotas"]   = $request["mnotas"];
        $ocgmicx->save();
        return back()->with("mensaje","Registro Actualizado");
    }

}
