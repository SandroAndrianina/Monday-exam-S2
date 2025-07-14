<?php
require('connexion.php');
//LOGIN
  function verify_login($email, $motdepasse) {
    $sql_verify = "SELECT COUNT(*) AS nb FROM f_membre WHERE email ='%s' AND mdp ='%s'";
    $sql_verify = sprintf($sql_verify, $email, $motdepasse);
    $resultat_verify = mysqli_query(dbconnect(), $sql_verify);
    $row = mysqli_fetch_assoc($resultat_verify);
    mysqli_free_result($resultat_verify);
    return (int)$row['nb'];
}

    function get_idM_connected($email, $motdepasse) {
        $sql_idMembre = "SELECT id_membre
                        FROM f_membre 
                        WHERE email ='%s' AND mdp ='%s'";
        $sql_idMembre = sprintf($sql_idMembre, $email, $motdepasse);
        $resultat_id = mysqli_query(dbconnect(), $sql_idMembre);
        $donnees = mysqli_fetch_assoc($resultat_id);
        $ID = $donnees['id_membre'];
        mysqli_free_result($resultat_id);
        return $ID;
    }

//INSCRIPTION
function insert_inscription($nom, $date_de_naissance, $gender, $email, $ville, $mdp, $image_profil = null) {
    $connexion = dbconnect();
    $sql = "INSERT INTO f_membre (nom, date_de_naissance, gender, email, ville, mdp, image_profil) 
            VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s')";
    $sql = sprintf($sql, 
        mysqli_real_escape_string($connexion, $nom),
        mysqli_real_escape_string($connexion, $date_de_naissance),
        mysqli_real_escape_string($connexion, $gender),
        mysqli_real_escape_string($connexion, $email),
        mysqli_real_escape_string($connexion, $ville),
        mysqli_real_escape_string($connexion, $mdp),
        mysqli_real_escape_string($connexion, $image_profil)
    );
    return mysqli_query($connexion, $sql);
}

//prendre la liste des objects:

function getListeObjet($id_membre) {
    $connexion = dbconnect();
    $sql = "SELECT o.nom_objet
            FROM f_objet o
            JOIN f_membre m ON o.id_membre = m.id_membre
            WHERE m.id_membre = %d";
    $sql = sprintf($sql, $id_membre);
    $result = mysqli_query($connexion, $sql);

    $objets = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $objets[] = $row['nom_objet'];
    }
    mysqli_free_result($result);
    return $objets;
}

?>