<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
        //NELLA SESSIONE SALVO NOME UTENTE E IL TIPO DELL'UTENTE E ANCHE L'ERRORE DELLA PASSWORD SE E' STATA SBAGLIATA
        include ('connessione.php');
        session_start();
        $connection=mysqli_connect($server_name,$user,$psw,$nome_db);
        if(!$connection){
           die("errore".mysqli_connect_errno());
        }
        
        if(isset($_REQUEST['invia'])){
            if(isset($_SESSION['errore'])){
                unset($_SESSION['errore']);
            }
            $query = "SELECT tipo
            from utente
            where utente='".$_REQUEST["user"] ."' AND password='".$_REQUEST["pwd"]."'";
            $ris = mysqli_query($connection, $query);
            if(mysqli_num_rows($ris)>0){
            $riga = mysqli_fetch_array($ris);
            if($riga["tipo"]=="gestore" || $riga["tipo"]== "capoclasse"){
                $_SESSION['utente']=$_REQUEST['user'];
                $_SESSION['tipo']=$riga["tipo"];
                if($riga['tipo']=="capoclasse"){
                    header("Location:formCapoclasse.php");
                }else{
                    header("Location:formGestore.php");
                }
                //echo("ciao ".$_SESSION['utente']." ruolo:".  $_SESSION['tipo'] );
                echo("<a href=pag_logout.php>logout</a>");
            }
            else if($riga["tipo"]=="alunno"){
                $_SESSION['utente']=$_REQUEST['user'];
                $_SESSION['tipo']=$riga["tipo"];
                header("Location:formStudenti.php");
            }
        
            }else{
                $_SESSION['errore']="PASSWORD ERRATA";
                header("Location:pag_login.php");
            }

        }
    ?>
</body>
</html>