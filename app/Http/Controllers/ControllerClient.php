<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Classe\cpf_cnpj;
use Illuminate\Support\Facades\DB;


class ControllerClient extends Controller
{
    public function all()
    {    
        $data = DB::table('clients')->orderby('name')->get(); // Retorna todos registros
        return response()->json($data);
    }   

    public function create(Request $request)
    {
        $cpf_cnpj = $request->cpf_cnpj;
        $p1       = new Cpf_cnpj();
        $check    = $p1->validaCPF_CNPJ($cpf_cnpj);

        $iDigit = strlen($cpf_cnpj);
        $Digit  = substr($cpf_cnpj,$iDigit-2,2);
        
        if($Digit <> $check){
            return response()->json(['message'=>'CPF ou CNPJ inválido.']);
            
 
        }else{
            try{
                $Client = new Client;
                $Client->name     = $request->name;
                $Client->address  = $request->address;
                $Client->cpf_cnpj = $request->cpf_cnpj;
                $Client->cep      = $request->cep;
                $Client->save();
                return response()->json(['message'=>'Registro Salvo.']);
            }catch(\Exception  $e){
                switch($e->errorInfo[1]){
                    case 1048:
                        $error = "CAMPOS NÃO PODEM FICAR EM BRANCO.";
                        break;

                    case 1062:
                        $error = "CPF ou CNPJ duplicado.";
                        break;
                    
                }
                    return response()->json(['message'=>$error ]);
                
                
            }
        }
    }

    public function read($id)
    {
        return Client::where('id',$id)->get(); // Retorna somente o ID 
    }

    public function update(Request $request, $id)
    {
        $cpf_cnpj = $request->cpf_cnpj;
        $p1       = new Cpf_cnpj();
        $check    = $p1->validaCPF_CNPJ($cpf_cnpj);

        $iDigit = strlen($cpf_cnpj);
        $Digit  = substr($cpf_cnpj,$iDigit-2,2);
        
        if($Digit <> $check){
            return response()->json(['message'=>'CPF ou CNPJ inválido.']);
        }else{

            if(Client::where('id', $id)->exists()) {
                try{
                    $Client = Client::find($id);
                    $Client->name     = $request->name;
                    $Client->address  = $request->address;
                    $Client->cpf_cnpj = $request->cpf_cnpj;
                    $Client->cep      = $request->cep;
                    $Client->update();
                    return response()->json(['message'=>'Registro Alterado.']);
                }catch(\exception $e){
                    switch($e->errorInfo[1]){
                        case 1048:
                            $error = "CAMPOS NÃO PODEM FICAR EM BRANCO.";
                            break;
                        case 1062:
                            $error = "CPF ou CNPJ duplicado.";
                            break;
                        
        
                    }
                    return response()->json(['message'=>$error]);

                }
            }else{
                return response()->json(['message'=>'Nenhum Registro encontrado.']);
            }
        }
    }

    public function delete($id)
    {
        if(Client::where('id', $id)->exists()) {
            try{
                $Client = Client::find($id);
                $Client->delete();
                return response()->json(['message'=>'Registro Excluído.']);
            }catch(\exception $e){
                switch($e->errorInfo[1]){
                    case 1451:
                        $error = "Não foi possível excluir. Existe dependentes nesse cliente.";
                        break;
                }
                return response()->json(['message'=>$error]);
            }
        }else{
            return response()->json(['message'=>'Nenhum Registro encontrado.']);
        }
    }
}
