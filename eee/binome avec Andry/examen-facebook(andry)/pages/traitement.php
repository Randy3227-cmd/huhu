<?php
    include('../inc/fonction.php');

    if(isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['mdp']) && isset($_POST['date'])){

        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];
        $date_nais = $_POST['date'];
        inscription($email,$nom,$mdp,$date_nais);
    }

    session_start();
    $_SESSION['nom'] = $_POST['nom'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['mdp'] = $_POST['mdp'];
    $_SESSION['dtn'] = $_POST['date'];

    header('Location:../pages/page_login.php');


?>