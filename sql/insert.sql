INSERT INTO classe (descrizione) VALUES ('5i');
INSERT INTO classe (descrizione) VALUES ('4i');
INSERT INTO classe (descrizione) VALUES ('3i');
INSERT INTO classe (descrizione) VALUES ('bar');
INSERT INTO classe (descrizione) VALUES ('2i');

INSERT INTO utenti (cf, nome, cognome, utente, password, tipo, fk_descrizione) VALUES ('PRTLRT', 'Alberto', 'Pieretti', 'albipieretti', 'ciao123', 'capoclasse', '5i');
INSERT INTO utenti (cf, nome, cognome, utente, password, tipo, fk_descrizione) VALUES ('SRNSML', 'Samuel', 'Soriani', 'samufrix', 'bella', 'studente', '5i');
INSERT INTO utenti (cf, nome, cognome, utente, password, tipo, fk_descrizione) VALUES ('SRNLCA', 'Luca', 'Soriani', 'luchino10', 'AUAU', 'studente', '3i');
INSERT INTO utenti (cf, nome, cognome, utente, password, tipo, fk_descrizione) VALUES ('GLLLCU', 'Luca', 'Galletti', 'gallo', 'cantiano', 'gestore', 'bar');
INSERT INTO utenti (cf, nome, cognome, utente, password, tipo, fk_descrizione) VALUES ('MLTLND', 'Leonardo', 'Meletti', 'leomela04', 'M3L4', 'studente', '2i');

INSERT INTO prenotazione (id_pre, ricreazione, data_pre, fk_cf) VALUES (null, '1', '2023-03-21', 'PRTLRT');
INSERT INTO prenotazione (id_pre, ricreazione, data_pre, fk_cf) VALUES (null, '1', '2023-04-01', 'SRNSML');
INSERT INTO prenotazione (id_pre, ricreazione, data_pre, fk_cf) VALUES (null, '2', '2023-01-15', 'PRTLRT');
INSERT INTO prenotazione (id_pre, ricreazione, data_pre, fk_cf) VALUES (null, '1', '2023-05-05', 'SRNLCA');
INSERT INTO prenotazione (id_pre, ricreazione, data_pre, fk_cf) VALUES (null, '2', '2023-05-05', 'GLLLCU');

INSERT INTO prodotto (id_prod, prezzo, nome, calorie, grassi, zuccheri, proteine) VALUES (null, 2, 'panino prosciutto', 120, 30.56, 70.5, 20.5);
INSERT INTO prodotto (id_prod, prezzo, nome, calorie, grassi, zuccheri, proteine) VALUES (null, 2, 'panino prosciutto', 120, 30.56, 70.5, 20.5);
INSERT INTO prodotto (id_prod, prezzo, nome, calorie, grassi, zuccheri, proteine) VALUES (null, 1.2, 'cocacola', 30, 120.45, 78, 45);
INSERT INTO prodotto (id_prod, prezzo, nome, calorie, grassi, zuccheri, proteine) VALUES (null, 2, 'panino salame', 45, 80, 20, 40.9);
INSERT INTO prodotto (id_prod, prezzo, nome, calorie, grassi, zuccheri, proteine) VALUES (null, 2, 'panino prosciutto co', 45, 50, 46, 10.06);
INSERT INTO prodotto (id_prod, prezzo, nome, calorie, grassi, zuccheri, proteine) VALUES (null, 1.75, 'cornetto cioccolato', 67, 70, 200, 22);

INSERT INTO recensione (id_rec, voto, descrizione, fk_cf, fk_id_prod) VALUES (null, 5, 'ottimo panino', 'PRTLRT', 1);
INSERT INTO recensione (id_rec, voto, descrizione, fk_cf, fk_id_prod) VALUES (null, 1, 'panino ammuffito', 'GLLLCU', 1);
INSERT INTO recensione (id_rec, voto, descrizione, fk_cf, fk_id_prod) VALUES (null, 3, 'cocacola non freschissima', 'PRTLRT', 3);
INSERT INTO recensione (id_rec, voto, descrizione, fk_cf, fk_id_prod) VALUES (null, 5, 'cocacola fresca', 'MLTLND', 3);
INSERT INTO recensione (id_rec, voto, descrizione, fk_cf, fk_id_prod) VALUES (null, 2, 'cornetto ghiaccio', 'SRNLCA', 5);

INSERT INTO promozione (id_pro, descrizione) VALUES (null, 'promozione natale');
INSERT INTO promozione (id_pro, descrizione) VALUES (null, 'promozione pasqua');
INSERT INTO promozione (id_pro, descrizione) VALUES (null, 'sconti ceri');
INSERT INTO promozione (id_pro, descrizione) VALUES (null, 'sconti hallowen');
INSERT INTO promozione (id_pro, descrizione) VALUES (null, 'promozione lunedi');

INSERT INTO allergene (id_al, nome) VALUES (null, 'glutine');
INSERT INTO allergene (id_al, nome) VALUES (null, 'lattosio');
INSERT INTO allergene (id_al, nome) VALUES (null, 'arachidi');
INSERT INTO allergene (id_al, nome) VALUES (null, 'soia');
INSERT INTO allergene (id_al, nome) VALUES (null, 'sesamo');

INSERT INTO allergene_prodotto(id_ap, fk_id_al, fk_id_prod) VALUES (null, 1, 1);
INSERT INTO allergene_prodotto(id_ap, fk_id_al, fk_id_prod) VALUES (null, 1, 4);
INSERT INTO allergene_prodotto(id_ap, fk_id_al, fk_id_prod) VALUES (null, 3, 2);
INSERT INTO allergene_prodotto(id_ap, fk_id_al, fk_id_prod) VALUES (null, 5, 1);
INSERT INTO allergene_prodotto(id_ap, fk_id_al, fk_id_prod) VALUES (null, 2, 2);

INSERT INTO prenotazione_prodotto(id_pp, quantita, fk_id_pre, fk_id_prod) VALUES (null, 2, 1, 1);
INSERT INTO prenotazione_prodotto(id_pp, quantita, fk_id_pre, fk_id_prod) VALUES (null, 1, 2, 1);
INSERT INTO prenotazione_prodotto(id_pp, quantita, fk_id_pre, fk_id_prod) VALUES (null, 3, 2, 3);
INSERT INTO prenotazione_prodotto(id_pp, quantita, fk_id_pre, fk_id_prod) VALUES (null, 1, 4, 5);
INSERT INTO prenotazione_prodotto(id_pp, quantita, fk_id_pre, fk_id_prod) VALUES (null, 1, 3, 3);

INSERT INTO promozione_prodotto (id_sc, inzio, fine, sconto, fk_id_pro, fk_id_prod) VALUES (1, '2022-12-23', '2023-01-09', 30, 1, 1);
INSERT INTO promozione_prodotto (id_sc, inzio, fine, sconto, fk_id_pro, fk_id_prod) VALUES (2, '2023-01-09', '2023-01-09', 20, 2, 5);
INSERT INTO promozione_prodotto (id_sc, inzio, fine, sconto, fk_id_pro, fk_id_prod) VALUES (3, '2023-04-09', '2023-04-16', 25, 5, 2);
INSERT INTO promozione_prodotto (id_sc, inzio, fine, sconto, fk_id_pro, fk_id_prod) VALUES (4, '0000-00-00', '2022-07-11', 30, 4, 2);
INSERT INTO promozione_prodotto (id_sc, inzio, fine, sconto, fk_id_pro, fk_id_prod) VALUES (5, '2022-06-15', '2022-06-21', 30, 3, 4);