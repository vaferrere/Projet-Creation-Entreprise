<!DOCTYPE html>
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
            <?php
              include("barreMenu.php");
            ?>
  
    <!--<div class="container">
        <h2 class="form-signin-heading">Veuillez vous connecter</h2>
      <form class="form-signin" action="index.php?action=validationConnexion" method="POST">
        <fieldset>
          
        <label for="login" class="sr-only">Login</label>
        <input type="text" id="login" name="login" class="form-control" placeholder="Login" required autofocus>
        
        
        <div>
                            <?php 
                                if(isset($tabBool['login']))
                                    if(!$tabBool['login']) echo'<p id="formErreur">Raison Sociale invalide</p>'; 
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
        
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Connection</button>
      </fieldset>
      </form>

        <div class="row bg-info">
            <p>Je ne suis pas encore inscrit :</p><a href="index.php?action=inscription"> accès page inscription</a>
        </div>-->
        
        
    </div> <!-- /container -->


   
  </body>
</html>
<?php
include("barreRecherche.php");
?>
