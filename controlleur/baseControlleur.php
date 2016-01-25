  


<?php 
    //Validation 
    
     class baseControlleur {

        
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

                    

                    
                    case 'login':
                        require($rep.$vue['login']);
                    break;
                
                    case 'portail':
                        require($rep.$vue['portail']);
                    break;
                    
                    case 'support':
                        require($rep.$vue['support']);
                    break;
                
                    case 'inscription':
                        require($rep.$vue['inscription']);
                    break;
                
                    case 'validationConnexion' :
                        $this->validationConnexion();
                    break;
                
                    case 'validationInscription':
                        $this->validationInscription();
                    break;
                    default:
                        require($rep.$vue['accueil']);
                    break;
                }
            } 
            catch (Exception $e1) {
                echo $e1->getMessage();
            }
            catch (PDOException $ep){
                echo "Erreur base de données: ".$ep->getMessage();
            }
        }
        
        function validationInscription(){
            if(!isset($_POST['name'])){
                $_POST['name']='';
            }
            if(!isset($_POST['siege'])){
                $_POST['siege']='';
            }
            if(!isset($_POST['password'])){
                $_POST['password']='';
            }
            
            $formValid = true;
            
            $tabVal['name']=$_POST['name'];
            $tabVal['siege']=$_POST['siege'];
            $tabVal['password']=$_POST['password'];
            
              $tabVal = Validation::cleanTab($tabVal);        
            $tabBool = Validation::validateTab($tabVal);

            //Test si le formulaire est valide 
            foreach($tabBool as $key => $value)
            {
                if (!$value)
                    $formValid = false;               
            }    


            //Si le formulaire est valide on insert les données ! 
            if ($formValid)
            {
                
            }
            
        }
    
     }
    
    
        
 ?>