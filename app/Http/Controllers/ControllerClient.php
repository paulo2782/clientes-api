<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;


class ControllerClient extends Controller
{
    public function all()
    {        
        return Client::all(); // Retorna todos registros
    }   

    public function create(Request $request)
    {
        
        $Client = new Client;
        $Client->name     = $request->name;
        $Client->address  = $request->address;
        $Client->cpf_cnpj = $request->cpf_cnpj;
        $Client->cep      = $request->cep;
        $Client->save();

        return response()->json(['message'=>'Registro Salvo.']);
    }

    public function show($id)
    {
        return Client::where('id',$id)->get(); // Retorna somente o ID 
    }

    public function update(Request $request, $id)
    {
        if(Client::where('id', $id)->exists()) {
            $Client = Client::find($id);

            $Client->name     = $request->name;
            $Client->address  = $request->address;
            $Client->cpf_cnpj = $request->cpf_cnpj;
            $Client->cep      = $request->cep;

            $Client->update();

            return response()->json(['message'=>'Registro Alterado.']);
        }else{
            return response()->json(['message'=>'Nenhum Registro encontrado.']);
        }
    }

    public function delete($id)
    {
        if(Client::where('id', $id)->exists()) {
            $Client = Client::find($id);
            $Client->delete();
            return response()->json(['message'=>'Registro Excluído.']);
        }else{
            return response()->json(['message'=>'Nenhum Registro encontrado.']);
        }

    }
}
