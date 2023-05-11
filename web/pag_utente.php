<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
        include ('connessione.php');
        session_start();
        $connection=mysqli_connect($server_name,$user,$psw,$nome_db);
        if(!$connection){
           die("errore".mysqli_connect_errno());
        }
        if(isset($_REQUEST['invia'])){

            $query = "SELECT tipo
            from utente
            where utente='".$_REQUEST["user"] ."' AND password='".$_REQUEST["pwd"]."'";
            $ris = mysqli_query($connection, $query);
            if(mysqli_num_rows($ris)>0){
            $riga = mysqli_fetch_array($ris);
            if($riga["tipo"]=="gestore" || $riga["tipo"]== "capoclasse"){
                $_SESSION['utente']=$_REQUEST['user'];
                $_SESSION['tipo']=$riga["tipo"];
                echo("ciao ".$_SESSION['utente']." ruolo:".  $_SESSION['tipo'] );
            }
            else if($riga["tipo"]=="alunno"){
                $_SESSION['utente']=$_REQUEST['user'];
                $_SESSION['tipo']=$riga["tipo"];
                header("Location:formStudenti.php");
            }
        
            }else{
                $_SESSION['errore']="hai sbagliato la PASSWORD";
                header("Location:pag_login.php");
            }

        }
    ?>
</body>
</html>