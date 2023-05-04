-- INSERT TABELLA CLASSI
INSERT INTO classe (descrizione) VALUES ('5i');
INSERT INTO classe (descrizione) VALUES ('4i');
INSERT INTO classe (descrizione) VALUES ('3i');
INSERT INTO classe (descrizione) VALUES ('bar');
INSERT INTO classe (descrizione) VALUES ('2i');

-- INSERT TABELLA UTENTI
INSERT INTO utente (cf, nome, cognome, utente, password, tipo, fk_descrizione) VALUES ('PRTLRT', 'Alberto', 'Pieretti', 'albipieretti', 'ciao123', 'capoclasse', '5i');
INSERT INTO utente (cf, nome, cognome, utente, password, tipo, fk_descrizione) VALUES ('SRNSML', 'Samuel', 'Soriani', 'samufrix', 'bella', 'alunno', '5i');
INSERT INTO utente (cf, nome, cognome, utente, password, tipo, fk_descrizione) VALUES ('SRNLCA', 'Luca', 'Soriani', 'luchino10', 'AUAU', 'alunno', '3i');
INSERT INTO utente (cf, nome, cognome, utente, password, tipo, fk_descrizione) VALUES ('GLLLCU', 'Luca', 'Galletti', 'gallo', 'cantiano', 'gestore', 'bar');
INSERT INTO utente (cf, nome, cognome, utente, password, tipo, fk_descrizione) VALUES ('MLTLND', 'Leonardo', 'Meletti', 'leomela04', 'M3L4', 'alunno', '2i');

-- INSERT TABELLA PRENOTAZIONI
INSERT INTO prenotazione (id_prenotazione, ricreazione, data_prenotazione, fk_cf) VALUES (null, '1', '2023-03-21', 'PRTLRT');
INSERT INTO prenotazione (id_prenotazione, ricreazione, data_prenotazione, fk_cf) VALUES (null, '1', '2023-04-01', 'SRNSML');
INSERT INTO prenotazione (id_prenotazione, ricreazione, data_prenotazione, fk_cf) VALUES (null, '2', '2023-01-15', 'PRTLRT');
INSERT INTO prenotazione (id_prenotazione, ricreazione, data_prenotazione, fk_cf) VALUES (null, '1', '2023-05-05', 'SRNLCA');
INSERT INTO prenotazione (id_prenotazione, ricreazione, data_prenotazione, fk_cf) VALUES (null, '2', '2023-05-05', 'GLLLCU');

-- INSERT TABELLA PRODOTTI
INSERT INTO prodotto (id_prodotto, prezzo, nome, calorie, grassi, zuccheri, proteine) VALUES (null, 2, 'panino prosciutto', 120, 30.56, 70.5, 20.5);
INSERT INTO prodotto (id_prodotto, prezzo, nome, calorie, grassi, zuccheri, proteine) VALUES (null, 2, 'panino prosciutto', 120, 30.56, 70.5, 20.5);
INSERT INTO prodotto (id_prodotto, prezzo, nome, calorie, grassi, zuccheri, proteine) VALUES (null, 1.2, 'cocacola', 30, 120.45, 78, 45);
INSERT INTO prodotto (id_prodotto, prezzo, nome, calorie, grassi, zuccheri, proteine) VALUES (null, 2, 'panino salame', 45, 80, 20, 40.9);
INSERT INTO prodotto (id_prodotto, prezzo, nome, calorie, grassi, zuccheri, proteine) VALUES (null, 2, 'panino prosciutto co', 45, 50, 46, 10.06);
INSERT INTO prodotto (id_prodotto, prezzo, nome, calorie, grassi, zuccheri, proteine) VALUES (null, 1.75, 'cornetto cioccolato', 67, 70, 200, 22);

-- INSERT TABELLA RECENSIONI
INSERT INTO recensione (id_recensione, voto, descrizione, fk_cf, fk_id_prodotto) VALUES (null, 5, 'ottimo panino', 'PRTLRT', 1);
INSERT INTO recensione (id_recensione, voto, descrizione, fk_cf, fk_id_prodotto) VALUES (null, 1, 'panino ammuffito', 'GLLLCU', 1);
INSERT INTO recensione (id_recensione, voto, descrizione, fk_cf, fk_id_prodotto) VALUES (null, 3, 'cocacola non freschissima', 'PRTLRT', 3);
INSERT INTO recensione (id_recensione, voto, descrizione, fk_cf, fk_id_prodotto) VALUES (null, 5, 'cocacola fresca', 'MLTLND', 3);
INSERT INTO recensione (id_recensione, voto, descrizione, fk_cf, fk_id_prodotto) VALUES (null, 2, 'cornetto ghiaccio', 'SRNLCA', 5);

-- INSERT TABELLA PROMOZIONI
INSERT INTO promozione (id_promozione, descrizione, inizio, fine) VALUES (null, 'promozione natale', '2022-12-23', '2023-01-09');
INSERT INTO promozione (id_promozione, descrizione, inizio, fine) VALUES (null, 'promozione pasqua', '2023-01-09', '2023-01-09');
INSERT INTO promozione (id_promozione, descrizione, inizio, fine) VALUES (null, 'sconti ceri', '2023-04-09', '2023-04-16');
INSERT INTO promozione (id_promozione, descrizione, inizio, fine) VALUES (null, 'sconti hallowen', '2022-05-11', '2022-07-11');
INSERT INTO promozione (id_promozione, descrizione, inizio, fine) VALUES (null, 'promozione lunedi', '2022-06-15', '2022-06-21');

-- INSERT TABELLA ALLERGENI
INSERT INTO allergene (id_allergene, nome) VALUES (null, 'glutine');
INSERT INTO allergene (id_allergene, nome) VALUES (null, 'lattosio');
INSERT INTO allergene (id_allergene, nome) VALUES (null, 'arachidi');
INSERT INTO allergene (id_allergene, nome) VALUES (null, 'soia');
INSERT INTO allergene (id_allergene, nome) VALUES (null, 'sesamo');

-- INSERT TABELLA ALLERGENI_PRODOTTI
INSERT INTO allergene_prodotto(id_allergene_prodotto, fk_id_allergene, fk_id_prodotto) VALUES (null, 1, 1);
INSERT INTO allergene_prodotto(id_allergene_prodotto, fk_id_allergene, fk_id_prodotto) VALUES (null, 4, 4);
INSERT INTO allergene_prodotto(id_allergene_prodotto, fk_id_allergene, fk_id_prodotto) VALUES (null, 3, 2);
INSERT INTO allergene_prodotto(id_allergene_prodotto, fk_id_allergene, fk_id_prodotto) VALUES (null, 5, 1);
INSERT INTO allergene_prodotto(id_allergene_prodotto, fk_id_allergene, fk_id_prodotto) VALUES (null, 2, 2);

-- INSERT TEBALLA PRENOTAZIONI_PRODOTTI
INSERT INTO prenotazione_prodotto(id_prenotazione_prodotto, quantita, fk_id_prenotazione, fk_id_prodotto) VALUES (null, 2, 1, 1);
INSERT INTO prenotazione_prodotto(id_prenotazione_prodotto, quantita, fk_id_prenotazione, fk_id_prodotto) VALUES (null, 1, 2, 1);
INSERT INTO prenotazione_prodotto(id_prenotazione_prodotto, quantita, fk_id_prenotazione, fk_id_prodotto) VALUES (null, 3, 5, 3);
INSERT INTO prenotazione_prodotto(id_prenotazione_prodotto, quantita, fk_id_prenotazione, fk_id_prodotto) VALUES (null, 1, 4, 5);
INSERT INTO prenotazione_prodotto(id_prenotazione_prodotto, quantita, fk_id_prenotazione, fk_id_prodotto) VALUES (null, 1, 3, 3);

-- INSERT TABELLA PROMOZIONI_PRODOTTO
INSERT INTO promozione_prodotto (id_promozione_prodotto, inzio, fine, sconto, fk_id_promozione, fk_id_prodotto) VALUES (1, 30, 1, 1);
INSERT INTO promozione_prodotto (id_promozione_prodotto, inzio, fine, sconto, fk_id_promozione, fk_id_prodotto) VALUES (2, 20, 2, 5);
INSERT INTO promozione_prodotto (id_promozione_prodotto, inzio, fine, sconto, fk_id_promozione, fk_id_prodotto) VALUES (3, 25, 5, 2);
INSERT INTO promozione_prodotto (id_promozione_prodotto, inzio, fine, sconto, fk_id_promozione, fk_id_prodotto) VALUES (4, 30, 4, 2);
INSERT INTO promozione_prodotto (id_promozione_prodotto, inzio, fine, sconto, fk_id_promozione, fk_id_prodotto) VALUES (5, 30, 3, 4);