<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaseEscola extends Model
{
    protected $table = 'tb_fase_escola';
	protected $guarded = ['$id_fase_escola'];
	public $timestamps = false;
	
	public static function listFaseEscola()
    {
        return FaseEscola::select('id_fase_escola', 'nm_fase_escola')
                ->where(['ic_status_reserva' => 0])
                ->get();
    }
	
	public static function listFaseEscolaStatus()
    {
        return FaseEscola::select('id_fase_escola', 'nm_fase_escola')
        ->where(['ic_status_reserva' => 0])
        ->get();
    }
}
