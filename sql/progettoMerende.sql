--La descrizione della classe è il nome della classe per gli studenti (compreso il capoclasse) e bar per gli addetti al bar;
--il tipo su utente è "studente", "capoclasse", "gestore;
--il voto della recensione va da 1 a 5;

Create table classe(
    descrizione varchar(20) primary key
);

CREATE TABLE utenti(
    cf varchar(16) PRIMARY KEY,
    nome varchar(20),
    cognome varchar(20),
    utente varchar(20),
    password varchar(20),
    tipo ENUM ("alunno","capoclasse","gestore"),
    fk_descrizione varchar(20),
    FOREIGN KEY (fk_descrizione) REFERENCES classe(descrizione) on DELETE CASCADE on update CASCADE
    );

CREATE TABLE prenotazione(
    id_pre int AUTO_INCREMENT PRIMARY KEY,
    ricreazione varchar(20),
    data_pre date,
    fk_cf varchar(16),
    FOREIGN KEY (fk_cf) REFERENCES utenti(cf) on DELETE CASCADE on update CASCADE
    );
CREATE TABLE prodotto(
    id_prod int AUTO_INCREMENT PRIMARY KEY,
    prezzo double,
    nome varchar(20),
    calorie int,
    grassi double,
    zuccheri double,
    proteine double
    );
CREATE TABLE recensione(
    id_rec int AUTO_INCREMENT PRIMARY KEY,
    voto int,
    descrizione varchar(100),
    fk_cf varchar(16),
    fk_id_prod int,
    FOREIGN KEY (fk_cf) REFERENCES utenti(cf) on DELETE CASCADE on update CASCADE,
    FOREIGN KEY (fk_id_prod) REFERENCES prodotto(id_prod) on DELETE CASCADE on update CASCADE
    );

CREATE TABLE allergene(
    id_al int AUTO_INCREMENT PRIMARY KEY,
    nome varchar(20)
    )

CREATE TABLE promozione(
    id_pro int AUTO_INCREMENT PRIMARY KEY,
    descrizione varchar(30)
    )

CREATE TABLE prenotazione_prodotto(
    id_pp int AUTO_INCREMENT PRIMARY KEY,
    quantita int,
    fk_id_pre int,
    fk_id_prod int,
    FOREIGN KEY (fk_id_pre) REFERENCES prenotazione (id_pre)on DELETE CASCADE on update CASCADE,
    FOREIGN KEY (fk_id_prod) REFERENCES prodotto(id_prod) on DELETE CASCADE on update CASCADE
   );
    
CREATE TABLE allergene_prodotto(
    id_ap int AUTO_INCREMENT PRIMARY KEY,
    fk_id_al int,
    FOREIGN KEY (fk_id_al) REFERENCES allergene(id_al) on DELETE CASCADE on update CASCADE,
    fk_id_prod int,
    FOREIGN KEY (fk_id_prod) REFERENCES prodotto(id_prod) on DELETE CASCADE on update CASCADE
   );
    
CREATE TABLE promozione_prodotto(
    id_sc int AUTO_INCREMENT PRIMARY KEY,
    inzio date,
    fine date,
    sconto int,
    fk_id_pro int,
    FOREIGN KEY (fk_id_pro) REFERENCES promozione(id_pro) on DELETE CASCADE on update CASCADE,
    fk_id_prod int,
    FOREIGN KEY (fk_id_prod) REFERENCES prodotto(id_prod) on DELETE CASCADE on update CASCADE
   );
    


