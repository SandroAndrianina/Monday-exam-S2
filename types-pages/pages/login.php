<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="../../assets/css/bootstrap-5.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow p-4" style="max-width: 400px; width: 100%;">
            <h1 class="mb-4 text-center">Login</h1>
            <?php if(isset($_GET['est_inscrit'])) { ?>
                <div class="alert alert-success" role="alert">
                    Maintenant que vous êtes inscrit :
                </div>
            <?php } ?>
            <p class="text-center">Veuillez vous connecter</p>
            <hr>
            <form action="../treatments/treatment-login.php" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Entrez votre Email</label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="motDePasse" class="form-label">Entrez votre mot de passe</label>
                    <input type="password" class="form-control" id="motDePasse" name="motDePasse" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Se connecter</button>
            </form>
            <div class="mt-3 text-center">
                <a href="../index.php" class="btn btn-link">Retour</a>
            </div>
            <?php if(isset($_GET['erreur'])) { ?>
                <div class="alert alert-danger mt-3" role="alert">
                    Mot de passe ou email incorrect. Veuillez retaper.<br>
                    Si vous n'avez pas de compte, <a href="inscription.php" class="alert-link">veuillez vous inscrire</a>
                </div>
            <?php } ?>
        </div>
    </div>
    
</body>
</html>