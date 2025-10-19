<?php
    session_start();
    require("../inc/fonction.php");
    supprimer($_SESSION['afficher']['ID_Membre'], $_GET['num']);
    header('Location: membre.php');
?>