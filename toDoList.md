"Un problème bien posé est à moitié résolu."
"Choose difficulty."
"New man, new day."
# To-Do List
v1:
 OKAY!creation de base:
        membre
        categorie_objet
        objet
        images_objet
        emprunt


 OKAY!inseret le donne de teste:
    4 membre
    4 categorie 
    10 objet par membre
    10 emprunt

creation de page:
    creer login.php
        utiliser les anciens code dans TP réseaux sociaux
        créer login.php
        créer treatment-login.php
        créer une fonction : verify_login($email, $motDePasse)
                             get_idM_connected($email, $motDePasse)
        stylé avec boostrap
        
    creer inscription.php
        utiliser les anciens code dans TP réseaux sociaux
        créer inscription.php
        créer treatment-inscription.php
        créer une fonction : insert_inscription
        stylé avec boostrap

    creer liste_objet.php
        OKAY!creer une session pour stoque l'id_membre
        OKAY!creer une requete pour prendre les objets
        OKAY!creer une fonction getListeObjet()

    filtre par categorie:
        OKAY!créer filtre.php
        créer une requète pour prendre la liste des objets selon leur catégorie
        créer la fonction getObjByCat()
        stylé avec boostrap

faire marcher en local le projet:
    connnexion normal
    création de base en local

faire marcher en deployement le projet:
    connexion ITU LABS
    création de base ITU LABS


    version 2:
         ajoute une nouvele objet par membre:
            creer un page ajouteObjet.php
            ajouter une lien sur liste-objet.php vers ajouteObjet.php
            creer les imput de la table objet et table 
            creer un fonction ajouteObjet() pour ecrire les imput dans la table objet 

            OKAY!!créer un fonction insertObj($nom_objet, $id_categorie, $id_membre)

            créer un fonction qui appelle tout ces fonction : generalUpload($id_objet, $nom_image, $photo)
            créer un fonction upload($photo)
                insertion dans f_image_objet
                    -créer un fonction : insertImgObj($id_objet, $nom_image)
                        -id_objet
                            créer un fonction qui prend le dernier id_objet
                            getLastIdObj()
                        -nom_image
                        
    Aléas: v3
    option 1: 4110
    OKAY!-ajouter un bouton "emprunter" qui mène vers  "emprunt.php" sur chaque objet
    OKAY!-créer un page "emprunt.php"
        ajouter un champ : nombre de jour de l'emprunt
    -créer un page treatment-emprunt.php:
        créer une fonction: insertUmprunt($id_objet, $ id_membre, $date_emprunt, $date_retour)
    -ajouter un colonne dans list-objet: disponible le : echo "$date de retour"
        créer un fonction qui retourne la date de retour:
            getReturnDate($id_objet)
    
    si l'objet est emprunté alors il ne peut plus être emprunté!?
    créer une session pour chaque objet pour indiquer si il est empruntable ou pas
            