-- Sélectionner le schéma
USE maison_a_louer; -- Remplacez 'your_schema_name' par le nom de votre schéma

-- Création de la table des propriétaires
CREATE TABLE IF NOT EXISTS Proprietaires (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    telephone VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL
);

-- Création de la table des appartements
CREATE TABLE IF NOT EXISTS Appartements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    adresse VARCHAR(255) NOT NULL,
    details TEXT NOT NULL,
    prix DECIMAL(10, 2) NOT NULL,
    image VARCHAR(255),
    proprietaire_id INT,
    FOREIGN KEY (proprietaire_id) REFERENCES Proprietaires(id)
);