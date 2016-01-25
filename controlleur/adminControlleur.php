<?php

    class adminControlleur {

        
        function __construct() {
            global $rep, $vue;
   
    
    
            try{

                if(!isset($_REQUEST['action'])){
                   $_REQUEST['action']="";
                }

                if(Validation::validateItem($_REQUEST['action'], 'action')){

                    $action = Validation::cleanItem($_REQUEST['action'], 'str');
                }

                switch ($action){
                    case 'validationConnexion':

                        $this->ValidationConnexion();


                    break;

                    default:

                    break;
                }
            } 
            catch (Exception $e1) {
                echo $e1->getMessage();

            }
            catch (PDOException $ep){
                echo "Erreur base de données";
            }
        }
        function ValidationConnexion(){
            global  $rep, $vue;
            $connexion = true;

            
            
           
            if(!isset($_POST['password'])){
                $_POST['password']="";
            }

            if(!isset($_POST['login'])){
                $_POST['login']="";
            }

               
                $tabVal['password']=$_POST['password'];
                
                $tabVal['login']=$_POST['login'];

                $tabVal = Validation::cleanTab($tabVal);
                $tabBool= Validation::validateTab($tabVal);

                

                foreach($tabBool as $key => $value){
                    
                   
                    if(!$value)
                        $connexion = false;
                }
           
            if ($connexion)
            {
                 
                 $resCo = AdminModel::selectAdmin();
                   
                 if ($tabVal['password']!=$resCo[0]['mdp']){
                        
                     $tabBool['password'] = 0;
                     $connexion=FALSE;

                 }


                 if ($tabVal['login'] != $resCo[0]['login']){

                     $tabBool['login'] = 0;
                     $connexion=FALSE;
                 }

                 if($connexion){
                 
                     require($rep.$vue['vueAdmin']);
                 }

                 else{
                     $validPassword = false;
                     require($rep.$vue['login']);
                 }

            }

            else 
                require($rep.$vue['login']);
                


        }
    }
    
   
?>