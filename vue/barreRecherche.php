<div class="navbar-wrapper">
      <div class="container">

        <form class="form-signin" action="index.php?action=validationConnexion" method="POST">
            <fieldset>
          
                <label for="MotClef" class="sr-only"></label>
                <input type="text" id="MotClef" name="MotClef" class="form-control" placeholder="Veuillez rentrer un mot clef" required autofocus>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Rechercher</button>
            
                <div>
                    <?php 
                        if(isset($_POST['MotClef'])){
                            if(!$_POST['MotClef']) echo'<p id="formErreur">mot invalide</p>';
                            $Connexion_BDD = mysqli_connect('localhost','root', '' , 'projetentreprise');
                            $utf = mysqli_query($Connexion_BDD ,'SET NAMES UTF8') ;
                            $sql = 'SELECT libelle 
                                    FROM produit 
                                    WHERE code_produit IN ( 
                                                        SELECT code_produit 
                                                        from motcle 
                                                        WHERE mot ="'.$_POST['MotClef'].'")';
                            
                            

                            $sql3 =  'SELECT id_entreprise from entreprise Order by categorie DESC';
                            

                            
                            $req2 = mysqli_query($Connexion_BDD ,$sql3) ;
                            while ($data = mysqli_fetch_array($req2)) {
                                $categ = $data['id_entreprise'];
                                $sql2 = 'SELECT code_produit
                                    FROM proposerproduit 
                                    WHERE code_entreprise ="'.$categ.'" AND code_produit IN ( 
                                                        SELECT code_produit 
                                                        from motcle 
                                                        WHERE mot ="'.$_POST['MotClef'].'")' ;

                                $req = mysqli_query($Connexion_BDD ,$sql2) ;
                                while ($data2 = mysqli_fetch_array($req)){
                                    echo $data2['code_produit'];

                                    echo "</br>";
                                }
                            }
                        }
                         
                    ?>
                </div>
            
            </fieldset>
        </form>

      </div>
    </div>