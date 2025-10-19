<?php
    session_start();
    include ('../inc/base.php');
    include ('../inc/fonction.php');
    $id1=$_SESSION['afficher']['ID_Membre'];
    $id2=$_GET['id'];

    
    if(isset($id2)){

        if(sontAmis($id1,$id2)=="Ajouter comme ami(e)")
        {
            $base=mysqli_query($bdd,"insert into amis values('$id1','".$id2."',now(),null)");
        }

        if(sontAmis($id1,$id2)=="Confirmer")
        {
            $base=mysqli_query($bdd,"insert into amis(ID_Membre1,ID_Membre2,DateHeureAcceptation) 
            values('$id1','".$id2."',now())");
        }
    }

    header('Location:membre.php');


    
?>
