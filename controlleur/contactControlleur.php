
<?php 
  
    
     class contactControlleur {

        
        function __construct() {
            // dans le futur traitement des $action mais la cas unique donc :
           $this->contacter();
        }
        
        // clean string pour les valeurs interdites avec les emails ( to : cc : etc ...) on en a besoin dans contacter()
        function clean_string($string) {
                    $bad = array("content-type","bcc:","to:","cc:","href");
                    return str_replace($bad,"",$string);
        }
        
        public function contacter(){
           
            global $rep, $vue;
            $formValid = true;
            
            $tabVal['prenom'] = $_POST['prenom'];
            $tabVal['nom'] = $_POST['nom'];
            $tabVal['email'] = $_POST['email'];
            $tabVal['objet'] = $_POST['objet'];
            $tabVal['commentaire'] = $_POST['commentaire'];
           
            
            $tabVal = Validation::cleanTab($tabVal);        
            $tabBool = Validation::validateTab($tabVal);
            
            foreach($tabBool as $key => $value)
            {
                if (!$value)
                    $formValid = false;               
            }

            if($formValid){
                $email_to = "thegameur63@gmail.com";
                
                // On prépare le message
                $email_message = "Prénom: ".$this->clean_string($tabVal['prenom'])."\n";
                $email_message .= "Nom: ".$this->clean_string($tabVal['nom'])."\n";
                $email_message .= "Email: ".$this->clean_string($tabVal['email'])."\n";
                $email_message .= "Commentaires: \n\t".$this->clean_string($tabVal['commentaire'])."\n";
                
    
                // header de l'email

                $headers = 'From: '.$tabVal['email']."\r\n".
                'Reply-To: '.$tabVal['email']."\r\n" .
                'X-Mailer: PHP/' . phpversion();
            
                // envoi du mail 
                @mail($email_to, '['.$tabVal['etat'].'] '.$tabVal['objet'], $email_message, $headers);
                
                
                // cas tout c'est bien passé :
                $_REQUEST['action'] = 'confirmation';
                new frontCtrl();
            }
            // probleme formulaire
            else {
                    require($rep.$vue['error']);
                }
        }
     }
