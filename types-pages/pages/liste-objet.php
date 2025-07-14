<?php
session_start();
require('../../include/functions.php');
$id_membre = $_SESSION['idM_connected'];

$listObjet = getListeObjet($id_membre);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des objets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h1 class="mb-4">Mes objets</h1>
    <table class="table table-bordered w-50 mx-auto">
        <thead class="table-light">
            <tr>
                <th>Nom de l'objet</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listObjet as $nom): ?>
                <tr>
                    <td><?= htmlspecialchars($nom) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
