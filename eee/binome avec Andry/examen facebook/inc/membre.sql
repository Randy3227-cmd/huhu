CREATE TABLE membres (
    ID_Membre INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(100),
    Nom VARCHAR(100),
    Mot_de_passe VARCHAR(100),
    Date_naissance DATE
);

CREATE TABLE publications (
    ID_Pub INT PRIMARY KEY AUTO_INCREMENT,
    Date_pub DATETIME,
    Contenu TEXT,
    ID_Membre INT
   
);

CREATE TABLE commentaire (
    ID_Commentaire INT PRIMARY KEY AUTO_INCREMENT,
    ID_Pub INT,
    Date_coms DATETIME,
    TexteComs TEXT,
    ID_Membre INT
);

CREATE TABLE amis (
    ID_Membre1 INT,
    ID_Membre2 INT,
    DateHeureDemande DATETIME,
    DateHeureAcceptation DATETIME
);

CREATE TABLE bloquer(
    ID_Membre1 INT ,
    ID_Membre2 INT
);

CREATE TABLE conversation (
    id_Conversation INT PRIMARY KEY AUTO_INCREMENT,
    date_creation DATETIME,
    id_participant1 INT,
    id_participant2 INT
);

CREATE TABLE message (
    id_message INT AUTO_INCREMENT PRIMARY KEY,
    id_Conversation INT,
    id_auteur INT,
    contenu_message TEXT,
    date_envoi DATETIME,
    FOREIGN KEY (id_Conversation) REFERENCES conversation(id_Conversation)
);

CREATE TABLE images (
    id_image INT AUTO_INCREMENT PRIMARY KEY,
    ID_Membre INT,
    nomImage VARCHAR(100),
    FOREIGN KEY (ID_Membre) REFERENCES membres(ID_Membre)

);

ALTER TABLE membres ADD pdp VARCHAR(100);
ALTER TABLE publications ADD img VARCHAR(100);