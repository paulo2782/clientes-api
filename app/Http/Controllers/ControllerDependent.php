<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dependent;
use Illuminate\Support\Facades\DB;

class ControllerDependent extends Controller
{
    public function allDepentsClient($id){
        $data = DB::table('dependents')
        ->where('clients.id',$id)
        ->join('clients','clients.id','=','dependents.clients_id')
        ->select('clients.name as name_client',
                 'dependents.id as dependent_id',
                 'dependents.name as name','dependents.age as age',
                 'dependents.date_birth as date_birth')
        ->get();
        return $data;
    }

    public function create(Request $request){
        try{
            $dependent = new Dependent;
            $dependent->name       = $request->name;
            $dependent->age        = $request->age;
            $dependent->date_birth = $request->date_birth;
            $dependent->clients_id = $request->clients_id;
            $dependent->save();
            return response()->json(['message'=>'Dependente salvo.']);
        }catch(\exception $e){
            return response()->json(['message'=>$e->getCode()]);    
        }
    }

    public function read($id){
        return Dependent::where('id',$id)->get(); // Retorna somente o ID 

    }

    public function update(Request $request, $id){
        if(Dependent::where('id', $id)->exists()) {
            try{
                $dependent = Dependent::find($id);
                $dependent->clients_id  = $request->clients_id;
                $dependent->name        = $request->name;
                $dependent->age         = $request->age;
                $dependent->date_birth  = $request->date_birth;
                $dependent->update();
                return response()->json(['message'=>'Registro Alterado.']);
            }catch(\exception $e){
                return response()->json(['message'=>$e->getCode()]);
            }
        }else{
            return response()->json(['message'=>'Nenhum Registro encontrado.']);
        }
    }

    public function delete($id){
        if(Dependent::where('id', $id)->exists()) {
            try{
                $Dependent = Dependent::find($id);
                $Dependent->delete();
                return response()->json(['message'=>'Registro Excluído.']);
            }catch(\exception $e){
                return response()->json(['message'=>$e->getCode()]);
                
            }
        }else{
            return response()->json(['message'=>'Nenhum Registro encontrado.']);
        }

    }
}
