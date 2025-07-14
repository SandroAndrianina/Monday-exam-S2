<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../assets/css/loginsc.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <div class="formulaire">
            <?php if(isset($_GET['est_inscrit'])) { ?>
                <p>Maintenant que vous etes inscrit : </p>
            <?php } ?>
            <p>Veuillez vous connecter</p>
            <hr>
            <div class="formulaire">
                <form action="../treatments/treatment-login.php" method="post">
                    <p>Entrez votre Email <input type="text" name="email"></p>
                    <p>Entrez votre mot de passe<input type="password" name="motDePasse"> </p>
                    <input type="submit" value="Se connecter" class="bt_connect">
                </form>
                <p class="retour"><a href="../index.php">Retour</a></p>
            </div>
            <?php if(isset($_GET['erreur'])) { ?>
                    <p style="color: red;">Mot de passe ou email incorrect. Veuillez retaper</p>
                    <P>Si vous n'avez pas de compte, <a href="inscription.php">veuillez vous inscrire</a></P>
            <?php } ?>
        </div>
    </div>
</body>
</html>