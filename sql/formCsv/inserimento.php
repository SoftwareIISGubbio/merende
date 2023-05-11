<?php
    $servername='10.1.0.52';
    $user='progetto5i';
    $psw='progetto5i';
    $db='merende';
    $connessione=mysqli_connect($servername,$user,$psw,$db);
    if(!$connessione){
        die("errore".mysqli_connect_errno());
    }

    if($_FILES["passaFile"]["error"] == UPLOAD_ERR_OK){
       
        $fileCsv = file($_FILES["passaFile"]["tmp_name"], FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach($fileCsv as $linea){
            $dati = explode(",", $linea);

            $cf = trim($dati[0]);
            $nome = trim($dati[1]);
            $cognome = trim($dati[2]);
            $utente = trim($dati[3]);
            $password = trim($dati[4]);
            $tipo = trim($dati[5]);
            $fk_descrizione = trim($dati[6]);
            
            $query = "INSERT INTO utente VALUES('$cf', '$nome', '$cognome', '$utente', '$password', '$tipo', '$fk_descrizione')";
            //echo($query);
            $risultato = mysqli_query($connessione, $query);
            
            if($risultato){
                echo("riga inserita");
            }else{
                echo("errore");
            }
        }
    }else{
        echo("ERRORE di caricamento del file");
    }
    mysqli_close($connessione);
?>