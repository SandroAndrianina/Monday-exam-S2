CREATE TABLE f_membre (
  id_membre INT NOT NULL AUTO_INCREMENT,
  nom VARCHAR(14),
  date_de_naissance DATE,
  genre INT,
  gender ENUM('M','F') NOT NULL,
  email VARCHAR(30),
  ville VARCHAR(30),
  mdp VARCHAR(30),
  image_profil VARCHAR(50),
  PRIMARY KEY (id_membre)
);
CREATE TABLE f_categorie_objet (
  id_categorie INT AUTO_INCREMENT PRIMARY KEY,
  nom_categorie VARCHAR(50) NOT NULL
);


CREATE TABLE f_objet (
  id_objet INT AUTO_INCREMENT PRIMARY KEY,
  nom_objet VARCHAR(100) NOT NULL,
  id_categorie INT NOT NULL,
  id_membre INT NOT NULL,
  FOREIGN KEY (id_categorie) REFERENCES f_categorie_objet(id_categorie),
  FOREIGN KEY (id_membre) REFERENCES f_membre(id_membre)
);

CREATE TABLE f_images_objet (
  id_image INT AUTO_INCREMENT PRIMARY KEY,
  id_objet INT NOT NULL,
  nom_image VARCHAR(100) NOT NULL,
  FOREIGN KEY (id_objet) REFERENCES f_objet(id_objet)
);

CREATE TABLE f_emprunt (
  id_emprunt INT AUTO_INCREMENT PRIMARY KEY,
  id_objet INT NOT NULL,
  id_membre INT NOT NULL,
  date_emprunt DATE NOT NULL,
  date_retour DATE,
  FOREIGN KEY (id_objet) REFERENCES f_objet(id_objet),
  FOREIGN KEY (id_membre) REFERENCES f_membre(id_membre)
);
