<?php

class AdminGateway {
    private $connect;
    
    public function __construct(Connection $connect) {
        $this->connect = $connect;
    }
    public function select(){
        $query='SELECT mdp, login FROM parametre';
        
        $this->connect->executeQuery($query, '');
        
        $result = $this->connect->getResult();
        
        return $result;
    }
    
}
