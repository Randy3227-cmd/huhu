<?php
 include("../inc/base.php");
session_start();

// echo $uploadDir;
$maxSize = 2 * 1024 * 1024; // 2 Mo
$allowedMimeTypes = ['image/jpeg', 'image/png', 'application/pdf'];
// Vérifie si un fichier est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['img'])) {
    $file = $_FILES['img'];
    if ($file['error'] !== UPLOAD_ERR_OK) {
        die('Erreur lors de l’upload : ' . $file['error']);
    }
    // Vérifie la taille
    if ($file['size'] > $maxSize) {
        die('Le fichier est trop volumineux.');
    }
    // Vérifie le type MIME avec `finfo`
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);
    if (!in_array($mime, $allowedMimeTypes)) {
        die('Type de fichier non autorisé : ' . $mime);
    }
    // renommer le fichier
    $originalName = pathinfo($file['name'], PATHINFO_FILENAME);
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $newName = $originalName . '_' . uniqid() . '.' . $extension;
    
    
    $newName = $bdd->real_escape_string($newName);
    $id = $_SESSION['afficher']['ID_Membre'];
    // $sql = "UPDATE images SET img = '$newName' WHERE ID_Membre = $id";
    $sql = "INSERT INTO images (ID_Membre,nomImage)  VALUES ($id,$newName)";
    echo $sql;
    if($bdd->query($sql) === TRUE){
        $uploadDir = __DIR__ . '/image/image';
        echo $uploadDir;
        // Déplace le fichier
        if (move_uploaded_file($file['tmp_name'], $uploadDir . $newName)) {
            echo "Fichier uploadé avec succès : " . $newName;
        } else {
            echo "Échec du déplacement du fichier.";
        }
    }
    
    header("Location:ownProfil.php");

} else {
    echo "Aucun fichier reçu.";
}

