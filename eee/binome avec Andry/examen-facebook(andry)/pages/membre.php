<?php
include('../inc/base.php');
include('../inc/fonction.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membres</title>
    <link rel="stylesheet" href="../asset/css/style2.css"> 
</head>

<body>
    <div class="list-pub">
        <h4>Liste des membres</h4>
        
        <?php showMembreFB(); ?>
        <?php while ($donnee = mysqli_fetch_assoc($_SESSION['AfficheMembreQuery'])) { ?>
        <a href="profil.php?personne=<?= $donnee['ID_Membre'] ?>">
            <div class="publication">
                <h5><?= $donnee['Nom'] ?></h5>
                <h5><?= $donnee['email'] ?></h5>
                <?php 
                    $user = $_SESSION['afficher']['ID_Membre']; 
                    $afficher = sontAmis($user, $donnee['ID_Membre']); 
                    $_SESSION['listMembre'] = $donnee; 
                    ?>
                <a href="traitement_ajouter.php?id=<?= $donnee['ID_Membre'] ?>">
                    <input type="button" value="<?= $afficher ?>">
                </a>
                <?php if($afficher != 'Demande envoyée') {?>
                    <?php if($afficher != 'Ajouter comme ami(e)' && $afficher != 'Ami(e)') {?>
                        <a href="traitement_refuser.php?num=<?= $donnee['ID_Membre'] ?>"> <input type="button" value="Refuser"> </a>
                    <?php } ?>

                    <?php if($afficher == 'Ami(e)') {?>
                        <a href="supprimer.php?num=<?= $donnee['ID_Membre'] ?>"> <input type="button" value="Supprimer"> </a>
                    <?php } ?>
                    <?php } ?>
                    <a href="conversation.php?num=<?= $donnee['ID_Membre'] ?>"> <input type="button" value="Envoyer un message"> </a>
                </div>
            </a>
            <?php } ?>
            <a href="home.php"> <input type="button" value="Revenir"> </a>
        </div>
</body>

</html>
