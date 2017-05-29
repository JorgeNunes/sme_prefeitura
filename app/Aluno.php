<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $table = 'tb_aluno';
    protected $fillable = array('id_escola', 'nm_aluno', 'dt_nascimento_aluno', 
                                'id_fase_escola', 'nm_mae', 'cd_cpf_mae', 'nm_responsavel',
                                'cd_cpf_responsavel', 'nm_vinculo_responsavel', 'nm_rua',
                                'cd_numero_rua', 'nm_bairro', 'cd_telefone_responsavel',
                                'cd_celular_responsavel');
	protected $guarded = ['$id_aluno'];
	public $timestamps = true;
	
	public function escola(){
        return $this->belongsTo('App\Escola');
    }
    
    public function faseEscola(){
        return $this->belongsTo('App\FaseEscola');
    }
    
    public static function countFase(){
        return Aluno::join('tb_fase_escola', 'tb_fase_escola.id_fase_escola', '=', 'tb_aluno.id_fase_escola')
                    ->selectraw('tb_fase_escola.nm_fase_escola, tb_aluno.ic_esperando_sim_nao, 
                                 count(tb_fase_escola.id_fase_escola) as count_situacao_vaga')
                    ->where(['tb_fase_escola.ic_status_reserva' => 0])
                    ->groupBy('tb_fase_escola.nm_fase_escola', 'tb_aluno.ic_esperando_sim_nao')
                    ->orderBy('tb_fase_escola.nm_fase_escola')
                    ->get();
    }
    
    public static function listAluno(){
        
        return Aluno::join('tb_escola', 'tb_escola.id_escola', '=','tb_aluno.id_escola')
                    ->join('tb_fase_escola', 'tb_fase_escola.id_fase_escola', '=','tb_aluno.id_fase_escola')
                    ->select('id_aluno', 'nm_aluno', 'tb_escola.nm_escola', 'nm_responsavel', 
                             'nm_fase_escola', 'ic_esperando_sim_nao')
                    ->where(['ic_esperando_sim_nao' => 0])
                    ->orderBy('id_aluno', 'asc')
                    ->get();
            
    }
    
    public static function selectAluno($id_escola, $nm_aluno, $id_fase_escola, $ic_esperando_sim_nao){
        
        $query = Aluno::join('tb_escola', 'tb_escola.id_escola', 'tb_aluno.id_escola')
                      ->join('tb_fase_escola', 'tb_fase_escola.id_fase_escola', 'tb_aluno.id_fase_escola')
                      ->select('id_aluno', 'nm_aluno', 'tb_escola.nm_escola', 'nm_responsavel', 
                               'tb_fase_escola.nm_fase_escola', 'ic_esperando_sim_nao');
        
        if(!empty($id_escola)){
            $query = $query->where('tb_escola.id_escola', '=', $id_escola);
        }
        if(!empty($nm_aluno)){
            $query = $query->where('nm_aluno', 'like', '%'.$nm_aluno.'%');
        }
        if(!empty($id_fase_escola)){
            $query = $query->where('tb_fase_escola.id_fase_escola', '=', $id_fase_escola);
        }
        if($ic_esperando_sim_nao == 0 || $ic_esperando_sim_nao == 1){
            $query = $query->where('ic_esperando_sim_nao', '=', $ic_esperando_sim_nao);
        }
        
        $query = $query->orderBy('id_aluno')
                       ->get();
                       
        return $query;
        
    }
    
    public static function viewAluno($id_aluno){
        return Aluno::join('tb_escola', 'tb_escola.id_escola', '=', 'tb_aluno.id_escola')
                    ->join('tb_fase_escola', 'tb_fase_escola.id_fase_escola', '=','tb_aluno.id_fase_escola')
                    ->select('nm_aluno', 'dt_nascimento_aluno', 'nm_mae', 'cd_telefone_responsavel', 
                             'nm_escola', 'nm_fase_escola', 'nm_responsavel', 'cd_cpf_mae', 
                             'cd_cpf_responsavel', 'nm_vinculo_responsavel', 'cd_celular_responsavel', 
                             'nm_rua', 'cd_numero_rua', 'nm_bairro', 'ic_esperando_sim_nao', 'created_at')
                    ->where(['id_aluno' => $id_aluno])
                    ->first();
    }
    
    public static function verificarAluno($nm_aluno, $dt_nascimento_aluno, $cd_cpf_responsavel){
        return Aluno::select('id_aluno')
               ->where(['nm_aluno' => $nm_aluno, 
                     'dt_nascimento_aluno' => $dt_nascimento_aluno,
                     'cd_cpf_responsavel' => $cd_cpf_responsavel])
               ->first();
    }
    
    public static function insertAluno($nm_aluno, $dt_nascimento_aluno, $nm_mae, $cd_telefone_responsavel, $id_escola, $id_fase_escola,
            $nm_responsavel, $cd_cpf_mae, $cd_cpf_responsavel, $nm_vinculo_responsavel, $cd_celular_responsavel, 
            $nm_rua, $cd_numero_rua, $nm_bairro, $ic_esperando_sim_nao){
                
        return Aluno::insert(
            ['nm_aluno' => $nm_aluno, 'dt_nascimento_aluno' => $dt_nascimento_aluno, 'nm_mae' => $nm_mae,
             'cd_telefone_responsavel' => $cd_telefone_responsavel, 'id_escola' => $id_escola,
             'id_fase_escola' => $id_fase_escola, 'nm_responsavel' => $nm_responsavel, 'cd_cpf_mae' => $cd_cpf_mae, 
             'cd_cpf_responsavel' => $cd_cpf_responsavel, 'nm_vinculo_responsavel' => $nm_vinculo_responsavel, 
             'cd_celular_responsavel' => $cd_celular_responsavel, 'nm_rua' => $nm_rua, 'cd_numero_rua' => $cd_numero_rua,
             'nm_bairro' => $nm_bairro, 'ic_esperando_sim_nao' => $ic_esperando_sim_nao, 'created_at' => \Carbon\Carbon::now()]
        );
    }
    
    public static function atualizarStatusAluno($id_aluno)
    {
        return Aluno::where('id_aluno', $id_aluno)->update(['ic_esperando_sim_nao' => 1, 'dt_vaga_preenchida' => date("Y-m-d"), 'updated_at' => \Carbon\Carbon::now()]);
    }
}
