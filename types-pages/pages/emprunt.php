<?php
$id_objet = $_GET['ref'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../treatments/treatment-emprunt.php" method="get">
        <h2>Nombre de jour d'emprunt:</h2>
    <input type="number" name="nbDay">
    <input type="hidden" name="id_objet" value=<?php echo $id_objet ; ?>>
    <input type="submit" value="valider">
    </form>
</body>
</html>
