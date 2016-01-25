<?php


class frontCtrl {
    

    function __construct() {
        
        $listeAction = array();
        
        try{
            
            
            if(isset($_REQUEST['action'])){
                   $action = $_REQUEST['action'];
                   
                   if(Validation::validateItem($_REQUEST['action'], 'action')){

                        $action = Validation::cleanItem($_REQUEST['action'], 'str');
                    }
            }
            else
                $action = "";
                    
            
            if(in_array($action, $listeAction)){
                
                    new adminControlleur();
            }
            else
                if($action=="supportFormulaire")  new contactControlleur();
                else new baseControlleur ();
            
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
}
