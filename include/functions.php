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
function getListeObjet() {
    $connexion = dbconnect();
    $sql = "SELECT o.id_objet, o.nom_objet, e.date_retour
            FROM f_objet o
            LEFT JOIN f_emprunt e ON o.id_objet = e.id_objet";
    $result = mysqli_query($connexion, $sql);

    $objets = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $objets[] = [
            'id_objet' => $row['id_objet'],
            'nom_objet' => $row['nom_objet'],
            'date_retour' => $row['date_retour']
        ];
    }
    mysqli_free_result($result);
    return $objets;
}

//FILTRE
function getObjByCat() {
    $connexion = dbconnect();
    $sql = "
        SELECT c.nom_categorie, o.nom_objet
        FROM f_objet o
        JOIN f_categorie_objet c ON o.id_categorie = c.id_categorie
        ORDER BY c.nom_categorie, o.nom_objet
    ";
    $res = mysqli_query($connexion, $sql);
    if (!$res) {
        die('Erreur de requête : ' . mysqli_error($connexion));
    }

    $data = [];
    while ($row = mysqli_fetch_assoc($res)) {
        $cat = $row['nom_categorie'];
        $obj = $row['nom_objet'];
        if (!isset($data[$cat])) {
            $data[$cat] = [];
        }
        $data[$cat][] = $obj;
    }
    mysqli_free_result($res);

    return $data;
}

function getCat() {
    $connexion = dbconnect();
    $sql = "SELECT id_categorie, nom_categorie
            FROM f_categorie_objet";
    $res = mysqli_query($connexion, $sql);
    if (!$res) {
        die('Erreur de requête : ' . mysqli_error($connexion));
    }

    $cats = [];
    while ($row = mysqli_fetch_assoc($res)) {
        $cats[] = [
            'id_categorie'   => $row['id_categorie'],
            'nom_categorie'  => $row['nom_categorie']
        ];
    }
    mysqli_free_result($res);

    return $cats;
}

//upload
function getLastIdObj() {
    $connexion = dbconnect();
    $sql = "SELECT MAX(id_objet) AS last_id FROM f_objet";
    $res = mysqli_query($connexion, $sql);
    if (!$res) {
        die('Erreur de requête : ' . mysqli_error($connexion));
    }
    $row = mysqli_fetch_assoc($res);
    mysqli_free_result($res);
    return isset($row['last_id']) ? (int)$row['last_id'] : null;
}

function insertImgObj($id_objet, $nom_image) {
    $connexion = dbconnect();
    $sql = "INSERT INTO f_images_objet (id_objet, nom_image) 
            VALUES (%d, '%s')";
    $sql = sprintf(
        $sql,
        $id_objet,
        mysqli_real_escape_string($connexion, $nom_image)
    );
    return mysqli_query($connexion, $sql);
}

function uploadeImg($file) {

                $uploadDir = '../../assets/images/';

                if (!is_dir($uploadDir)) {
                    die("Dossier d'upload introuvable : $uploadDir");
                }

                if (!is_writable($uploadDir)) {
                    die("Le dossier '$uploadDir' n'a pas les permissions d'écriture.");
                }
                

                $maxSize = 20 * 1024 * 1024; // 2 Mo
                $allowedMimeTypes = ['image/jpeg', 'image/png'];

                if ($file['error'] !== UPLOAD_ERR_OK) 
                    {
                    die('Erreur lors de l’upload : ' . $file['error']);
                    }

        // Vérifie la taille
                if ($file['size'] > $maxSize)
                {
                die('Le fichier est trop volumineux.');
                }
                //MIME (Multipurpose Internet Mail Extensions)
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $mime = finfo_file($finfo, $file['tmp_name']);
                finfo_close($finfo);

                if (!in_array($mime, $allowedMimeTypes))
                {
                    die('Type de fichier non autorisé : ' . $mime);  
                }

                $originalName = pathinfo($file['name'], PATHINFO_FILENAME);
                $extension = pathinfo($file['name'], PATHINFO_EXTENSION);

                $newName = $originalName . '_' . uniqid() . '.' . $extension;

        // Déplace le fichier
                if (move_uploaded_file($file['tmp_name'], $uploadDir . $newName)) 
                { return $newName ; } 
                else
                {echo "Échec du déplacement du fichier.";}

                return $newName;
}

function generalUpload($nom_image, $photo)
{
    $id_objet = getLastIdObj();
    $nom_image = uploadeImg($photo);
    insertImgObj($id_objet, $nom_image);
}

function insertObj($nom_objet, $id_categorie, $id_membre) {
    $connexion = dbconnect();
    $sql = "INSERT INTO f_objet (nom_objet, id_categorie, id_membre) 
            VALUES ('%s', %d, %d)";
    $sql = sprintf(
        $sql,
        mysqli_real_escape_string($connexion, $nom_objet),
        $id_categorie,
        $id_membre
    );
    return mysqli_query($connexion, $sql);
}

function dateDeRetour($dureEmprunt) {
    return date('Y-m-d', strtotime("+{$dureEmprunt} days"));
}

function insertUmprunt($id_objet, $id_membre, $dureEmprunt) {
    $connexion     = dbconnect();
    $date_emprunt  = date('Y-m-d');
    $date_retour   = dateDeRetour($dureEmprunt);

    $sql = "
        INSERT INTO f_emprunt (id_objet, id_membre, date_emprunt, date_retour)
        VALUES (%d, %d, '%s', '%s')
    ";
    $sql = sprintf(
        $sql,
        $id_objet,
        $id_membre,
        mysqli_real_escape_string($connexion, $date_emprunt),
        mysqli_real_escape_string($connexion, $date_retour)
    );

    return mysqli_query($connexion, $sql);
}




?>