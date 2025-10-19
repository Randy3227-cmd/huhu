<?php

    include('../inc/base.php');
    include('../inc/fonction.php');
    session_start();

    $_SESSION['idPubClique'] = $_GET['id_pub'];
    $join1 = "SELECT * FROM membres AS m JOIN publications AS p ON m.ID_Membre = p.ID_Membre ORDER BY p.Date_pub DESC";
    $query1 = mysqli_query($bdd, $join1);

    $join2 = "SELECT * FROM membres AS m JOIN commentaire AS c ON c.ID_Membre = m.ID_Membre WHERE c.ID_Pub ='".$_SESSION['idPubClique']."' ORDER BY c.Date_coms DESC ";
    $query2 = mysqli_query($bdd, $join2);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commentaire</title>
    <link rel="stylesheet" href="../asset/css/style4.css">
    <!-- <link rel="stylesheet" href="../asset/css/style3.css"> -->
</head>

<body>
    
    <div class="list-pub">
        <h4> Publication de <?php echo $_SESSION['afficher']['Nom']; ?></h4>
        <?php while ($_SESSION['list_coms'] = mysqli_fetch_assoc($query2)) { ?>
    <?php $pdp_com = showProfil($_SESSION['list_coms']['ID_Membre']); ?>
    <div class="commentaire">
        <img class="pdp-com" src="image/image<?php echo $pdp_com['pdp']; ?>" alt="photo">
        <div class="comment-text">
            <h5><?php echo $_SESSION['list_coms']['Nom']; ?></h5>
            <h5><?php echo $_SESSION['list_coms']['Date_coms']; ?></h5>
            <p><?php echo $_SESSION['list_coms']['TexteComs']; ?></p>
        </div>
    </div>
<?php } ?>


        <form action="traitement_coms.php" method="post">
                    <h6><input type="text" name="texte" id="texte" placeholder="Commenter"></h6>
                    <p><input type="submit" value="Envoyer"></p>
        </form>

        <h4>Liste des commentaires</h4>
        <?php if ($query2) { ?>
            <?php while ($_SESSION['list_coms'] = mysqli_fetch_assoc($query2)) { ?>
                <div class="commentaire">
                        <h5><?php echo $_SESSION['list_coms']['Nom']; ?></h5>
                        <h5><?php echo $_SESSION['list_coms']['Date_coms']; ?></h5>
                        <p><?php echo $_SESSION['list_coms']['TexteComs']; ?></p>
                    </div>
            <?php } ?>
        <?php } ?>
        <a href="publication.php"><input type="button" value="Retour"></a>

    </div>

</body>

</html>