<?php
include('../inc/base.php');
// include('../inc/fonction.php');

session_start();


$connected = $_SESSION['afficher']['ID_Membre'];
include('../inc/fonction.php');
if(!empty($connected )){
    $info = showProfil($connected);
    $query = getImages($bdd);
  
}

$idConnecte = $_SESSION['afficher']['ID_Membre'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="../asset/bootstrap/css/bootstrap.min.css">
    <script src="../asset/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../asset/css/style.css">
</head>

<body>
    <?php include('../inc/header.php') ?>
        <div class="profile-container">
        <!-- <h3>Bienvenue sur votre profil</h3> -->
            <?php if(!empty($info['pdp'])) { ?>
                <img class="profile-img" src="image/image<?php echo $info['pdp']; ?>" alt="Photo de profil">
            <?php } ?>
    
        <div class="profile-name"><?php echo $info['Nom']; ?></div>
            <a href="home.php"><button class="return-btn">Retour</button></a>
                <div class="container">

                    <div class="publication">
                        <?php while($msg = mysqli_fetch_assoc($query)) { ?>
                            <div class="img">
                                <img src="image/image<?php echo $msg['img'] ?>" alt="...">
                                <?php if($msg['ID_Membre'] == $idConnecte){  ?>
                                    <a href=""></a>
                                <?php } ?>

                            </div>
                            <div class="contenue">
                            <?php echo $msg['Contenu'] ;?>
                                <?php echo $msg['Date_pub']; ?>
                                <?php echo $msg['Nom']; ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>



                
</body>

</html>