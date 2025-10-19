<?php
session_start();
include('../inc/base.php'); 
include('../inc/fonction.php');

$id_utilisateur = $_SESSION['afficher']['ID_Membre'];
$id_destinataire = $_GET['num'];
echo $id_utilisateur;


$id_utilisateur = $_SESSION['afficher']['ID_Membre'];
$id_destinataire = $_GET['num'];

if (!$id_destinataire) {
    die("Aucun destinataire.");
}


$id_conversation = getOrCreateConversation($bdd, $id_utilisateur, $id_destinataire);

// Envoi du message
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['message'])) {
    envoyerMessage($bdd, $id_conversation, $id_utilisateur, $_POST['message']);
}


$messagesResult = getMessages($bdd, $id_conversation);
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Conversation</title>
    <link rel="stylesheet" href="../asset/css/style.css"> 

</head>
<body>
    <h3>Conversation avec le membre ID <?= $id_destinataire ?></h3>
    <div class="messages" style="border:1px solid #ccc; padding:10px; max-height:300px; overflow-y:scroll;">
        <?php while($msg = mysqli_fetch_assoc($messagesResult)) { ?>
            <p><strong><?= $msg['id_auteur'] == $id_utilisateur ? "Vous" : "Lui" ?> :</strong> <?= htmlspecialchars($msg['contenu_message']) ?>
            <br><small><?= $msg['date_envoi'] ?></small></p>
        <?php } ?>
    </div>

    <form method="post">
        <input type="text" name="message" placeholder="Tapez votre message ici" required>
        <input type="submit" value="Envoyer">
    </form>

    <a href="membre.php">Retour aux membres</a>
</body>
</html>
