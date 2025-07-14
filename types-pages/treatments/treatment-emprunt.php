<?php
session_start();
$nbDay = $_GET['nbDay'];
echo $nbDay;
$id_objet = $_GET['id_objet'];
echo $id_objet;
$id_membre = $_SESSION['idM_connected'];

insertUmprunt($id_objet, $id_membre, $dureEmprunt)

?>