<?php 
    include('../inc/base.php');
    include('../inc/fonction.php');
    session_start();

    if($_POST['pub']!=NULL){
        $texte = $_POST['pub'];
        $date = date('Y-m-d H:i:s'); 
        $idmembre=$_SESSION['afficher']['ID_Membre'];    
        $donne=insererPub($texte,$date,$idmembre);
        if (!$donne) {
            die("Erreur lors de l'insertion : " . mysqli_error($bdd));
        }
    }
    header('Location:../pages/publication.php');

?>











