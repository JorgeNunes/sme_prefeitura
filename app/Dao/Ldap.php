<?php

namespace App\Dao;

class Ldap{
    
    private $user;
    private $password_user;
    private $password = "m4st3r";
    private $servidor_AD = "192.168.10.250";
    private $dominio = "cn=admin,dc=peruibe2,dc=sp,dc=gov,dc=br";
    
    public function __construct($user, $password_user){
        $this->user = $user;
        $this->password_user = $password_user;
    }
    
    public function loginLdap (){
     
        // Conexão com servidor AD. 
        $conexão_ldap = @ldap_connect($this->servidor_AD)or die("Não foi possível conexão!");
     
        // Versao do protocolo       
        ldap_set_option($conexão_ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
        
        //ldap_set_option($conexão_ldap, LDAP_OPT_REFERRALS, 0);
           
        // Bind to the directory server.
        $bd = @ldap_bind($conexão_ldap, $this->dominio, $this->password ) or die("Não foi possível pesquisar");
        
        if($bd){
            //echo "Conectado no servidor";
            
            $verificador = false;
            $grupo = "cn=grp_cvagas,ou=groups,dc=peruibe2,dc=sp,dc=gov,dc=br" ;        
            $filtro = "(cn=grp_cvagas)";
            $array = array("memberuid");

            $pesquisa = ldap_search($conexão_ldap, $grupo, $filtro, $array) or die ("Erro na pesquisa...");
            $info = ldap_get_entries($conexão_ldap, $pesquisa);

            
            foreach($info[0]['memberuid'] as $value){   
                if(strcmp($value, $this->user) == 0){
                    $verificador = true;
                    break;                    
                }else{
                    $verificador = "sem permissão";
                }            
            }

            if($verificador == 1){
                $grupo = "ou=people,dc=peruibe2,dc=sp,dc=gov,dc=br";
                $filtro = "(&(cn=*)(uid=".$this->user."))";
                $array = array("geco", "uid");

                $pesquisa = ldap_search($conexão_ldap, $grupo, $filtro, $array) or die ("Erro na pesquisa...");
                $info = ldap_get_entries($conexão_ldap, $pesquisa);

                try{
                    $ldapbind = @ldap_bind($conexão_ldap, $info[0]['dn'], $this->password_user);
                    

                    if($ldapbind){
                        return $verificador = $info[0]['uid'][0];
                    }else{
                        $verificador = 1;
                    }
                   
                }
                catch (Exception $e){
                    return $verificador = "erro na conexão bind";
                }
            }else{
                $verificador = 0;
            }     
        }

        return $verificador;
        
        //Fecha conexao
        ldap_unbind($conexão_ldap);
    }
}