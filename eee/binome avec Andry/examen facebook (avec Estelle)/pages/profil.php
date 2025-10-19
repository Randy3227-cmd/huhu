<?php 
    include('../inc/base.php');
    include('../inc/fonction.php');
    // session_start();
    $personne = $_GET['personne'];

    $join = "SELECT COUNT(*) FROM publications WHERE ID_Membre = '$personne' ";
    $join1 = "SELECT COUNT(*) FROM amis WHERE ID_Membre1 = '$personne'";
    
    $query1 = mysqli_query($bdd, $join);
    $query2 = mysqli_query($bdd, $join1);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
<link rel="stylesheet" href="../asset/css/s.css">
</head>

<body>
    <div class="profil-container">
        <h4>Profil</h4>

        <?php showMembreFB(); ?>
        <?php while ($donnee = mysqli_fetch_assoc($_SESSION['AfficheMembreQuery'])) { ?>
            <?php if ($donnee['ID_Membre'] == $personne) { ?>
                <img src="image/image<?php echo $donnee['pdp']; ?>" alt="Photo de profil">

                <div class="info">
                    <h4>Nom : <?= $donnee['Nom']; ?></h4>
                    <h4>Email : <?= $donnee['email']; ?></h4>
                    <h4>Date de naissance : <?= $donnee['Date_naissance']; ?></h4>
                </div>

                <div class="stats">
                    <div>
                        <span><?php echo implode("", mysqli_fetch_assoc($query1)); ?></span>
                        <label>Publications</label>
                    </div>
                    <div>
                        <span><?php echo implode("", mysqli_fetch_assoc($query2)); ?></span>
                        <label>Amis</label>
                    </div>
                </div>

                <a href="conversation.php?idConv=<?= $donnee['ID_Membre'] ?>">
                    <input type="button" value="Message">
                </a>
            <?php } ?>
        <?php } ?>
    </div>
</body></html>