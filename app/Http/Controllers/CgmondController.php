<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cgmond;
use App\Models\Cgmonm;

class CgmondController extends Controller
{
    //
    public function update(Request $request, $id){
        $request->validate(["dtrndate"=>"required","ntc"=>"required"]);
        $ocgmond = Cgmond::findOrFail($id);
        $ocgmond["dtrndate"] = $request["dtrndate"];
        $ocgmond["ntc"]      = $request["ntc"];
        $ocgmond->save();
        return back()->with("mensaje","Registro Editado");
    }

    public function edit($monid,$id){
        $odata = Cgmond::findOrFail($id);
        $ocgmond = $monid;
        return view("cgmond_edit",compact('odata','ocgmond'));
    }

    public function delete($id){
        $ocgmond = Cgmond::findOrFail($id);
        $ocgmond->delete();
        return back()->with("mensaje","Registro Eliminado");
    }

}
