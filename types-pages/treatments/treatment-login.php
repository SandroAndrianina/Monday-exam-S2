<?php 
    require('../../include/functions.php');

    session_start();
    if(isset($_POST['email']) && isset($_POST['motDePasse'])) {
        $email = $_POST['email'];
        $motDePasse = $_POST['motDePasse'];
        $number_found = verify_login($email, $motDePasse);
        
        //  $ID = get_idM_connected($email, $motDePasse);
        //  $_SESSION['idM_connected'] = $ID;

    }

        if($number_found != 0) {
            header("Location:../pages/liste-objet.php");
        }else{
            header("Location:../pages/login.php?erreur=1");
        }

    
?>