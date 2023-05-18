<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form capocalsse</title>
    <style>
        body{
           background-color:lightblue;
        }
        h1{
            text-align: center;
        }
        a{
            display: block;
            text-align:center;
            text-decoration: none;
            margin: 30px;
        }
        .logout-button {
            background-color: #f44336;
            color: white;
            padding: 10px 20px;
            border: none;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
    }
        #barra_ricerca{
            text-align:center;
            display: block;
            
        }
        table,td, tr{
            border: 1px inset;
            text-align: center;
            margin-left:  100px;
            margin-right:100px;
            background-color: white;
            border-radius: 4px;
            font-size:16px;
        }
        
        #prima{
            font-weight: bold;
            width: 1000px;

        }
        ul{
            text-align: center;
        }

        fieldset{
            text-align: center;
            margin-bottom: 100px;
            margin-right: 150px;
            margin-left: 150px;
            background-color: darkseagreen;
        }
        
        
        
    </style>
</head>
<body>
    <h1>CAPOCLASSE</h1>
    <a href=pag_logout.php><input class="logout-button" value="Logout" type="submit"></a>

    <?php
      include('connessione.php');
      session_start();
        $connection=mysqli_connect($server_name,$user,$psw,$nome_db);
        if(!$connection){
           die("errore".mysqli_connect_errno());
        }
        if(isset($_SESSION['utente'])){
         
    ?>
        <form method="POST" action="formCapoclasse.php">
            <div id= "barra_ricerca">
            GIORNI: <select name="giorni">
    <?php
        $query="SELECT prenotazione.data_prenotazione, prenotazione.id_prenotazione, utente.nome, utente.fk_descrizione
        FROM prenotazione, utente,classe
        WHERE utente.tipo= 'capoclasse' AND prenotazione.fk_cf = utente.cf AND  classe.descrizione=(SELECT classe.descrizione FROM classe,utente WHERE utente.cf=".$_SESSION['utente']." AND utente.fk_descrizione=classe.descrizione) AND utente.fk_descrizione=classe.descrizione";                                   
        $ris = mysqli_query($connection, $query);
        if(mysqli_num_rows($ris)>0){
            while($riga = mysqli_fetch_assoc($ris)){
                echo("<option value= ".$riga['id_prenotazione'].">".$riga['data_prenotazione'] ."</option>");       
            }
            
        }

    ?>
        </select>
        RICREAZIONE:  PRIMA<input value="1" type="radio" ccecked="true" name="ricreazione" checked> SECONDA <input value="2" type="radio" name="ricreazione"> 
        <input type="submit" value="cerca" name="cerca">
        </div>
        <br>
        <br> 
    <?php
       if(isset($_REQUEST["cerca"])){
            
            $totale=0;
            /*$query= "SELECT prodotto.nome ,prenotazione_prodotto.quantita, prodotto.prezzo 
            from prodotto, prenotazione, prenotazione_prodotto, utente 
            WHERE prenotazione.id_prenotazione=".$_POST['giorni']." and prenotazione.ricreazione=".$_POST['ricreazione'] ." and utente.utente='".$_SESSION['utente']."'"." AND prenotazione_prodotto.fk_id_prenotazione = prenotazione.id_prenotazione AND prenotazione_prodotto.fk_id_prodotto = prodotto.id_prodotto AND utente.cf = prenotazione.fk_cf";*/
            $query="SELECT utente.cf,prenotazione.id_prenotazione, prenotazione_prodotto.quantita,prodotto.nome,prodotto.prezzo, prenotazione.data_prenotazione
            FROM prenotazione_prodotto, prenotazione, utente, prodotto,classe
            WHERE utente.cf=prenotazione.fk_cf AND prenotazione.id_prenotazione=prenotazione_prodotto.fk_id_prenotazione AND prenotazione_prodotto.fk_id_prodotto=prodotto.id_prodotto
            AND classe.descrizione=utente.fk_descrizione AND prenotazione.data_prenotazione=".$_POST['giorni']." AND prenotazione.ricreazione=".$_POST['ricreazione'] ." AND classe.descrizione=(SELECT classe.descrizione FROM classe,utente WHERE utente.cf=".$_SESSION['utente']." AND utente.fk_descrizione=classe.descrizione)                                                   
            ORDER BY prenotazione.id_prenotazione";
            $ris= mysqli_query($connection, $query);
            if(mysqli_num_rows($ris)>0){
                echo ("<fieldset>
                <ul>
                <table>  ");
                echo ("<tr><td id="."prima".">NOME PRODOTTO</td><td id="."prima".">QUANTITA'</td><td id="."prima".">PREZZO</td></tr>");
                while($riga = mysqli_fetch_assoc($ris)){
                    echo ("<tr><td>".$riga['nome']."</td><td>".$riga['quantita']."</td><td>".$riga['prezzo']."</td></tr>");
                    $totale+=$riga['quantita']*$riga['prezzo'];
                }
                ?>  
                </table>
                </ul>
                <?php
                echo ("<ul><p>TOTALE: ".$totale ."€</p></ul></fieldset>");
            }else{
                echo("<fieldset> <ul><p><b>NON CI SONO ORDINI</b></p></ul></fieldset");
            }
            
        }
        ?>
        
    </form>
    <?php
       
        mysqli_close($connection);

        }
        
    ?>
</body>
</html>