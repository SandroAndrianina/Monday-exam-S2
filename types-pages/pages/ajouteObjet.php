<?php

require('../../include/functions.php');
$categories = getCat();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un objet</title>
    <link href="../../assets/css/bootstrap-5.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/ajoutObj.css" rel="stylesheet">

</head>
<body>
    <div class="bauhaus-form">
        <h1>Ajouter un objet</h1>
        <form action="../treatments/traitement_ajout_objet.php" method="get">

                    <div class="mb-3">
                        <label for="nom_objet" class="form-label">Nom de l'objet :</label>
                        <input type="text" class="form-control" id="nom_objet" name="nom_objet" required>
                    </div>
                    <div class="mb-3">
                        <label for="id_categorie" class="form-label">Catégorie :</label>
                        <select class="form-select" id="id_categorie" name="id_categorie" required>
                            <?php foreach($categories as $cat): ?>
                                <option value="<?= $cat['id_categorie'] ?>"><?= htmlspecialchars($cat['nom_categorie']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="publier"><label for="fichier">Add video</label></div>
                    <input type="file" name="fichier" id="fichier" required>

                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-primary">Ajouter l'objet</button>
                    </div>

        </form>
    </body>
</html>
