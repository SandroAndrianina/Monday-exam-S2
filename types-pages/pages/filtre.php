<?php
require('../../include/functions.php');
$listFiltre = getObjByCat();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Objets par catégorie</title>
    <link href="../../assets/css/bootstrap-5.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/filtre.css" rel="stylesheet">
</head>
<body>
    <a href="liste-objet.php">Liste principale</a>
<div class="container table-container">
    <h1>Objets par catégorie</h1>
    <table class="table bauhaus-table">
        <thead>
            <tr>
                <?php foreach ($listFiltre as $cat => $objs): ?>
                    <th><?= htmlspecialchars($cat) ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php
            // Trouver le nombre max d'objets dans une catégorie
            $max = 0;
            foreach ($listFiltre as $objs) {
                if (count($objs) > $max) $max = count($objs);
            }
            // Afficher chaque ligne d'objets par catégorie
            for ($i = 0; $i < $max; $i++): ?>
                <tr>
                    <?php foreach ($listFiltre as $objs): ?>
                        <td>
                            <?= isset($objs[$i]) ? htmlspecialchars($objs[$i]) : "" ?>
                        </td>
                    <?php endforeach; ?>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
</div>
</body>
</html>