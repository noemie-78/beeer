DROP DATABASE IF EXISTS BeerAdvisor;
CREATE DATABASE IF NOT EXISTS BeerAdvisor;

DROP TABLE IF EXISTS Categorie;
CREATE TABLE IF NOT EXISTS Categorie
(
    idCategorie INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT, 
    nomCategorie VARCHAR(255),
    descriptionCategorie VARCHAR(255)
);

DROP TABLE IF EXISTS TypeBiere;
CREATE TABLE IF NOT EXISTS TypeBiere 
(
    idType INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nomType VARCHAR(255),
    descriptionType VARCHAR(255)
);

DROP TABLE IF EXISTS Pays;
CREATE TABLE IF NOT EXISTS Pays
(
    idPays INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nomPays VARCHAR(255)
);

DROP TABLE IF EXISTS Utilisateur;
CREATE TABLE IF NOT EXISTS Utilisateur
(
    idUtilisateur INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nomUtilisateur VARCHAR(100),
    prenomUtilisateur VARCHAR(100),
    pseudo VARCHAR(100),
    email VARCHAR(255),
    motDePasse TEXT,
    dateNaissance DATE,
    dateInscription DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    imageUtilisateur LONGBLOB, 
    administrateur TINYINT(1) NOT NULL,
	idPays INT(11),
	FOREIGN KEY (idPays) REFERENCES Pays(idPays)
);

DROP TABLE IF EXISTS Abonnement;
CREATE TABLE IF NOT EXISTS Abonnement
(
    idAbonnement INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    idUtilisateur INT(11) NOT NULL, 
    idUtilisateurSuivi INT(11) NOT NULL, 
    FOREIGN KEY (idUtilisateur) REFERENCES Utilisateur(idUtilisateur),
    FOREIGN KEY (idUtilisateurSuivi) REFERENCES Utilisateur(idUtilisateur) 
);

DROP TABLE IF EXISTS Cereale;
CREATE TABLE IF NOT EXISTS Cereale 
(
    idCereale INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nomCereale VARCHAR(255),
    typeCereale VARCHAR(255),
	descriptionCereale VARCHAR(255)
);

DROP TABLE IF EXISTS Houblon;
CREATE TABLE IF NOT EXISTS Houblon 
(
    idHoublon INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nomHoublon VARCHAR(255),
    typeHoublon VARCHAR(255),
	descriptionHoublon VARCHAR(255)
);

DROP TABLE IF EXISTS Levure;
CREATE TABLE IF NOT EXISTS Levure 
(
    idLevure INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nomLevure VARCHAR(255),
    typeLevure VARCHAR(255),
	descriptionLevure VARCHAR(255)
);

DROP TABLE IF EXISTS Biere;
CREATE TABLE IF NOT EXISTS Biere 
(
    idBiere INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    idCategorie INT(11) NOT NULL,
    idType INT(11) NOT NULL,
    nomBiere VARCHAR(255),
    descriptionBiere VARCHAR(255),
    imageBiere BLOB,
    idPays INT(11),
    idCereale INT(11),
    idHoublon INT(11),
	idLevure INT(11),
    processusBrassage VARCHAR(255),
    amertume INT(11),
    limpidite INT(11),
    calorie INT(11),
    glucide INT(11),
    carateristiqueBiere VARCHAR(255),
    FOREIGN KEY (idCategorie) REFERENCES Categorie(idCategorie),
    FOREIGN KEY (idType) REFERENCES TypeBiere(idType),
    FOREIGN KEY (idPays) REFERENCES Pays(idPays),
	FOREIGN KEY (idCereale) REFERENCES Cereale(idCereale),
    FOREIGN KEY (idHoublon) REFERENCES Houblon(idHoublon),
	FOREIGN KEY (idLevure) REFERENCES Levure(idLevure)
	
);

DROP TABLE IF EXISTS Commentaire;
CREATE TABLE IF NOT EXISTS Commentaire
(
    idCommentaire INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    commentaire TEXT,
    dateCommentaire DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    imageCommentaire LONGBLOB
);

DROP TABLE IF EXISTS Note;
CREATE TABLE IF NOT EXISTS Note
(
    idNote INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    note INT(5)NOT NULL,
    dateNote DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    idBiere INT(11) NOT NULL,
	idUtilisateur INT(11) NOT NULL,
    idCommentaire INT(11)NOT NULL,
    FOREIGN KEY (idBiere) REFERENCES Biere(idBiere),
    FOREIGN KEY (idUtilisateur) REFERENCES Utilisateur(idUtilisateur),
    FOREIGN KEY (idCommentaire) REFERENCES Commentaire(idCommentaire)
);






