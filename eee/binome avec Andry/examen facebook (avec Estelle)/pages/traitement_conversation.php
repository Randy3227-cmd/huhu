<?php 
    include('../inc/base.php');
    include('../inc/fonction.php');
    session_start();

    if($_POST['1mess']!=NULL){
        $idAndefana = $_POST['idAndefana'];
        $texte = $_POST['1mess'];
        $date = date('Y-m-d H:i:s'); 
        $idmembre=$_SESSION['afficher']['ID_Membre'];    
        $donneConv = insererConversation($idmembre,$idAndefana,$date);
        // $donneMess = ;
        if (!$donneConv) {
            die("Erreur lors de l'insertion : " . mysqli_error($bdd));
        }
    }
    header('Location:../pages/conversation.php');

?>