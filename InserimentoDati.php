<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        //print_r($_POST);
        $servername = "localhost";
        $user = "root";
        $pwd = "root";
        $db = "merende";

        $connessione = mysqli_connect($servername,$user,$pwd,$db);

        //controllo la connessione 
        if(!$connessione){
            die("hai commesso un'errore ".mysqli_connect_error());
        }

        if(!isset($_POST['invia'])){
    ?>
    
    <form method = "POST" action="inserimentoDati.php">
            CIBO: <select name="prodotto">

    <?php 
        $query = "SELECT prodotto.nome FROM  prodotto";
        $risultato = mysqli_query($connessione,$query);

        if(mysqli_num_rows($risultato)>0){

            while($riga = mysqli_fetch_array($risultato)){
                echo ("<option value=${riga['id_prod']}>${riga['nome']}</option>");
            }
        }

        
    ?>
        </select>
        <input type="submit" value="aggiungi">
        <br><br>
        RICREAZIONE:
        <br><br>
        1: <input type="radio" name="ricreazione" value="1">
        2: <input type="radio" name="ricreazione" value="2">
        <br><br>
        <input type="submit" value="invia">
        <input type="reset" value="cancella">
    </form>
<?php
}else{

    $id_prod = $_POST['id_prod'];
    $ricreazione = $_POST['ricreazione'];
    $data = $_POST['data'];
    $cf = $_POST['fk_cf'];


    $inserisciDati = "INSERT INTO prenotazione (id_pre,ricreazione,data_pre,fk_cf)
     VALUES ($id_prod,$ricreazione,$data,$cf)";
    echo ("prima: ".$inserisciDati);

    $risultato1 = mysqli_query($connessione,$inserisciDati);
    if ($risultato1){
        echo ("dati inseriti");
    }else{
        echo("c'è un errore");
    }
    mysqli_close($connessione);
}

/*if(!isset($_POST['aggiungi'])){
    echo();
}*/
?>
</body>
</html>

    