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
    <link rel="stylesheet" href="../asset/bootstrap/css/bootstrap.min.css">
    <script src="../asset/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../asset/css/style1.css">
</head>

<body>
    <!-- <div class="profil-container"> -->
    <div class="container">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
<div class="nav-tabs">
    <ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="membre.php">Notifications</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="listDemande.php">Amis</a>
    </li>
    <li class="nav-item">
        <a class="nav-link disabled" href="conversation.php">Conversation</a>
    </li>
    <li class="nav-item">
        <a class="nav-link disabled" href="ownProfil.php">Mon Profil</a>
    </li>
    <li class="nav-item">
        <a class="nav-link disabled" href="traitement_logout.php">Deconnexion</a>
    </li>
    </ul>
    </div>
</nav>

    <!-- <h4>Bienvenue sur votre profil facebook </h4> -->
    <h4>
        Utilisateur : <?php echo $_SESSION['afficher']['Nom']; ?>
    </h4>
  
    <!-- <a href="publication.php"><input class="form" type="button" value="Commencer a publier"></a>
    <a href="membre.php"><input type="button" value="Suggestion d'amis et Demande d'amis"></a>
    <a href="listDemande.php"><input type="button" value="Liste des amis"></a>
    <a href="conversation.php"><input type="button" value="Discussions"></a>
    <a href="ownProfil.php"><input type="button" value="Voir mon profil"></a> -->
    <a href="listImage.php"><input class="form_sub" type="button" value="Image"></a>
    </div>
</body>

</html>