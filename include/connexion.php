<?php 

    function dbconnect() {
        static $connect = null;

        if( $connect === null ) { 
            $connect = mysqli_connect('localhost', 'root','','projet_final_s2');;//mysqli_connect('localhost', 'ETU004110','dkr44NRK','db_s2_ETU004110');

            if(!$connect) {
                die('Erreur de connexion à la base de données : ' . mysqli_connect_error());
            }

            mysqli_set_charset($connect,'utf8mb4');
        }
        return $connect;
    }
?>