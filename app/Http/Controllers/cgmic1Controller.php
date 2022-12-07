<?php

namespace App\Http\Controllers;

use App\Models\Cgmic1;
use Illuminate\Http\Request;

class cgmic1Controller extends Controller
{
    //
    public function index(){
        $odata = Cgmic1::all();
        return view('cgmic1',compact('odata'));
    }
    public function save(Request $request){
        // validando campos
        $request->validate([
            "cmic1no"=>"required",
            "cdesc"=>"required"
        ]);

        $ocgmic = new Cgmic1;
        $ocgmic["cmic1no"] = $request["cmic1no"];
        $ocgmic["cdesc"]   = $request["cdesc"];
        $ocgmic["mnotas"]  = $request["mnotas"];
        $ocgmic->save();
        $odata = Cgmic1::all();
        return view("Cgmic1",compact("odata"))->with("mensaje","Registro Creado");

    }
    public function edit($id){
        $odata = Cgmic1::findOrFail($id);
        return view("cgmic1_edit", compact("odata"));
    }
    public function update(Request $request, $id){
        $request->validate([
            "cmic1no"=>"required",
            "cdesc"=>"required"
        ]);
        $odata = Cgmic1::findOrFail($id);
        $odata["cmic1no"] = $request["cmic1no"];
        $odata["cdesc"]   = $request["cdesc"];
        $odata["mnotas"]  = $request["mnotas"];
        $odata->save();
        return back()->with("mensaje","Registro actualizado");
    }
    public function delete($id){
        $ocgmic = Cgmic1::findOrFail($id);
        $ocgmic->delete();
        return back()->with("mensaje","Registro eliminado");
    }
}
