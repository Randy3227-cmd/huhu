<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Sign-up </title>
    <link rel="stylesheet" href="../asset/css/style1.css">

</head>

<body>
    <div class="principal">
        <h2> Bienvenue sur Facebook </h2>
        <div class="inscription">
            <form action="traitement.php" method="post">
                <h3><input class="form" type="text" name="nom" id="nom" placeholder="Entrer votre nom" required></h3>
                <h3><input class="form" type="email" name="email" id="email" placeholder="Entrer votre adresse email" required></h3>
                <h3><input class="form" type="date" name="date" id="date" placeholder="Entrer votre date de naissance" required></h3>
                <h3><input class="form" type="password" name="mdp" id="mdp" placeholder="Entrer votre mot de passe" required></h3>
                <h3><input class="form_sub" type="submit" value="S'inscrire"></h3>
            </form>
            <a href="page_login.php"><input class="form_sub" type="button" value="Se connecter"></a>
        </div>
    </div>
</body>

</html>