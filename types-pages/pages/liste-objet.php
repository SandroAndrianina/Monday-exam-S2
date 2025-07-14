<?php
session_start();
require('../../include/functions.php');
$id_membre = $_SESSION['idM_connected'];

$listObjet = getListeObjet();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des objets</title>
    <link href="../../assets/css/bootstrap-5.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/list-objet.css" rel="stylesheet">
    
</head>
<body>
<div class="d-flex justify-content-center gap-3 mb-4">
        <a href="filtre.php" class="btn btn-outline-primary rounded-pill px-4 fw-bold shadow-sm">Voir les objets filtrés</a>
        <a href="ajouteObjet.php" class="btn btn-outline-dark rounded-pill px-4 fw-bold shadow-sm">Ajoute le nouveau objet</a>
    </div><div class="container table-container">
    <h1>Mes objets</h1>
    <table class="table bauhaus-table">
        <thead>
            <tr>
                <th>Nom de l'objet</th>
                <th>Date de retour</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listObjet as $objet): ?>
                <tr>
                    <td><?= htmlspecialchars($objet['nom_objet']) ?></td>
                    <td>
                        <?= $objet['date_retour'] ? htmlspecialchars($objet['date_retour']) : "-------" ?>
                    </td>
                    <td>
                        <a href="#" class="btn btn-dark btn-sm rounded-pill px-3">Voir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>

</html>
