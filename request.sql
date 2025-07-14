CREATE database proet_final_S2;
USE proet_final_S2;
CREATE TABLE f_membre (
  id_membre INT NOT NULL AUTO_INCREMENT,
  nom VARCHAR(14),
  date_de_naissance DATE,
  genre ENUM('M','F') NOT NULL,
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

INSERT INTO f_membre (nom, date_de_naissance, genre, email, ville, mdp, image_profil) VALUES
('Alice',  '1990-01-01','F', 'alice@example.com', 'Antananarivo', 'pass1', 'alice.jpg'),
('Bob',    '1988-05-10','M', 'bob@example.com',   'Toamasina',    'pass2', 'bob.jpg'),
('Clara',  '1992-09-15','F', 'clara@example.com', 'Fianarantsoa', 'pass3', 'clara.jpg'),
('David',  '1985-12-20','M', 'david@example.com', 'Mahajanga',    'pass4', 'david.jpg');

INSERT INTO f_categorie_objet (nom_categorie) VALUES
('esthétique'), ('bricolage'), ('mécanique'), ('cuisine');

INSERT INTO f_objet (nom_objet, id_categorie, id_membre) VALUES
('Parfum', 1, 1), ('Tournevis', 2, 1), ('Clé anglaise', 3, 1), ('Mixer', 4, 1), ('Crème', 1, 1),
('Marteau', 2, 1), ('Bouilloire', 4, 1), ('Rasoir', 1, 1), ('Perceuse', 2, 1), ('Balance', 4, 1),

('Shampoing', 1, 2), ('Scie', 2, 2), ('Pompe', 3, 2), ('Four', 4, 2), ('Gel', 1, 2),
('Tournevis', 2, 2), ('Grille-pain', 4, 2), ('Tondeuse', 1, 2), ('Visseuse', 2, 2), ('Poêle', 4, 2),

('Rouge à lèvres', 1, 3), ('Ciseau', 2, 3), ('Batterie', 3, 3), ('Blender', 4, 3), ('Fond de teint', 1, 3),
('Perforateur', 2, 3), ('Casserole', 4, 3), ('Brosse', 1, 3), ('Lime', 2, 3), ('Cocotte', 4, 3),

('Lotion', 1, 4), ('Pince', 2, 4), ('Courroie', 3, 4), ('Micro-onde', 4, 4), ('Savon', 1, 4),
('Clé dynamométrique', 3, 4), ('Friteuse', 4, 4), ('Crème solaire', 1, 4), ('Clé plate', 3, 4), ('Mixeur', 4, 4);

INSERT INTO f_emprunt (id_objet, id_membre, date_emprunt, date_retour) VALUES
(1, 2, '2025-07-01', '2025-07-10'),
(5, 3, '2025-07-02', '2025-07-12'),
(11, 1, '2025-07-03', '2025-07-08'),
(17, 4, '2025-07-04', '2025-07-15'),
(21, 2, '2025-07-05', '2025-07-14'),
(27, 1, '2025-07-06', '2025-07-16'),
(33, 3, '2025-07-07', '2025-07-13'),
(35, 2, '2025-07-08', '2025-07-18'),
(38, 1, '2025-07-09', '2025-07-17'),
(40, 3, '2025-07-10', '2025-07-20');

--vérification du login:
SELECT COUNT(*) AS nb FROM f_membre WHERE email ='%s' AND mdp ='%s';

--id membre:
SELECT id_membre
FROM f_membre 
WHERE email ='alice@example.com' AND mdp ='pass1';

--prendre la lsite des object:
--temporary
SELECT o.nom_objet
FROM f_objet o JOIN f_membre m
ON o.id_membre  = m.id_membre
WHERE m.id_membre = 1;


--final
SELECT o.nom_objet, e.date_retour
FROM f_objet o JOIN f_membre m
ON o.id_membre  = m.id_membre
JOIN f_emprunt e
ON e.id_objet = o.id_objet AND e.id_membre = m.id_membre
WHERE m.id_membre = 1;
