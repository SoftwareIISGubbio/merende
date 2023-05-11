<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 
</head>
<body>
    <h1>STUDENTE</h1>
    <p>per fare il <a href=pag_logout.php>logout</a> premi qua</p>
    

    <?php
      include('connessione_db.php');
      session_start();
        $connection=mysqli_connect($server_name,$user,$psw,$nome_db);
        if(!$connection){
           die("errore".mysqli_connect_errno());
        }
        //print_r($_SESSION);
        if(isset($_SESSION['utente'])){
         
    ?>
        <form method="POST" action="formStudenti.php">
            GIORNI: <select name="giorni">
    <?php
        $query=    "SELECT prenotazione.data_prenotazione, prenotazione.id_prenotazione, utente.nome
        FROM prenotazione, utente
        WHERE utente.tipo= 'alunno' AND prenotazione.fk_cf = utente.cf AND utente.utente ='".$_SESSION['utente']."'" ;
        echo ($query);
        $ris = mysqli_query($connection, $query);
        if(mysqli_num_rows($ris)>0){
            while($riga = mysqli_fetch_assoc($ris)){
                print_r($riga);
                echo("<option value= ".$riga['id_prenotazione'].">".$riga['data_prenotazione']." ".$riga['nome'] ."</option>");       
            }
        }

    ?>
  

    
        <br>
        <input type="submit" value="cerca" name="invia">
        
    <?php
       
        
    ?>
    </form>
    <?php
       
        mysqli_close($connection);

        }
        
    ?>
</body>
</html>