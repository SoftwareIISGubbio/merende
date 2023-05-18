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
    //inizializzo la sessione
    session_start();

    //controllo se l'utente è già registrato
    if(isset($_SESSION["utente"])){
        echo "ciao".$_SESSION["utente"];
        echo ("<p><a href='LogoutDati.php'>logout</a><p>");

    }else{
        //controllo se ho già pigiato il bottone "zeppa"
        if(isset($_GET["invia"])){
            //mi connetto al db con le credenziali per accedere 
            $conn = mysqli_connect("10.1.0.52","progetto5i","progetto5i","merende");
            //controllo se la connessione è andata a buon fine
            if(!$conn){
                die("errore".mysqli_connect_error());
            }
            //prendo i campi
            $u = $_GET["user"];
            $p = $_GET["pwd"];
            $sql = "select * from utente where utente='$u' and password='$p'";
            echo $sql;
            $ris = mysqli_query($conn,$sql);
            //controllo che se è maggiore di 0 l'utente esiste
            //se le righe del risultato della query sono minori di 0 non esisto
            if(mysqli_num_rows($ris)>0){
                //leggo il risultato della query
                $r = mysqli_fetch_assoc($ris);
                $_SESSION["utente"] = $r["nome"];
            }else{
                echo("non esisti");
            }
            mysqli_close($conn);

        }else{//se non ho premuto invio ci metto il form

            //action è dove mandpo quando pigia il bottone
            ?>
            <form action="Dati.php" method="get">
            <input type="text" name="user">username<br>
            <input type="password" name="pwd">password<br>
            <input type="submit" name="invia" value="Premi per entrare">

            <?php
        }
    }
    ?>

    



    
</body>
</html>