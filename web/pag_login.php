<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        ul, legend{
            text-align: center;
        }
    </style>
</head>
<body>
<?php 
session_start();
$errore="";
if (isset($_SESSION['utente'])){
        echo ("bentornato");
        echo("<a href=pag_logout.php>logout</a>");
}else{
    if(isset($_SESSION['errore'])){
        $errore = $_SESSION['errore'];
    }
?>
    <form action="pag_utente.php" method="get">
    <fieldset>
    <legend>ESEGUI IL LOGIN</legend>
    <ul>
        <label>USER NAME </label><input type="text" name ="user">
    </ul>
    <ul>
        <label>PASSWORD </label><input type="password" name ="pwd">
    </ul>    
    <ul> 
        <input type="submit" name="invia" value="invia">
    </ul>
    <ul>
        <p id="errore"><?php echo($errore)?></p>
    </ul>
    </fieldset>
    </form>
<?php }
 
?>
</body>
</html>