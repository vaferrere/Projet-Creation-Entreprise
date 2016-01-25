<?php


class EntrepriseModel {
    public static function insertEntreprise($name,$siege,$pass){
       
       $b=new EntrepriseGateway(new Connection());
       $b->insert($name, $siege, $pass);
    }
    
    public static function getMdpEntreprise($nameEnt){
        $b=new EntrepriseGateway(new Connection());
        $res = $b->selectMDPEnt($nameEnt);
        return $res;
    }
}
