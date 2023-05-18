<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Prenotazione per data</title>

    <style>
        table, th, td{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <form method="POST" action="ordinePerData.php">
        DATA: <select name="data" id="data">
                <option>---</option>
        <?php
             $servername='10.1.0.52';
             $user='progetto5i';
             $psw='progetto5i';
             $db='merende';

             $connessione=mysqli_connect($servername,$user,$psw,$db);
             if(!$connessione){
                 die("errore".mysqli_connect_errno());
             }
        ?>
        <?php
             $ricercaPrenotazione = "SELECT data_prenotazione FROM prenotazione WHERE fk_cf = 'PRTLRT'"; 
             $risultato = mysqli_query($connessione, $ricercaPrenotazione);

             if(mysqli_num_rows($risultato)>0){
                while($riga = mysqli_fetch_array($risultato)){
                    echo ("<option value=${riga['data_prenotazione']}>${riga['data_prenotazione']}</option>");
                }
             }

             mysqli_close($connessione);
        ?>
        </select>
        <button type="button" onclick="premuto()">cerca</button>
       
        <br><br> 

        <section>

        </section>
        <script>
            "use strict"
            let httpRequest;
            function premuto(){
                httpRequest = new XMLHttpRequest();
                httpRequest.onreadystatechange = statoCambiato;
                httpRequest.open('GET', 'http://localhost:8000/php_progettoMerende/cercaOrdine.php?data='+data.value);
                httpRequest.send();
            }
            function statoCambiato(){
                if (httpRequest.readyState === XMLHttpRequest.DONE) {
                    if(httpRequest.status == 200){
                        let oggetto = JSON.parse(httpRequest.response);
                        let padre = document.querySelector("section");
                        padre.innerHTML = "";

                        let tabella = document.createElement("table");
                        tabella.innerHTML = "<tr><th>NOME PRODOTTO</th><th>QUANTITA'</th><th>RICREAZIONE</th></tr>"

                        padre.appendChild(tabella);

                        for(let i=0; i<oggetto.length; i++){
                            let riga = document.createElement("tr");
                            riga.innerHTML = "<td>"+oggetto[i].nome +"</td><td>"+oggetto[i].quantita +"</td><td>"+oggetto[i].ricreazione +"</td>";

                            tabella.appendChild(riga);
                        }
                    }
                }
            }
        </script>
    </form>
</body>
</html>