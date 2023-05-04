Create table classe(
    descrizione varchar(20) primary key
);

CREATE TABLE utente(
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
    id_prenotazione int AUTO_INCREMENT PRIMARY KEY,
    ricreazione varchar(20),
    data_prenotazione date,
    fk_cf varchar(16),
    FOREIGN KEY (fk_cf) REFERENCES utente(cf) on DELETE CASCADE on update CASCADE
    );
    
CREATE TABLE prodotto(
    id_prodotto int AUTO_INCREMENT PRIMARY KEY,
    prezzo double,
    nome varchar(20),
    calorie int,
    grassi double,
    zuccheri double,
    proteine double
    );
    
CREATE TABLE recensione(
    id_recensione int AUTO_INCREMENT PRIMARY KEY,
    voto int,
    descrizione varchar(100),
    fk_cf varchar(16),
    fk_id_prodotto int,
    FOREIGN KEY (fk_cf) REFERENCES utente(cf) on DELETE CASCADE on update CASCADE,
    FOREIGN KEY (fk_id_prodotto) REFERENCES prodotto(id_prodotto) on DELETE CASCADE on update CASCADE
    );
    
CREATE TABLE allergene(
    id_allergene int AUTO_INCREMENT PRIMARY KEY,
    nome varchar(20)
    );
    
CREATE TABLE promozione(
    id_promozione int AUTO_INCREMENT PRIMARY KEY,
    descrizione varchar(30),
    inizio date,
    fine date
    );
    
CREATE TABLE prenotazione_prodotto(
    id_prenotazione_prodotto int AUTO_INCREMENT PRIMARY KEY,
    quantita int,
    fk_id_prenotazione int,
    fk_id_prodotto int,
    FOREIGN KEY (fk_id_prenotazione) REFERENCES prenotazione (id_prenotazione)on DELETE CASCADE on update CASCADE,
    FOREIGN KEY (fk_id_prodotto) REFERENCES prodotto(id_prodotto) on DELETE CASCADE on update CASCADE
   );
    
CREATE TABLE allergene_prodotto(
    id_allergene_prodotto int AUTO_INCREMENT PRIMARY KEY,
    fk_id_allergene int,
    FOREIGN KEY (fk_id_allergene) REFERENCES allergene(id_allergene) on DELETE CASCADE on update CASCADE,
    fk_id_prodotto int,
    FOREIGN KEY (fk_id_prodotto) REFERENCES prodotto(id_prodotto) on DELETE CASCADE on update CASCADE
   );
    
CREATE TABLE promozione_prodotto(
    id_promozione_prodotto int AUTO_INCREMENT PRIMARY KEY,
    sconto int,
    fk_id_promozione int,
    FOREIGN KEY (fk_id_promozione) REFERENCES promozione(id_promozione) on DELETE CASCADE on update CASCADE,
    fk_id_prodotto int,
    FOREIGN KEY (fk_id_prodotto) REFERENCES prodotto(id_prodotto) on DELETE CASCADE on update CASCADE
   );
