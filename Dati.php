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
        <br><br>
        RICREAZIONE:
        <br><br>
        1: <input type="radio" name="ricreazione" value="1">
        2: <input type="radio" name="ricreazione" value="2">
        
        <br><br>
        <input type="submit" value="invia">
        <input type="reset" value="cancella">
    </form>
    
    <textarea id="inserimento" name="area" rows="4" cols="50" EMPTY readonly></textarea>
    <textarea id="invioNumeri" name="area" rows="4" cols="50" EMPTY readonly></textarea>
<?php
}else{
    //quando pigio invio devo fare questa cosa

    $id_prenotazione= $_POST['id_pronotazione'];
    $ricreazione = $_POST['ricreazione'];
    $data = $_POST['data_prenotazione'];
    $cf = $_POST['fk_cf'];


    $inserisciDati = "INSERT INTO prenotazione (id_prenotazione,ricreazione,data_pre,cf)
     VALUES ($id_prenotazione,$ricreazione,$data,$cf)";
    echo ("prima: ".$inserisciDati);

    $risultato1 = mysqli_query($connessione,$inserisciDati);
    if ($risultato1){
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
            areaNumeri.value += prodotto;
            area.value +=x[prodotto-1].innerText;

            
            console.log(x[prodotto-1].innerText);
           
        }
    </script>

</body>
</html>

    