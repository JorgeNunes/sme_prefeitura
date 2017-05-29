<?php

namespace App\Dao;

class Dashboard{
    
    private $titulo;
    private $vaga_solicitada;
    private $vaga_preenchida;
    private $saldo;
    
    function __construct($titulo){
        $this->titulo = $titulo;
        $this->vaga_solicitada = 0;
        $this->vaga_preenchida = 0;
    }

    public function setCountVagasSolicitada($contador){
        $this->vaga_solicitada = $contador;
    }
    
    public function setCountVagasPreenchida($contador){
        $this->vaga_preenchida = $contador;
    }
    
    public function getTitulo(){
        return $this->titulo;
    }
    
    public function getVagasSolicitada(){
        return $this->vaga_solicitada;
    }
    
    public function getVagasPreenchida(){
        return $this->vaga_preenchida;
    }
    
    public function getSaldo(){
        return $this->saldo = $this->vaga_solicitada - $this->vaga_preenchida;
    } 
    
    
}