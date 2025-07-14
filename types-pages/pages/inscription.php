<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow p-4" style="max-width: 500px; width: 100%;">
            <h1 class="mb-4 text-center">Inscription</h1>
            <form action="../treatments/treatment-inscription.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" maxlength="14" required>
                </div>
                <div class="mb-3">
                    <label for="date_de_naissance" class="form-label">Date de naissance</label>
                    <input type="date" class="form-control" id="date_de_naissance" name="date_de_naissance" required>
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Genre</label>
                    <select class="form-select" id="gender" name="gender" required>
                        <option value="">Sélectionnez...</option>
                        <option value="M">Masculin</option>
                        <option value="F">Féminin</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" maxlength="30" required>
                </div>
                <div class="mb-3">
                    <label for="ville" class="form-label">Ville</label>
                    <input type="text" class="form-control" id="ville" name="ville" maxlength="30" required>
                </div>
                <div class="mb-3">
                    <label for="mdp" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="mdp" name="mdp" maxlength="30" required>
                </div>
               
                <button type="submit" class="btn btn-success w-100">S'inscrire</button>
            </form>
            <div class="mt-3 text-center">
                <a href="../index.php" class="btn btn-link">Retour</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>