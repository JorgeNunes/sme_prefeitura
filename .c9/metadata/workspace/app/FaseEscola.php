{"filter":false,"title":"FaseEscola.php","tooltip":"/app/FaseEscola.php","undoManager":{"mark":57,"position":57,"stack":[[{"start":{"row":8,"column":4},"end":{"row":8,"column":6},"action":"remove","lines":["//"],"id":2},{"start":{"row":8,"column":4},"end":{"row":10,"column":28},"action":"insert","lines":["protected $table = 'tb_escola';","\tprotected $guarded = ['$id_escola'];","\tpublic $timestamps = false;"]}],[{"start":{"row":8,"column":24},"end":{"row":8,"column":33},"action":"remove","lines":["tb_escola"],"id":3},{"start":{"row":8,"column":24},"end":{"row":8,"column":38},"action":"insert","lines":["tb_fase_escola"]}],[{"start":{"row":10,"column":28},"end":{"row":11,"column":0},"action":"insert","lines":["",""],"id":4},{"start":{"row":11,"column":0},"end":{"row":11,"column":1},"action":"insert","lines":["\t"]}],[{"start":{"row":11,"column":1},"end":{"row":12,"column":0},"action":"insert","lines":["",""],"id":5},{"start":{"row":12,"column":0},"end":{"row":12,"column":1},"action":"insert","lines":["\t"]}],[{"start":{"row":12,"column":1},"end":{"row":18,"column":5},"action":"insert","lines":["public static function listFaseEscolaStatus()","    {","        ","        return FaseEscola::select('id_fase_escola, nm_fase_escola')","        ->where(['ic_status_reserva' => 0])","        ->get();","    }"],"id":6}],[{"start":{"row":13,"column":5},"end":{"row":14,"column":8},"action":"remove","lines":["","        "],"id":7}],[{"start":{"row":14,"column":8},"end":{"row":14,"column":14},"action":"remove","lines":["return"],"id":8}],[{"start":{"row":14,"column":8},"end":{"row":14,"column":9},"action":"remove","lines":[" "],"id":9}],[{"start":{"row":14,"column":8},"end":{"row":14,"column":9},"action":"insert","lines":["d"],"id":10}],[{"start":{"row":14,"column":9},"end":{"row":14,"column":10},"action":"insert","lines":["d"],"id":11}],[{"start":{"row":14,"column":10},"end":{"row":14,"column":11},"action":"insert","lines":["("],"id":12}],[{"start":{"row":16,"column":15},"end":{"row":16,"column":16},"action":"insert","lines":[")"],"id":13}],[{"start":{"row":9,"column":25},"end":{"row":9,"column":34},"action":"remove","lines":["id_escola"],"id":23},{"start":{"row":9,"column":25},"end":{"row":9,"column":39},"action":"insert","lines":["id_fase_escola"]}],[{"start":{"row":14,"column":23},"end":{"row":15,"column":10},"action":"remove","lines":["select('id_fase_escola, nm_fase_escola')","        ->"],"id":32}],[{"start":{"row":8,"column":40},"end":{"row":9,"column":0},"action":"insert","lines":["",""],"id":33},{"start":{"row":9,"column":0},"end":{"row":9,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":9,"column":4},"end":{"row":9,"column":103},"action":"insert","lines":["protected $fillable = array('nome', 'descricao', 'valor', 'quantidade', 'tamanho', 'categoria_id');"],"id":34}],[{"start":{"row":9,"column":33},"end":{"row":9,"column":37},"action":"remove","lines":["nome"],"id":35},{"start":{"row":9,"column":33},"end":{"row":9,"column":47},"action":"insert","lines":["id_fase_escola"]}],[{"start":{"row":9,"column":51},"end":{"row":9,"column":60},"action":"remove","lines":["descricao"],"id":36},{"start":{"row":9,"column":51},"end":{"row":9,"column":66},"action":"insert","lines":["\tnm_fase_escola"]}],[{"start":{"row":9,"column":67},"end":{"row":9,"column":116},"action":"remove","lines":[", 'valor', 'quantidade', 'tamanho', 'categoria_id"],"id":37}],[{"start":{"row":9,"column":67},"end":{"row":9,"column":68},"action":"remove","lines":["'"],"id":38}],[{"start":{"row":15,"column":23},"end":{"row":15,"column":24},"action":"insert","lines":["s"],"id":39}],[{"start":{"row":15,"column":24},"end":{"row":15,"column":25},"action":"insert","lines":["e"],"id":40}],[{"start":{"row":15,"column":25},"end":{"row":15,"column":26},"action":"insert","lines":["l"],"id":41}],[{"start":{"row":15,"column":26},"end":{"row":15,"column":27},"action":"insert","lines":["e"],"id":42}],[{"start":{"row":15,"column":27},"end":{"row":15,"column":28},"action":"insert","lines":["c"],"id":43}],[{"start":{"row":15,"column":28},"end":{"row":15,"column":29},"action":"insert","lines":["t"],"id":44}],[{"start":{"row":15,"column":29},"end":{"row":15,"column":30},"action":"insert","lines":["("],"id":45}],[{"start":{"row":15,"column":30},"end":{"row":15,"column":31},"action":"insert","lines":[")"],"id":46}],[{"start":{"row":15,"column":31},"end":{"row":15,"column":32},"action":"insert","lines":["-"],"id":47}],[{"start":{"row":15,"column":32},"end":{"row":15,"column":33},"action":"insert","lines":[">"],"id":48}],[{"start":{"row":15,"column":30},"end":{"row":15,"column":32},"action":"insert","lines":["''"],"id":49}],[{"start":{"row":15,"column":31},"end":{"row":15,"column":45},"action":"insert","lines":["id_fase_escola"],"id":50}],[{"start":{"row":15,"column":45},"end":{"row":15,"column":46},"action":"insert","lines":[","],"id":51}],[{"start":{"row":15,"column":46},"end":{"row":15,"column":47},"action":"insert","lines":[" "],"id":52}],[{"start":{"row":15,"column":47},"end":{"row":15,"column":61},"action":"insert","lines":["nm_fase_escola"],"id":53}],[{"start":{"row":9,"column":4},"end":{"row":9,"column":69},"action":"remove","lines":["protected $fillable = array('id_fase_escola', '\tnm_fase_escola');"],"id":54},{"start":{"row":9,"column":4},"end":{"row":11,"column":6},"action":"insert","lines":["protected $fields        = [ ","        'nm_fase_escola\t', 'cd_fase_idade', 'ic_status_reserva'","    ];"]}],[{"start":{"row":17,"column":45},"end":{"row":17,"column":46},"action":"insert","lines":["'"],"id":55}],[{"start":{"row":17,"column":48},"end":{"row":17,"column":49},"action":"insert","lines":["'"],"id":56}],[{"start":{"row":17,"column":10},"end":{"row":17,"column":11},"action":"remove","lines":["("],"id":57}],[{"start":{"row":17,"column":9},"end":{"row":17,"column":10},"action":"remove","lines":["d"],"id":58}],[{"start":{"row":17,"column":8},"end":{"row":17,"column":9},"action":"remove","lines":["d"],"id":59}],[{"start":{"row":17,"column":8},"end":{"row":17,"column":9},"action":"insert","lines":["r"],"id":60}],[{"start":{"row":17,"column":9},"end":{"row":17,"column":10},"action":"insert","lines":["e"],"id":61}],[{"start":{"row":17,"column":10},"end":{"row":17,"column":11},"action":"insert","lines":["t"],"id":62}],[{"start":{"row":17,"column":11},"end":{"row":17,"column":12},"action":"insert","lines":["u"],"id":63}],[{"start":{"row":17,"column":12},"end":{"row":17,"column":13},"action":"insert","lines":["r"],"id":64}],[{"start":{"row":17,"column":13},"end":{"row":17,"column":14},"action":"insert","lines":["n"],"id":65}],[{"start":{"row":17,"column":14},"end":{"row":17,"column":15},"action":"insert","lines":[" "],"id":66}],[{"start":{"row":17,"column":69},"end":{"row":18,"column":0},"action":"insert","lines":["",""],"id":67},{"start":{"row":18,"column":0},"end":{"row":18,"column":8},"action":"insert","lines":["        "]}],[{"start":{"row":19,"column":15},"end":{"row":19,"column":16},"action":"remove","lines":[")"],"id":68}],[{"start":{"row":9,"column":4},"end":{"row":11,"column":6},"action":"remove","lines":["protected $fields        = [ ","        'nm_fase_escola\t', 'cd_fase_idade', 'ic_status_reserva'","    ];"],"id":69}],[{"start":{"row":8,"column":40},"end":{"row":9,"column":4},"action":"remove","lines":["","    "],"id":70}],[{"start":{"row":10,"column":28},"end":{"row":11,"column":0},"action":"insert","lines":["",""],"id":71},{"start":{"row":11,"column":0},"end":{"row":11,"column":1},"action":"insert","lines":["\t"]}],[{"start":{"row":11,"column":1},"end":{"row":12,"column":0},"action":"insert","lines":["",""],"id":72},{"start":{"row":12,"column":0},"end":{"row":12,"column":1},"action":"insert","lines":["\t"]}],[{"start":{"row":12,"column":1},"end":{"row":16,"column":5},"action":"insert","lines":["public static function listFaseEscola()","    {","        ","        return FaseEscola::select('id_fase_escola, nm_fase_escola')->get();","    }"],"id":73}],[{"start":{"row":13,"column":5},"end":{"row":14,"column":8},"action":"remove","lines":["","        "],"id":75}],[{"start":{"row":14,"column":49},"end":{"row":14,"column":50},"action":"insert","lines":["'"],"id":76}],[{"start":{"row":14,"column":52},"end":{"row":14,"column":53},"action":"insert","lines":["'"],"id":77}]]},"ace":{"folds":[],"scrolltop":60,"scrollleft":0,"selection":{"start":{"row":14,"column":53},"end":{"row":14,"column":53},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":7,"state":"php-start","mode":"ace/mode/php"}},"timestamp":1495626941671,"hash":"f60c2e890ec0b36f8ddc3aeead18e942e4b30eb3"}