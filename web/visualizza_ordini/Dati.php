<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    textarea {
  text-align: left;
}
</style>
<body>
    <?php
        
        $servername = "10.1.0.52";
        $user = "progetto5i";
        $pwd = "progetto5i";
        $db = "merende";
        $connessione = mysqli_connect($servername,$user,$pwd,$db);

        //controllo la connessione 
        if(!$connessione){
            die("hai commesso un'errore ".mysqli_connect_error());
        }

        if(!isset($_POST['invia'])){
    ?>


    <button value="aggiungi"  onclick ="aggiungi()">Aggiungi</button>
   
    <form method = "POST" action="Dati.php">
            CIBO: <select name="prodotto" id='prodotto'>
            

    <?php
        $prodotto;
        $query = "SELECT * FROM  prodotto";
        $risultato = mysqli_query($connessione,$query);

        if(mysqli_num_rows($risultato)>0){

            while($riga = mysqli_fetch_array($risultato)){
                echo ($riga);
                echo ("<option  value=\"${riga['id_prodotto']}\">
                        ${riga['nome']}</option>");
            }
        }        
    
      ?>
        </select>
        <br></br>
        <input type="date" name="orario" value="ORA">
        <br><br>
        RICREAZIONE:
        <br><br>
        1: <input type="radio" name="ricreazione" value="1">
        2: <input type="radio" name="ricreazione" value="2">
        
        <br><br>
        <input type="submit" name ="invia" value="invia">
        <input type="reset" value="cancella">
        <br><br>
        <textarea id="inserimento" name="area" rows="4" cols="50" EMPTY readonly></textarea>
        <input id="invioNumeri" name="areaNumeri" rows="4" cols="50" EMPTY readonly></input>
    
    </form>
    
    
<?php
}else{
    session_start();
    //quando pigio invio devo fare questa cosa
    print_r($_SESSION['utente']);
    $ricreazione = $_POST['ricreazione'];
    $cf = $_SESSION['utente'];
    $ora = $_POST["orario"];
    //$last_id = mysqli_insert_id($connessione);


    $inserisciDati = "INSERT INTO prenotazione (id_prenotazione,ricreazione,data_prenotazione,fk_cf)
     VALUES (null,'$ricreazione','$ora','$cf')";
    echo ("prima: ".$inserisciDati);



    //query che mi prende l'id della prenotazione che voglio
    $queryPrenotazione = "SELECT id_prenotazione FROM  prenotazione
                            ORDER BY id_prenotazione DESC LIMIT 1";
    $risultatoPrenotazione = mysqli_query($connessione,$queryPrenotazione);
 
    if(mysqli_num_rows($risultatoPrenotazione)>0){
        while($riga = mysqli_fetch_array($risultatoPrenotazione)){
            echo ($riga);

        }
    }


        
        
    //FACCIO UN FOR CHE SCORRE PER LA LUNGHEZZA DEI NUMERI DENTRO LA TEXT AREA
    // ES. TEXT AREA--> 2 3 4 1 SCORRE PER 4 VOLTE
    $areaNumeri = $_POST['areaNumeri'];
    $vettoreId = explode(",",$areaNumeri);
    for($i = 0;$i<count($vettoreId)-1;$i++){
        $id = $vettoreId[$i];
        $inserisciDati2 = "INSERT INTO prenotazione_prodotto (id_prenotazione_prodotto,quantita,fk_id_prenotazione,fk_id_prodotto)
            VALUES (null,null,'$queryPrenotazione','$id')";
            echo ("prima: ".$inserisciDati2);
    }
    
    echo ("seconda : ".$queryPrenotazione);


    echo ("prima: ".$inserisciDati);
    $risultato1 = mysqli_query($connessione,$inserisciDati);

    if ($risultato1 == true ){
        echo ("dati inseriti");
        print_r($_POST);
    }else{
        echo("c'è un errore");
        print_r($_POST);
    }
    
    mysqli_close($connessione);
}


?>
<script>
        "use strict";
        function aggiungi(){
            let prodotto = document.getElementById("prodotto").value;
            let nome=  document.getElementById("prodotto").selectedIndex;

            let area = document.getElementById ("inserimento");
            let areaNumeri = document.getElementById ("invioNumeri");
            let x = document.querySelectorAll("#prodotto option");
            console.log(nome, prodotto);
            areaNumeri.value +=  prodotto +",";
            area.value +=x[prodotto-1].innerText;

            
            console.log(x[prodotto-1].innerText);
           
        }
    </script>

</body>
</html>

    