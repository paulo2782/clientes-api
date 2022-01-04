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

    public function read(){

    }

    public function update(){

    }

    public function delete(){

    }
}
