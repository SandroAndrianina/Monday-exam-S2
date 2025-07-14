<?php
require('../../include/functions.php');
session_start();
if (
    isset($_POST['nom']) &&
    isset($_POST['date_de_naissance']) &&
    isset($_POST['gender']) &&
    isset($_POST['email']) &&
    isset($_POST['ville']) &&
    isset($_POST['mdp'])
) {
    $nom = $_POST['nom'];
    $date_de_naissance = $_POST['date_de_naissance'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $ville = $_POST['ville'];
    $mdp = $_POST['mdp'];
    $image_profil = null;

    if (isset($_FILES['image_profil']) && $_FILES['image_profil']['error'] == UPLOAD_ERR_OK) {
        $image_profil = basename($_FILES['image_profil']['name']);
        move_uploaded_file($_FILES['image_profil']['tmp_name'], '../../uploads/' . $image_profil);
    }

    insert_inscription($nom, $date_de_naissance, $gender, $email, $ville, $mdp, $image_profil);

    session_start();
    $_SESSION['idM_connected'] = get_idM_connected($email, $mdp);


    header("Location:../pages/liste-objet.php");
    
} else {
    header("Location:../pages/inscription.php?erreur=1");
}

?>