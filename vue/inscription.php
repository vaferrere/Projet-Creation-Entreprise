<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Connection</title>

    <!-- Bootstrap core CSS -->
    <link href="vue/css/bootstrap.min.css" rel="stylesheet">

   
    <link href="vue/css/signin.css" rel="stylesheet">

    
  </head>
  
  <?php include("barreMenu.php");
  ?>

  <div class="container">
    <h2 class="form-signin-heading">Formulaire d'inscription</h2>
      <form class="form-signin" action="index.php?action=validationInscription" method="POST">
        <fieldset>
          
        <label for="name" class="sr-only">Raison Sociale de l'Entreprise</label>
        <input type="text" id="name" name="name" class="form-control" placeholder="Raison Sociale" required autofocus>
        
        
        <div>
                            <?php 
                                if(isset($tabBool['name']))
                                    if(!$tabBool['name']) echo'<p id="formErreur">Nom d\'entreprise invalide ou déjà éxistant !"</p>'; 
                            ?>
                    </div>
        
        
        <label for="siege" class="sr-only">Siège Social</label>
        <input type="text" id="siege" name="siege" class="form-control" placeholder="Siège Social" required autofocus>
        
        
        <div>
                            <?php 
                                if(isset($tabBool['siege']))
                                    if(!$tabBool['siege']) echo'<p id="formErreur">Champ invalide</p>'; 
                            ?>
                    </div>
        
        
        <label for="password" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
       
        
         <div >
                            <?php 
                                if(isset($tabBool['password']))
                                    if(!$tabBool['password']) echo'<p id="formErreur">Mot de passe invalide</p>'; 
                            ?>
                    </div>
        
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Inscription</button>
      </fieldset>
      </form>

        <div class="row bg-info">
            <p>Je ne suis déjà inscrit :</p><a href="index.php?action=login"> accès page connection</a>
        </div>
        
        
    </div> <!-- /container -->

