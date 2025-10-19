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
    <link rel="stylesheet" href="../asset/css/style4.css">
    <!-- <link rel="stylesheet" href="../asset/css/style2.css"> -->
</head>

<body>
    <div class="list-pub">
        <h4>Liste des amis</h4>

        <?php showMembreFB(); ?>
        <?php while ($donnee = mysqli_fetch_assoc($_SESSION['AfficheMembreQuery'])) { ?>
            <?php
            $user = $_SESSION['afficher']['ID_Membre'];
            $afficher = sontAmis($user, $donnee['ID_Membre']);
            $_SESSION['listMembre'] = $donnee;
            ?>

            <?php if (sontAmis($user, $donnee['ID_Membre']) == "Ami(e)") { ?>
                <div class="publication">
                <?php $id_membre = $donnee['ID_Membre']; ?>
                        <?php $pdp = showProfil($id_membre); ?>
                        <img src="image/image<?php echo $pdp['pdp']; ?>" alt="...">
                    <h5><?= $donnee['Nom'] ?></h5>
                    <h5><?= $donnee['email'] ?></h5>
                </div>
            <?php } ?>

        <?php } ?>
        <a href="home.php"><input type="button" value="Retour"></a>
    </div>
</body>

</html>