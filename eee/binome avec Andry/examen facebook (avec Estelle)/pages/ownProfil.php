<?php 

include('../inc/fonction.php');
session_start();

$connected = $_SESSION['afficher']['ID_Membre'];

if(!empty($connected )){
    $info = showProfil($connected);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../asset/css/style.css">

</head>
<body>
<div class="profile-container">
    <?php if(!empty($info['pdp'])) { ?>
        <img class="profile-img" src="image/image<?php echo $info['pdp']; ?>" alt="Photo de profil">
    <?php } ?>

    <div class="profile-name"><?php echo $info['Nom']; ?></div>
    <div class="profile-date"><?php echo $info['Date_naissance']; ?></div>

    <?php if(empty($info['pdp'])) { ?>
        <form action="traitement_pdp.php" method="post" enctype="multipart/form-data">
            <label for="pdp">Ajouter une photo :</label>
            <input type="file" name="pdp" id="pdp" required>
            <input type="submit" value="Ajouter">
        </form>
    <?php } else { ?>
        <form action="traitement_pdp.php" method="post" enctype="multipart/form-data">
            <label for="pdp">Changer la photo :</label>
            <input type="file" name="pdp" id="pdp" required>
            <input type="submit" value="Changer">
        </form>
    <?php } ?>

    <a href="home.php"><button class="return-btn">Retour</button></a>
</div>

</body>
</html>