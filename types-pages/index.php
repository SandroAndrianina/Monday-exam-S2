<?php
require('../include/functions.php');
$departements = getAllDepartements();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des départements</title>
    <link href="../assets/css/bootstrap-5.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container py-5">
        <header class="mb-5 text-center">
            <h1 class="display-4 fw-bold text-primary">Liste des départements</h1>
            <hr class="w-25 mx-auto my-4 border-2">
        </header>

        <div class="research">
           <a href="pages/research.php">Aller vers page de recherche</a>
        </div>

        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white py-3">
                <h2 class="h5 mb-0">Départements disponibles</h2>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="py-3">ID</th>
                                <th class="py-3">Nom du département</th>
                                <th class="py-3">Nom du manager</th>
                                <th class="py-3">Nombre d'employer </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($departements as $departement): ?>
                                <tr>
                                    <td>
                                        <a class="btn btn-sm btn-outline-primary fw-bold" 
                                           href="pages/list-employees.php?ref=<?= htmlspecialchars($departement['dept_no']) ?>">
                                            <?= htmlspecialchars($departement['dept_no']) ?>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="text-decoration-none link-dark d-block" 
                                           href="pages/list-employees.php?ref=<?= htmlspecialchars($departement['dept_no']) ?>">
                                            <i class="fas fa-building me-2 text-secondary"></i>
                                            <?= htmlspecialchars($departement['dept_name']) ?>
                                        </a>
                                    </td>
                                    <td>
                                        <?= htmlspecialchars(getManagerName($departement['dept_no'])) ?>
                                    </td>
                                    <td>
                                        <?php
                                        $nbEmployees = getNbEmployeesByDept($departement['dept_no']);
                                        echo htmlspecialchars($nbEmployees);
                                        ?>
                                    </td>
                                    <td>
                                        <a class="text-decoration-none link-dark d-block btn btn-info btn-sm" 
                                           href="pages/salaire-nb-employer.php?ref=<?= htmlspecialchars($departement['dept_no']) ?>">
                                            salary
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-light py-3 text-muted text-end small">
                Total : <?= count($departements) ?> départements
            </div>
        </div>
    </div>

    
</body>
</html>