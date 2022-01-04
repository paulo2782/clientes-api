<?php
/* 
Classe Valida CPF e CNPJ
Autor: Paulo Soares de Oliveira
*/
namespace App\Classe;

Class Cpf_cnpj{
 public $valor;
 
 
 public function validaCPF_CNPJ($valor){
    $iTam = strlen($valor);
    

    // VALIDAÇÃO CPF
    if($iTam == 14){
        //Retira mascara da string

        $D1 = substr($valor,0,1);
        $D2 = substr($valor,1,1);
        $D3 = substr($valor,2,1);
        $D4 = substr($valor,4,1);
        $D5 = substr($valor,5,1);
        $D6 = substr($valor,6,1);
        $D7 = substr($valor,8,1);
        $D8 = substr($valor,9,1);
        $D9 = substr($valor,10,1);

        // Primeiro Digito Verificador
        $m1 = $D1 * 10;
        $m2 = $D2 * 9;
        $m3 = $D3 * 8;
        $m4 = $D4 * 7;
        $m5 = $D5 * 6;
        $m6 = $D6 * 5;
        $m7 = $D7 * 4;
        $m8 = $D8 * 3;
        $m9 = $D9 * 2;

        $SUM = $m1+$m2+$m3+$m4+$m5+$m6+$m7+$m8+$m9;

        $mod = $SUM % 11;
        $R1  = 11 - $mod;
        if($R1 >= 10){
            $R1 = 0;
        }

        //Segundo Digito Verificador
        $m1 = $D1 * 11;
        $m2 = $D2 * 10;
        $m3 = $D3 * 9;
        $m4 = $D4 * 8;
        $m5 = $D5 * 7;
        $m6 = $D6 * 6;
        $m7 = $D7 * 5;
        $m8 = $D8 * 4;
        $m9 = $D9 * 3;
        $m10 = $R1 * 2;

        $SUM = $m1+$m2+$m3+$m4+$m5+$m6+$m7+$m8+$m9+$m10;
        $mod = $SUM % 11;
        $R2  = 11 - $mod;
        if($R2 >= 10){
            $R2 = 0;
        }
        
        return $R1.$R2;       
        
    }
    // VALIDAÇÃO CNPJ
    if($iTam == 18){
        $D1 = substr($valor,14,1);
        $D2 = substr($valor,13,1);
        $D3 = substr($valor,12,1);
        $D4 = substr($valor,11,1);
        $D5 = substr($valor,9,1);
        $D6 = substr($valor,8,1);
        $D7 = substr($valor,7,1);
        $D8 = substr($valor,5,1);
        $D9 = substr($valor,4,1);
        $D10= substr($valor,3,1);
        $D11= substr($valor,1,1);
        $D12= substr($valor,0,1);

        // Primeiro Digito Verificador
        $m1 = $D1 * 2;
        $m2 = $D2 * 3;
        $m3 = $D3 * 4;
        $m4 = $D4 * 5;
        $m5 = $D5 * 6;
        $m6 = $D6 * 7;
        $m7 = $D7 * 8;
        $m8 = $D8 * 9;
        $m9 = $D9 * 2;
        $m10 = $D10 * 3;
        $m11 = $D11 * 4;
        $m12 = $D12 * 5;
        

        $SUM = $m1+$m2+$m3+$m4+$m5+$m6+$m7+$m8+$m9+$m10+$m11+$m12;

        $mod = $SUM % 11;
        $R1  = 11 - $mod;
        if($R1 >= 10){
            $R1 = 0;
        }

        // Segundo Digito Verificador
        $m1 = $R1 * 2;
        $m2 = $D1 * 3;
        $m3 = $D2 * 4;
        $m4 = $D3 * 5;
        $m5 = $D4 * 6;
        $m6 = $D5 * 7;
        $m7 = $D6 * 8;
        $m8 = $D7 * 9;
        $m9 = $D8 * 2;
        $m10 = $D9 * 3;
        $m11 = $D10 * 4;
        $m12 = $D11 * 5;
        $m13 = $D12 * 6;
        

        $SUM = $m1+$m2+$m3+$m4+$m5+$m6+$m7+$m8+$m9+$m10+$m11+$m12+$m13;

        $mod = $SUM % 11;
        $R2  = 11 - $mod;
        if($R2 >= 10){
            $R2 = 0;
        }        

        return $R1.$R2;
   
    }
    
 }
 
 
}


?>