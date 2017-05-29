<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    protected $table = 'tb_escola';
	protected $guarded = ['$id_escola'];
	public $timestamps = false;
	
	public static function listEscola()
    {
        return Escola::select('id_escola', 'nm_escola')->get();
    }
    
    public static function selectIdEscola($nm_escola)
    {
        return Escola::select('id_escola')
        ->where(['nm_escola' => $nm_escola])
        ->first();
    }
}
