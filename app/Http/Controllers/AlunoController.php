<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aluno;
use App\Escola;
use App\FaseEscola;
use App\Dao\Dashboard;
use Session;


class AlunoController extends Controller
{
    
    public function viewCountVaga()
    {   
        $count_fase = Aluno::countFase();
        $fase_escola = FaseEscola::listFaseEscolaStatus();
        $dashboard[0] = new Dashboard("Total");
        
        foreach($fase_escola as $key => $value){
            $dashboard[$key+1] = new Dashboard($value->nm_fase_escola);
        }
        
        foreach($count_fase as $value){
            foreach ($dashboard as $value2) {
                if(strcmp($value2->getTitulo(), $value->nm_fase_escola) == 0){
                    if($value->ic_esperando_sim_nao == 0){
                        $value2->setCountVagasSolicitada($value->count_situacao_vaga);
                        $dashboard[0]->setCountVagasSolicitada($dashboard[0]->getVagasSolicitada()+$value->count_situacao_vaga);
                    }else{
                        $value2->setCountVagasSolicitada($value2->getVagasSolicitada()+$value->count_situacao_vaga);
                        $value2->setCountVagasPreenchida($value->count_situacao_vaga);
                        $dashboard[0]->setCountVagasSolicitada($dashboard[0]->getVagasSolicitada()+$value->count_situacao_vaga);
                        $dashboard[0]->setCountVagasPreenchida($dashboard[0]->getVagasPreenchida()+$value->count_situacao_vaga);
                    }
                }  
            }
        }
        
        
        return view('dashboard')->with('dashboard', $dashboard);
      
    }
    
    public function viewVaga()
    {   
        return view('vaga', [
            'listEscola' => Escola::listEscola(),
            'listFaseEscola' => FaseEscola::listFaseEscola(),
            'listAluno' => Aluno::listAluno()
        ]);
    }
    
    public function selectAluno(Request $request)
    {
        $id_escola = $request->input('id_escola');
        $nm_aluno = $request->input('nm_aluno');
        $id_fase_escola = $request->input('id_fase_escola');
        $ic_esperando_sim_nao = $request->input('ic_esperando_sim_nao');

        $query = Aluno::selectAluno($id_escola, $nm_aluno, $id_fase_escola, $ic_esperando_sim_nao);

        if(count($query) == 0){
           return redirect('vaga'); 
        }

        return view('vaga', [
            'listEscola' => Escola::listEscola(),
            'listFaseEscola' => FaseEscola::listFaseEscola(),
            'listAluno' => $query
        ]);
    }
    
    public function viewVagaCadastro()
    {
        return view('vaga-cadastro', [
            'listEscola' => Escola::listEscola(), 
            'listFaseEscola' => FaseEscola::listFaseEscola()
        ]);
    }
    
    public function cadastrarAluno(Request $request)
    {
        $nm_aluno = strtoupper($request->input('nm_aluno'));
        $dt_nascimento_aluno = date("Y-m-d", strtotime($request->input('dt_nascimento_aluno')));
        $nm_mae = strtoupper($request->input('nm_mae'));
        $cd_telefone_responsavel = $request->input('cd_telefone_responsavel');
        $id_escola = Escola::selectIdEscola($request->input('id_escola'));
        $id_escola = $id_escola->id_escola;
        $id_fase_escola = $request->input('id_fase_escola');
        $nm_responsavel = strtoupper($request->input('nm_responsavel'));
        $cd_cpf_mae = $request->input('cd_cpf_mae');
        $cd_cpf_responsavel = $request->input('cd_cpf_responsavel');
        $nm_vinculo_responsavel = $request->input('nm_vinculo_responsavel');
        $cd_celular_responsavel = $request->input('cd_celular_responsavel');
        $nm_rua = strtoupper($request->input('nm_rua'));
        $cd_numero_rua = $request->input('cd_numero_rua');
        $nm_bairro = strtoupper($request->input('nm_bairro'));
        
        $nm_aluno = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"), $nm_aluno);
        $nm_mae = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"), $nm_mae);
        $nm_responsavel = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"), $nm_responsavel);
        
        
        $check = Aluno::verificarAluno($nm_aluno, $dt_nascimento_aluno, $cd_cpf_responsavel);
        
        if(!empty($check)){
            $ic_cadastrado = false;
        }else{
            $ic_cadastrado = Aluno::insertAluno($nm_aluno, $dt_nascimento_aluno, $nm_mae, $cd_telefone_responsavel, $id_escola, 
                $id_fase_escola, $nm_responsavel, $cd_cpf_mae, $cd_cpf_responsavel, $nm_vinculo_responsavel, 
                $cd_celular_responsavel, $nm_rua, $cd_numero_rua, $nm_bairro, 0);
        }
   
        if($ic_cadastrado == true){
            $mensagem = $nm_aluno." cadastrado com sucesso!";
  
        }else{
            $mensagem = $nm_aluno." já está cadastrado!";
        }
        
        return redirect('vaga')->with('mensagem', $mensagem);
        
    }
    
    public function atualizarStatusVaga($id_aluno){
        
        $ic_cadastrado = Aluno::atualizarStatusAluno($id_aluno);
        
        if($ic_cadastrado == 1){
            $mensagem = "Status atualizado com sucesso!";
        }else{
            $mensagem = "Erro ao preencher a vaga!";
        }
        
        return redirect('vaga')->with('mensagem', $mensagem);
            
    }
    
    public function viewAluno($id_aluno){
        return view('vaga-visualizar', [
            'viewAluno' => Aluno::viewAluno($id_aluno)
        ]);
    }
    
    public function calcularFaseEscolar($dt_nascimento_aluno){
        
        switch ($dt_nascimento_aluno) {
            case (strtotime($dt_nascimento_aluno) > strtotime('-1 year', strtotime(date('Y').'-03-31'))):
                $arr = array(['id_fase_escola' => 1, 'nm_fase_escola' => 'Berçario I']);
                break;
            case (strtotime($dt_nascimento_aluno) >= strtotime('-2 year', strtotime(date('Y').'-04-01'))
                  && strtotime($dt_nascimento_aluno) <= strtotime('-1 year', strtotime(date('Y').'03-31'))):
                $arr = array(['id_fase_escola' => 2, 'nm_fase_escola' => 'Berçario II']);
                break;
            case (strtotime($dt_nascimento_aluno) >= strtotime('-3 year', strtotime(date('Y').'-04-01'))
                && strtotime($dt_nascimento_aluno) <= strtotime('-2 year', strtotime(date('Y').'03-31'))):
                $arr = array(['id_fase_escola' => 3, 'nm_fase_escola' => 'Infantil I']);
                break;
            case (strtotime($dt_nascimento_aluno) >= strtotime('-4 year', strtotime(date('Y').'-04-01'))
                && strtotime($dt_nascimento_aluno) <= strtotime('-3 year', strtotime(date('Y').'03-31'))):
                $arr = array(['id_fase_escola' => 4, 'nm_fase_escola' => 'Infantil II']);
                break;    
            case (strtotime($dt_nascimento_aluno) >= strtotime('-5 year', strtotime(date('Y').'-04-01'))
                && strtotime($dt_nascimento_aluno) <= strtotime('-4 year', strtotime(date('Y').'03-31'))):
                $arr = array(['id_fase_escola' => 5, 'nm_fase_escola' => 'Infantil III']);
                break;  
            case (strtotime($dt_nascimento_aluno) >= strtotime('-6 year', strtotime(date('Y').'-04-01'))
                && strtotime($dt_nascimento_aluno) <= strtotime('-5 year', strtotime(date('Y').'03-31'))):
                $arr = array(['id_fase_escola' => 6, 'nm_fase_escola' => 'Infantil IV']);
                break; 
            default:
                $arr = array(['id_fase_escola' => 7, 'nm_fase_escola' => 'Fundamental']);
                break;  
        }
        
        echo json_encode($arr, JSON_UNESCAPED_UNICODE);
        
    }
}
