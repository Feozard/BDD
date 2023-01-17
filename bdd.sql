CREATE TABLE client (
    id_client VARCHAR(50) PRIMARY KEY,
    nom_client VARCHAR(50) NOT NULL,
    prenom_client VARCHAR(50) NOT NULL,
    fb VARCHAR(50),
    insta VARCHAR(50),
    mail VARCHAR(50) NOT NULL,
    membership VARCHAR(50) NOT NULL,
    reduction_client FLOAT
);

CREATE TABLE adresse (
    id_adresse INT PRIMARY KEY,
    id_client VARCHAR(50) NOT NULL,
    num_voie INT NOT NULL,
    voie VARCHAR(50) NOT NULL,
    ville VARCHAR(50) NOT NULL,
    code_postal INT NOT NULL,
    pays VARCHAR(50) NOT NULL,
    type_adresse VARCHAR(50) NOT NULL CHECK (type_adresse IN ('livraison', 'facturation')),
    FOREIGN KEY (id_client) REFERENCES client(id_client)
);

CREATE TABLE points (
    id_points INT PRIMARY KEY,
    id_client VARCHAR(50) NOT NULL,
    nb_points INT NOT NULL,
    date_obtention DATE NOT NULL,
    date_expiration DATE NOT NULL,
    FOREIGN KEY (id_client) REFERENCES client(id_client)
);

CREATE TABLE depense_points (
    nb_points_depense INT NOT NULL,
    id_client VARCHAR(50) NOT NULL,
    date_utilisation DATE NOT NULL,
    mode_utilisation INT NOT NULL,
    FOREIGN KEY (id_client) REFERENCES client(id_client)
);

CREATE TABLE mode_utilisation (
    id_mode_utilisation INT PRIMARY KEY,
    nom_mode_utilisation VARCHAR(50) NOT NULL
);

CREATE TABLE telephone (
    id_telephone INT PRIMARY KEY,
    id_client VARCHAR(50) NOT NULL,
    num_telephone INT NOT NULL,
    code_region INT NOT NULL,
    FOREIGN KEY (id_client) REFERENCES client(id_client)
);

CREATE TABLE commande (
    id_commande VARCHAR(50) PRIMARY KEY,
    id_client VARCHAR(50) NOT NULL,
    prix_commande FLOAT,
    fdp_commande FLOAT,
    statut_commande VARCHAR(50),
    date_commande DATE,
    note TEXT,
    alerte BOOLEAN,
    FOREIGN KEY (id_client) REFERENCES client(id_client)
);

CREATE TABLE produit (
    id_produit INT PRIMARY KEY,
    nom_produit VARCHAR(50) NOT NULL,
    prix_produit FLOAT NOT NULL,
    reduction_produit FLOAT
);

CREATE TABLE commande_produit (
    id_commande VARCHAR(50),
    id_produit INT,
    quantite INT NOT NULL,
    statut_produit VARCHAR(50),
    FOREIGN KEY (id_commande) REFERENCES commande(id_commande),
    FOREIGN KEY (id_produit) REFERENCES produit(id_produit)
);

CREATE TABLE colis (
    num_colis VARCHAR(50) PRIMARY KEY,
    status_colis VARCHAR(50),
    date_expedition DATE,
    date_reception DATE
);

CREATE TABLE commande_colis (
    id_commande VARCHAR(50),
    id_produit INT,
    num_colis VARCHAR(50),
    quantite_produit INT,
    FOREIGN KEY (id_commande) REFERENCES commande(id_commande),
    FOREIGN KEY (id_produit) REFERENCES produit(id_produit),
    FOREIGN KEY (num_colis) REFERENCES colis(num_colis)
);

CREATE TABLE paiement (
    id_paiement INT PRIMARY KEY,
    id_commande VARCHAR(50) NOT NULL,
    montant_paiement FLOAT NOT NULL,
    date_paiement DATE NOT NULL,
    mode_paiement INT NOT NULL,
    FOREIGN KEY (id_commande) REFERENCES commande(id_commande)
);

CREATE TABLE mode_paiement (
    id_mode_paiement INT PRIMARY KEY,
    nom_mode_paiement VARCHAR(50) NOT NULL
);