<?php 
    include('../inc/fonction.php');
    session_start();
    
    $idConnecte = $_SESSION['afficher']['ID_Membre'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php $sql = showAllImage(); ?>
    <?php while($donnee = mysqli_fetch_assoc($sql)){ ?>
        <img src="image/image<?php $donnee['nomImage']; ?>" alt="pub">
        <?php if($donnee['ID_Membre'] == $idConnecte) { ?>
            <a href="modifierImage.php">Modifier</a>
        <?php } ?>
    <?php } ?>

</body>
</html>