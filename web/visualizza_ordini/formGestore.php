<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>GESTORE BAR</h1>
    <p>per fare il <a href=pag_logout.php>logout</a> premi qua</p>
   
    <?php
      include('connessione.php');
      session_start();
        $connection=mysqli_connect($server_name,$user,$psw,$nome_db);
        if(!$connection){
           die("errore".mysqli_connect_errno());
        }
        //print_r($_SESSION);
        if(isset($_SESSION['utente'])){
         print_r($_POST);
    ?>
        <form method="POST" action="formGestore.php">
                GIORNI: <select name="giorni">
               
    <?php
        $query="SELECT  prenotazione.data_prenotazione FROM prenotazione " ;
       
        $ris = mysqli_query($connection, $query);
        if(mysqli_num_rows($ris)>0){
            while($riga = mysqli_fetch_assoc($ris)){
                echo("<option value= ".$riga['data_prenotazione'].">".$riga['data_prenotazione'] ."</option>");       
            }
        }
        ?>
        </select>

         Classe: <select name="classe">
<?php
        $query="SELECT  descrizione FROM classe " ;
           $ris = mysqli_query($connection, $query);
        if(mysqli_num_rows($ris)>0){
            while($riga = mysqli_fetch_assoc($ris)){
            echo("<option value= ".$riga['descrizione'].">".$riga['descrizione'] ."</option>");       
             }
        }

               
    ?>
  
        </select>
        <br>
        RICREAZIONE:  PRIMA<input value="1" type="radio" name="ricreazione" checked> SECONDA <input value="2" type="radio" name="ricreazione"> 

       
       
        <input type="submit" value="cerca" name="cerca">
        <br>
        <br>
        <fieldset>
            <ul>
               
    <?php
       if(isset($_POST["cerca"])){
        $query= "SELECT prodotto.nome ,prenotazione_prodotto.quantita, prodotto.prezzo 
        from prodotto, prenotazione, prenotazione_prodotto, utente 
        WHERE prenotazione.data_prenotazione='".$_POST['giorni']."' 
        and prenotazione.ricreazione='".$_POST['ricreazione'] ."' 
        and utente.fk_descrizione='".$_POST['classe']."'"." 
        AND prenotazione_prodotto.fk_id_prenotazione = prenotazione.id_prenotazione 
        AND prenotazione_prodotto.fk_id_prodotto = prodotto.id_prodotto 
        AND utente.cf = prenotazione.fk_cf";
       
        $ris= mysqli_query($connection, $query);
        if(mysqli_num_rows($ris)>0){
            echo ("<tr><td>NOME PRODOTTO</td><td>QUANTITA'</td><td>PREZZO</td></tr>");
            while($riga = mysqli_fetch_assoc($ris)){
                echo ("<li>${riga['nome']}</li>");
                //print_r($riga);       
                }
            }
        }
        
    ?>  
            
            </ul>
        </fieldset>
    </form>
    <?php
       
        mysqli_close($connection);

        }
        
    ?>
</body>
</html>