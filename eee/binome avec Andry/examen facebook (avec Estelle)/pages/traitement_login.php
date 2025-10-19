<?php
    
    include('../inc/fonction.php');

    session_start();
    $_SESSION['email1'] = $_POST['email1'];
    $_SESSION['mdp1'] = $_POST['mdp1'];
    $email=$_SESSION['email1'];
    $mdp= $_SESSION['mdp1'];
    $_SESSION['erreur'] ;
    $result=login($email,$mdp);
    $donnee=mysqli_fetch_assoc($result);
    
    if(isset($donnee)){
        $_SESSION['afficher'] = $donnee;
        header('Location:../pages/home.php');
    }
    else {
        $_SESSION['erreur'] = 'error';
        header('Location:../pages/page_login.php');
    }
    
?>