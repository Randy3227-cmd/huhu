<?php
session_start();
require("../inc/fonction.php");
$_SESSION['id1']=$_GET['num'];
blocker($_SESSION['afficher']['ID_Membre'], $_GET['num']);
header('Location: publication.php');
?>