<?php
ini_set("display_errors", "1");

include('../inc/base.php');
include('../inc/fonction.php');

session_start();

$id_membre = $_SESSION['afficher']['ID_Membre'];

// Récupération des publications
$query1 = getPublicationsDesAmis($bdd, $id_membre);
$_SESSION['query1'] = $query1;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualite</title>
    <!-- <link rel="stylesheet" href="../asset/css/style1.css"> -->
    <link rel="stylesheet" href="../asset/css/style4.css">
</head>

<body>
    <div class="profil_container">
        <h4>Commencer à publier</h4>
        <form action="traitement_pub.php" method="post">
            <p><input class="form" type="text" name="pub" id="pub" placeholder="Votre texte ici" required></p>
            <p><input class="form_sub" type="submit" value="Publier"></p>
        </form>
        <a href="home.php"><input type="button" value="Revenir"></a>

        <div class="list-pub">
            <?php if ($query1) { ?>
                <?php while ($_SESSION['list_pub'] = mysqli_fetch_assoc($query1)) { ?>
                    <div class="publication">
                        <?php $id_membre = $_SESSION['list_pub']['ID_Membre']; ?>
                        <?php $pdp = showProfil($id_membre); ?>
                        <img src="image/image<?php echo $pdp['pdp']; ?>" alt="...">
                        <h5><?php echo $_SESSION['list_pub']['Nom']; ?></h5>
                        <h5><?php echo $_SESSION['list_pub']['Date_pub']; ?></h5>
                        <p><?php echo $_SESSION['list_pub']['Contenu']; ?></p>
                    </div>
                    <a href="commentaire.php?id_pub=<?php echo $_SESSION['list_pub']['ID_Pub']; ?>"><input type="button" value="Voir plus..."></a>
                <?php } ?>
            <?php } ?>
        </div>
        <a href="traitement_logout.php"><input class="form_sub" type="button" value="Se déconnecter"></a>
    </div>
</body>

</html>