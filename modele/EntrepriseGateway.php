<?php

class EntrepriseGateway {
    private $connect;
    
    public function __construct(Connection $connect) {
        $this->connect = $connect;
    }
    public function insert($name,$siege,$pass){
        
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        
        $query='INSERT INTO entreprise VALUES(0,:name,:siege,:pass)';
        
        $args = array ('name' => array($name,  PDO::PARAM_STR),
                        'siege' => array($siege, PDO::PARAM_STR),
                        'pass' => array($pass,PDO::PARAM_STR));
        
        $this->connect->executeQuery($query, $args);
        
        
     
    }
    
    
    public function selectMDPEnt($nameENT){
        $query='SELECT password FROM entreprise WHERE raison_sociale=:name';
        $args = array ('name' => array($nameENT,  PDO::PARAM_STR));
         $this->connect->executeQuery($query, $args);
         
         $res = $this->connect->getResult();
         return $res;
    }
    
}
