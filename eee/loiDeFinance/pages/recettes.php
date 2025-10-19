<?php include("../inc/data/data.php") ; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Recettes</title>    
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="..\assets\bootstrap\bootstrap.bundle.min.js"></script>
    <script src="..\assets\bootstrap\bootstrap.min.js"></script>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><?= $tab[0]['nom']  ?> : <?= $tab[0]['titre'] ?> </li>
            </ul>
        </nav>
    </header>

    <main>
        <table class="table-info" border="1px">
            <tr>
                <td><?= $tab[0]['titre']  ?></td>
                <td><?= $tab[0]['annee-precedente']  ?></td>
                <td><?= $tab[0]['annee-courante']  ?></td>
            </tr>
            <tr>
                <td><?= $tab[0]['description1'] ?></td>
                <td><?= $tab[0]['valeurG1'] ?></td>
                <td><?= $tab[0]['valeurD1'] ?></td>
            </tr>
            <tr>
                <td><?= $tab[0]['description2'] ?></td>
                <td><?= $tab[0]['valeurG2'] ?></td>
                <td><?= $tab[0]['valeurD2'] ?></td>
            </tr>
        </table>
    </main>

</body>
</html>