-- Merenda più richiesta tra tutte le prenotazioni --
SELECT prodotto.nome,
       Sum(prenotazione_prodotto.quantita) AS somma
FROM   prodotto,
       prenotazione_prodotto,
       prenotazione
WHERE  prodotto.id_prodotto = prenotazione_prodotto.fk_id_prodotto
       AND prenotazione.id_prenotazione =
           prenotazione_prodotto.fk_id_prenotazione
GROUP  BY prodotto.nome
ORDER  BY somma DESC
LIMIT  1; 




-- Classe con maggiore spesa --
SELECT classe.descrizione,
       Sum(prodotto.prezzo * prenotazione_prodotto.quantita) AS somma
FROM   classe,
       utente,
       prenotazione,
       prenotazione_prodotto,
       prodotto
WHERE  classe.descrizione = utente.fk_descrizione
       AND prenotazione.fk_cf = utente.cf
       AND prenotazione.id_prenotazione =
           prenotazione_prodotto.fk_id_prenotazione
       AND prodotto.id_prodotto = prenotazione_prodotto.fk_id_prodotto
GROUP  BY classe.descrizione
ORDER  BY somma DESC
LIMIT  1; 




-- Statistiche sulla salute di un utente in un tempo indeterminato --
SELECT utente.nome,
       utente.cognome,
       Sum(prodotto.grassi  *prenotazione_prodotto.quantita) AS grassi,
       Sum(prodotto.proteine*prenotazione_prodotto.quantita) AS proteine,
       Sum(prodotto.zuccheri*prenotazione_prodotto.quantita) AS zuccheri,
       Sum(prodotto.calorie *prenotazione_prodotto.quantita) AS calorie
FROM   prodotto,
       prenotazione_prodotto,
       prenotazione,
       utente
WHERE  utente.cf=prenotazione.fk_cf
AND    prenotazione.id_prenotazione=prenotazione_prodotto.fk_id_prenotazione
AND    prodotto.id_prodotto=prenotazione_prodotto.fk_id_prodotto
AND    utente.cf="PRTLRT"




-- Statistiche sulla salute di un utente in un tempo determinato --
SELECT utente.nome,
       utente.cognome,
       sum(prodotto.grassi  *prenotazione_prodotto.quantita) AS grassi,
       sum(prodotto.proteine*prenotazione_prodotto.quantita) AS proteine,
       sum(prodotto.zuccheri*prenotazione_prodotto.quantita) AS zuccheri,
       sum(prodotto.calorie *prenotazione_prodotto.quantita) AS calorie
FROM   prodotto,
       prenotazione_prodotto,
       prenotazione,
       utente
WHERE  utente.cf=prenotazione.fk_cf
AND    prenotazione.id_prenotazione=prenotazione_prodotto.fk_id_prenotazione
AND    prodotto.id_prodotto=prenotazione_prodotto.fk_id_prodotto
AND    utente.cf="PRTLRT"
AND    prenotazione.data_prenotazione BETWEEN "2023-01-15" AND    "2023-04-01";




-- Statistiche sulla salute di una classe in un tempo indeterminato --
SELECT classe.descrizione,
       Sum(prodotto.grassi  *prenotazione_prodotto.quantita) AS Grassi,
       Sum(prodotto.proteine*prenotazione_prodotto.quantita) AS Proteine,
       Sum(prodotto.zuccheri*prenotazione_prodotto.quantita) AS Zuccheri,
       Sum(prodotto.calorie *prenotazione_prodotto.quantita) AS Calorie
FROM   prodotto,
       prenotazione_prodotto,
       prenotazione,
       utente,
       classe
WHERE  utente.cf=prenotazione.fk_cf
AND    prenotazione.id_prenotazione=prenotazione_prodotto.fk_id_prenotazione
AND    prodotto.id_prodotto=prenotazione_prodotto.fk_id_prodotto
AND    classe.descrizione=utente.fk_descrizione
AND    classe.descrizione="5i";



-- Statistiche sulla salute di una classe in un tempo determinato --
SELECT classe.descrizione,
       Sum(prodotto.grassi  *prenotazione_prodotto.quantita) AS Grassi,
       Sum(prodotto.proteine*prenotazione_prodotto.quantita) AS Proteine,
       Sum(prodotto.zuccheri*prenotazione_prodotto.quantita) AS Zuccheri,
       Sum(prodotto.calorie *prenotazione_prodotto.quantita) AS Calorie
FROM   prodotto,
       prenotazione_prodotto,
       prenotazione,
       utente,
       classe
WHERE  utente.cf=prenotazione.fk_cf
AND    prenotazione.id_prenotazione=prenotazione_prodotto.fk_id_prenotazione
AND    prodotto.id_prodotto=prenotazione_prodotto.fk_id_prodotto
AND    classe.descrizione=utente.fk_descrizione
AND    classe.descrizione="5i"
AND    prenotazione.data_prenotazione BETWEEN "2023-01-15" AND    "2023-04-01";




-- Statistiche sulla salute di tutte le classi in un tempo indeterminato --
SELECT   classe.descrizione,
         Sum(prodotto.grassi  *prenotazione_prodotto.quantita) AS Grassi,
         Sum(prodotto.proteine*prenotazione_prodotto.quantita) AS Proteine,
         Sum(prodotto.zuccheri*prenotazione_prodotto.quantita) AS Zuccheri,
         Sum(prodotto.calorie *prenotazione_prodotto.quantita) AS Calorie
FROM     prodotto,
         prenotazione_prodotto,
         prenotazione,
         utente,
         classe
WHERE    utente.cf=prenotazione.fk_cf
AND      prenotazione.id_prenotazione=prenotazione_prodotto.fk_id_prenotazione
AND      prodotto.id_prodotto=prenotazione_prodotto.fk_id_prodotto
AND      classe.descrizione=utente.fk_descrizione
AND      prenotazione.data_prenotazione
GROUP BY utente.fk_descrizione;


