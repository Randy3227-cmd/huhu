<?php 
    
    session_start();
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="../asset/css/style1.css">
</head>
<body>
<div class="principal">
    <h2> Se connecter maintenant </h2>
    <?php 
        if(isset($_SESSION['erreur'])){
        echo '<p style="color: red">Utilisateur non reconnu ! Veuillez verifier votre adresse email ou votre mot de passe</p>';
        }
    ?>
    <div class="inscription">
    <form action="traitement_login.php" method="post">
        <h4> Entrer votre email: </h4><input class="form" type="email" name="email1" id="e1" placeholder="email">
        <h4> Entrer votre mot de passe: </h4><input class="form" type="password" name="mdp1" id="m1" placeholder="mot de passe">
        <input class="form_sub" type="submit" value="Se connecter">
    </form>
    </div>
</div>
</body>
</html>