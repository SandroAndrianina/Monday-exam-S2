<?php
require('connexion.php');
//LOGIN
    function verify_login($email, $motdepasse) {
        $sql_verify = "SELECT email ,mdp
                        FROM f_membre 
                        WHERE email ='%s' AND 
                        mdp ='%s';";
        $sql_verify = sprintf($sql_verify, $email, $motdepasse);
        $resultat_verify = mysqli_query(dbconnect(), $sql_verify);
        $resultat_verify_assoc = mysqli_fetch_assoc($resultat_verify);
        $number_found = mysqli_num_rows($resultat_verify);
        mysqli_free_result($resultat_verify);
        return $number_found;
    }

    function get_idM_connected($email, $motdepasse) {
        $sql_idMembre = "SELECT idMembre FROM membres WHERE Email ='%s' AND Motdepasse ='%s'";
        $sql_idMembre = sprintf($sql_idMembre, $email, $motdepasse);
        $resultat_id = mysqli_query(dbconnect(), $sql_idMembre);
        $donnees = mysqli_fetch_assoc($resultat_id);
        $ID = $donnees['idMembre'];
        mysqli_free_result($resultat_id);
        return $ID;
    }

//INSCRIPTION
    function insert_inscription($email, $motdepasse, $nom, $ddn) {
        $sql = "INSERT INTO membres(Email, Motdepasse, Nom, DateNaissance) VALUES ('%s', '%s', '%s', '%s')";
        $sql = sprintf($sql, $email, $motdepasse, $nom, $ddn);
        $inserted = mysqli_query(dbconnect(), $sql);
    }
?>