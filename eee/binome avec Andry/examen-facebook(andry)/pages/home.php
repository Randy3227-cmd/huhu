<?php
include('../inc/base.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="../asset/css/style1.css">
</head>

<body>
<div class="profil-container">
    <h4>Bienvenue sur votre profil facebook </h4>
    <h4>
        Utilisateur : <?php echo $_SESSION['afficher']['Nom']; ?>
    </h4>
  

    <a href="publication.php"><input class="form" type="button" value="Commencer a publier"></a>
    <a href="membre.php"><input type="button" value="Suggestion d'amis et Demande d'amis"></a>
    <a href="listDemande.php"><input type="button" value="Liste des amis"></a>
    <a href="conversation.php"><input type="button" value="Discussions"></a>
    <a href="traitement_logout.php"><input class="form_sub" type="button" value="Se deconnecter"></a>
    </div>
</body>

</html>