<?php
require('../../include/functions.php');
session_start();

if (isset($_POST['nom_objet']) && isset($_POST['id_categorie'])) {
    $nom_objet = $_POST['nom_objet'];
    $id_categorie = $_POST['id_categorie'];
    $id_membre = getgetListeObjet();

    insert_objet($nom_objet, $id_categorie);

    header("Location: ../pages/liste-objet.php");
} else {
    header("Location: ../pages/ajouteObjet.php?erreur=1");
}

?>