<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <form action="traitement_pub.php" method="post" enctype="multipart/form-data">
            <label for="pdp">Publier une photo :</label>
            <input type="file" name="img_pub" id="img_pub">
            <input type="submit" value="Valider">
        </form>
        <input type="button" value="Annuler">

</body>
</html>