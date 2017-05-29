<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dao\Ldap;
use Session;

class FuncionarioController extends Controller
{
    public function login (Request $request){
        
        
        $conexao = new Ldap($request->input('nm_funcionario'), $request->input('cd_funcionario'));
        $verificador = $conexao->loginLdap();

        if($verificador === 0){
            return redirect('autenticar')->with('mensagem', "Sem permissão");
        }else if($verificador === 1){
            return redirect('autenticar')->with('mensagem', "Erro no usuário ou senha");
        }

        Session::put('logado', $verificador);
        
        return redirect('dashboard');
    }

    public function logout()
    {
        Session::forget('logado');

        return redirect('autenticar');

    }
}
