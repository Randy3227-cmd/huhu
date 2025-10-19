<?php 
 
    ini_set("display_errors","1");

    function inscription($email,$nom,$mdp, $date_nais){
        include('base.php');
        $insert = "INSERT INTO membres (email, Nom, Mot_de_passe, Date_naissance) VALUES ('%s','%s','%s','%s')";
        $query = sprintf($insert,$email,$nom,$mdp,$date_nais);
        mysqli_query($bdd, $query);
    }


    function login ($email,$mdp){
        include('base.php');
        $query = "SELECT * FROM membres WHERE email = '%s' AND Mot_de_passe = '%s'";
        $sql = sprintf($query, $email, $mdp);
        $result= mysqli_query($bdd,$sql);
        return $result;
    }

    

    function insererCommentaire ($texte ,$id_pub ,  $date ,$idmembre){
        include('base.php');
        $insert = "INSERT INTO commentaire (ID_Pub, Date_coms, TexteComs, ID_Membre) VALUES ('%s','%s','%s','%s')";
        $query = sprintf($insert, $id_pub, $date, $texte, $idmembre);
        mysqli_query($bdd, $query);
    }


    function insererPub($texte,$date, $idmembre){
        include('base.php');
        $insert = "INSERT INTO publications (Date_pub, Contenu , ID_Membre) VALUES ('%s','%s','%s')";
        $query = sprintf($insert,$date,$texte,$idmembre);    
        $donne = mysqli_query($bdd, $query);
        return $donne;
    }

    function blocker($id1,$id2){
        include('base.php');
        $sql = "INSERT INTO bloquer VALUES ($id1,$id2)";
        $query = mysqli_query($bdd,$sql);
    }
    function showMembreFB(){
        session_start();
        include('base.php');
        
        $idConnecte = $_SESSION['afficher']['ID_Membre'];
        $sql = "SELECT * FROM membres WHERE ID_Membre <> (%s) ";
        $sql = sprintf($sql,$_SESSION['afficher']['ID_Membre']);
        $query = mysqli_query($bdd,$sql);
        $_SESSION['AfficheMembreQuery'] = $query;
    }


    function Accepter ($id1,$id2){
        include('base.php');    
        $sql = sprintf("UPDATE amis SET DateHeureAcceptation = NOW() WHERE ID_Membre1 = '%s' AND ID_Membre2 = '%s'", $id1,$id2);
        $sql = mysqli_query($bdd,$sql);

    }

    
    function Ajouter ($id1, $id2){
        include('base.php');
        $sql = sprintf("INSERT INTO amis (ID_Membre1,ID_Membre2,DateHeureDemande) VALUES ('%s','%s',NOW())" , $id1, $id2);
        $sql = mysqli_query($bdd, $sql);

    }

    
    function Refuser($id1,$id2){
        include('base.php');
    
        $sql=sprintf("DELETE FROM amis WHERE ID_Membre1='%s' AND ID_Membre2='%s' AND DateHeureAcceptation IS NULL",$id2,$id1);
        mysqli_query($bdd,$sql);
    }


    function findFriends($id1, $id2, $dtDemande, $dtAccept) {
        if ($dtAccept != NULL && $dtDemande != NULL) {
            return "Ami(e)";
        } elseif ($dtDemande != NULL && $dtAccept == NULL) {
            return "Accepter";
        } else {
            Ajouter($id1, $id2);
            return "Ajouter";
        }
    }


    function supprimer($id1,$id2){
        include('base.php');
    
        $sql=sprintf("DELETE FROM amis WHERE ID_Membre1='%s' AND ID_Membre2='%s' AND DateHeureAcceptation IS NOT NULL",$id1,$id2);
        mysqli_query($bdd,$sql);
    }


    function sontAmis($utilisateur1, $utilisateur2) {
        include('base.php');    

        $phrase='Ajouter comme ami(e)';
        
        $requete = "SELECT * FROM amis WHERE
         ((ID_Membre1 = '$utilisateur1' AND ID_Membre2 = '$utilisateur2')
         AND (DateHeureDemande is not null)
         AND (DateHeureAcceptation is null))";
    
        $requete1 = "SELECT * FROM amis WHERE
             ((ID_Membre1 = '$utilisateur2' AND ID_Membre2 = '$utilisateur1')
          AND (DateHeureDemande is not null)
          AND (DateHeureAcceptation is null))";
    
        $requete2="SELECT * FROM amis WHERE
          ((ID_Membre1 = '$utilisateur2' AND ID_Membre2 = '$utilisateur1')
          OR (ID_Membre1 = '$utilisateur1' AND ID_Membre2 = '$utilisateur2'))
          AND ((DateHeureDemande is null)
          AND (DateHeureAcceptation is not null))";
    
        $resultat = mysqli_query($bdd, $requete);
        $resultat1=mysqli_query($bdd,$requete1);
        $resultat2=mysqli_query($bdd,$requete2);   
            
            if (mysqli_num_rows($resultat) > 0) {
                    $phrase='Demande envoyée'; 
            }
            if(mysqli_num_rows($resultat1) > 0)
            {
                $phrase='Confirmer';
            }
            if(mysqli_num_rows($resultat2) > 0)
            {
                $phrase='Ami(e)';
            }

            return $phrase;
    }

    function getPublicationsDesAmis($bdd, $id_membre) {
       
        $requete1 = "
            SELECT * FROM membres m
            JOIN publications p ON m.ID_Membre = p.ID_Membre
            WHERE p.ID_Membre IN (
                SELECT ID_Membre2 FROM amis
                WHERE ID_Membre1 = $id_membre AND DateHeureAcceptation IS NOT NULL
            )
        ";
    
        
        $requete2 = "
            SELECT * FROM membres m
            JOIN publications p ON m.ID_Membre = p.ID_Membre
            WHERE p.ID_Membre IN (
                SELECT ID_Membre1 FROM amis
                WHERE ID_Membre2 = $id_membre AND DateHeureAcceptation IS NOT NULL
            )
        ";
    
        // Requête 3 : publications de l'utilisateur lui-même
        $requete3 = "
            SELECT * FROM membres m
            JOIN publications p ON m.ID_Membre = p.ID_Membre
            WHERE p.ID_Membre = $id_membre
        ";
    
        // Union des trois requêtes
        $final_query = "($requete1) UNION ($requete2) UNION ($requete3) ORDER BY Date_pub DESC";
    
        return mysqli_query($bdd, $final_query);
    }
    

    function insererConversation($idMandefa,$idAndefasana,$dateCreation){
        include('base.php');
        $insert = "INSERT INTO conversation (date_creation, id_participant1 , id_participant2) VALUES ('%s','%s','%s')";
        $query = sprintf($insert,$dateCreation,$idMandefa,$idAndefasana);    
        $donne = mysqli_query($bdd, $query);
        return $donne;
    }


    // function insererMessage($idConv,$dateenvoie,$contenuMess,$idMandefa){
    //     include('base.php');
    //     // $insertConv = insererConversation($idMandefa,$idAuteur,$i);
    //     $insert = "INSERT INTO message (id_Conversation, id_auteur , contenu_message,date_envoie) VALUES ('%s','%s','%s','%s')";
    //     $query = sprintf($insert,$idConv,$idMandefa,$contenuMess,$dateenvoie);    
    //     $donne = mysqli_query($bdd, $query);
    //     return $donne;
    // }

    // function showConversation(){
    //     include('base.php');
    //     $query1 = "SELECT * FROM membres m JOIN Conversation conv ON m.ID_Membre = conv.id_participant1";
    //     $query2 = "SELECT * FROM membres m JOIN Message mes ON m.ID_Membre = mes.id_Auteur";

    //     $query = " ($query1) UNION ($query2)";
    //     return mysqli_query($bdd,$query); 
        
    // }

    function showProfil($id_Connected){
        include('base.php');
        $query = "SELECT * FROM membres WHERE ID_Membre = $id_Connected";
        $sql = mysqli_query($bdd, $query);

        $donnee = mysqli_fetch_assoc($sql);
        return $donnee;
    }


function getOrCreateConversation($bdd, $id_utilisateur, $id_destinataire) {

    $sql = "SELECT id_Conversation FROM conversation 
            WHERE (id_participant1 = $id_utilisateur AND id_participant2 = $id_destinataire) 
               OR (id_participant1 = $id_destinataire AND id_participant2 = $id_utilisateur)";
    $result = mysqli_query($bdd, $sql);

    if (mysqli_num_rows($result) > 0) {
        $conversation = mysqli_fetch_assoc($result);
        return $conversation['id_Conversation'];
    } else {
        // Créer nouvelle conversation
        $now = date('Y-m-d H:i:s');
        $insert = "INSERT INTO conversation (date_creation, id_participant1, id_participant2)
                   VALUES ('$now', $id_utilisateur, $id_destinataire)";
        mysqli_query($bdd, $insert);
        return mysqli_insert_id($bdd);
    }
}

function envoyerMessage($bdd, $id_conversation, $id_utilisateur, $message) {
    $message = mysqli_real_escape_string($bdd, $message);
    $now = date('Y-m-d H:i:s');
    $insertMessage = "INSERT INTO message (id_Conversation, id_auteur, contenu_message, date_envoi)
                      VALUES ($id_conversation, $id_utilisateur, '$message', '$now')";
    mysqli_query($bdd, $insertMessage);
}

function getMessages($bdd, $id_conversation) {
    $query = "SELECT * FROM message WHERE id_Conversation = $id_conversation ORDER BY date_envoi ASC";
    return mysqli_query($bdd, $query);
}

function getImages($bdd){
    $query = "SELECT * FROM publications join membres WHERE img is not NULL AND publications.ID_Membre = membres.ID_Membre ORDER BY Date_pub ASC";
    return mysqli_query($bdd, $query);
    // return $query;
}


?>