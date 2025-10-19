<?php
    include('../inc/fonction.php');
    session_start();
    
        $texte = $_POST['texte'];
        $id_pub = $_SESSION['idPubClique'];
        $date = date('Y-m-d H:i:s');
        $idmembre= $_SESSION['afficher']['ID_Membre'];
        $donner=insererCommentaire($texte,$id_pub,$date,$idmembre);
   
        header('Location:../pages/commentaire.php?id_pub='.$_SESSION['idPubClique']);


