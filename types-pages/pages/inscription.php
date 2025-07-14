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
    <h1>Inscription</h1>
        <div class="formulaire">
        <p>Inscrivez vous</p>
        <hr>
        <form action="../traitement/traitement_inscription.php" method="post">
            <p>Entre votre Email<input type="text" name="email"></p>
            <p>Créer un mot de passe<input type="password" name="motdepasse"></p>
            <p>Entrez votre nom<input type="text" name="nom"></p>
            <p>Entrez votre date de naissance<input type="date" name="ddn"></p>
            <input type="submit" value="S'inscrire" class="bt_connect">
        </form>
        <p class="retour"><a href="../index.php">Retour</a></p>
        </div>
    </div>
</body>
</html>