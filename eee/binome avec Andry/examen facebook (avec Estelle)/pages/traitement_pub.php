<?php 
    include('../inc/base.php');
    include('../inc/fonction.php');
    session_start();

    if($_POST['pub']!=NULL){
        $texte = $_POST['pub'];
        $date = date('Y-m-d H:i:s'); 
        $idmembre=$_SESSION['afficher']['ID_Membre'];    
        // $donne=insererPub($texte,$date,$idmembre);
        // if (!$donne) {
        //     die("Erreur lors de l'insertion : " . mysqli_error($bdd));
        // }

        $maxSize = 2 * 1024 * 1024; // 2 Mo
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'application/pdf','image/jpg'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['img_pub'])) {
            echo 'balab';

                $file = $_FILES['img_pub'];
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
                $sql = "UPDATE publications SET img = '$newName' WHERE ID_Membre = $id";
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
        }               
 // Vérifie si un fichier est soumis
        header('Location:../pages/publication.php');
    }

?>
<?php




?>











