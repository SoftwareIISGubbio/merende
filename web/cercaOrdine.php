<?php
    $servername='10.1.0.52';
    $user='progetto5i';
    $psw='progetto5i';
    $db='merende';
    $vettore=[];
    $connessione=mysqli_connect($servername,$user,$psw,$db);
    if(!$connessione){
        die("errore".mysqli_connect_errno());
    }

    $ricerca = "SELECT prodotto.nome, prenotazione_prodotto.quantita, prenotazione.ricreazione
    FROM prodotto, prenotazione, prenotazione_prodotto
    WHERE prenotazione.data_prenotazione = '${_GET["data"]}' AND prenotazione.fk_cf = 'PRTLRT' AND prodotto.id_prodotto = prenotazione_prodotto.fk_id_prodotto AND prenotazione.id_prenotazione = prenotazione_prodotto.fk_id_prenotazione";
   
    $risultatoQuery = mysqli_query($connessione, $ricerca);

    if(mysqli_num_rows($risultatoQuery) > 0){
        while($riga=mysqli_fetch_assoc($risultatoQuery)){
            array_push($vettore, $riga);
        }
    }

    echo json_encode($vettore);
    mysqli_close($connessione);
?>