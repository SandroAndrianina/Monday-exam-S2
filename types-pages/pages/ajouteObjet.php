<?php
$conn = new mysqli("localhost", "root", "", "proet_final_S2");
if ($conn->connect_error) {
    die("Erreur de connexion: " . $conn->connect_error);
}


$categories = $conn->query("SELECT id_categorie, nom_categorie FROM f_categorie_objet");


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un objet</title>
</head>
<body>

<form action="traitement_ajout_objet.php" method="post">
    <label for="nom_objet">Nom de l'objet :</label>
    <input type="text" id="nom_objet" name="nom_objet" required><br><br>

    <label for="id_categorie">Catégorie :</label>
    <select id="id_categorie" name="id_categorie" required>
        <?php while($cat = $categories->fetch_assoc()): ?>
            <option value="<?= $cat['id_categorie'] ?>"><?= htmlspecialchars($cat['nom_categorie']) ?></option>
        <?php endwhile; ?>
    </select><br><br>

    <input type="submit" value="Ajouter l'objet">
</form>
</body>
</html>