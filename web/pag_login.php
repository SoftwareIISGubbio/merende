<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
      background-color: #f1f1f1;
      font-family: Arial, sans-serif;
    }

    .container {
      width: 300px;
      margin: 0 auto;
      margin-top: 100px;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    }

    h1 {
      text-align: center;
    }

    input[type="text"],
    input[type="password"] {
      width: 93%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    input[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #4caf50;
      border: none;
      color: #fff;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      border-radius: 3px;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }
    #errore{
        text-align:center;
        font-weight: bold;
        color: red;
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
    <div class="container">
    <h1>Login</h1>
    <form action="pag_utente.php" method="get">
      <input type="text" name="user" placeholder="Username" required>
      <input type="password" name="pwd" placeholder="Password" required>
      <input type="submit" value="Accedi" name="invia">
      <p id="errore"><?php echo($errore)?></p>
    </form>
  </div>
<?php }
 
?>
</body>
</html>