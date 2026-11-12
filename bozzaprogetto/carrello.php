<?php
session_start();
include("funzioni.php");
verificaSessione();

 ?>

 <!DOCTYPE html>
 <html lang="it">

 <head>
     <meta charset="UTF-8">
     <title>Pasticceria Alba</title>

     <meta name="keywords" content="pasticceria, dolci, torte, prenotazioni, login, registrazione">
     <meta name="description" content="Pasticceria Alba: prenota torte e dolci artigianali">
     <meta name="author" content="Giorgia Calissano">
     <link rel="stylesheet" href="style.css">
     <link rel="shortcut icon" href="immagini/logo2.jpg" />
 </head>

 <body>

 <header>

     <a href="index.php" title="Home Pasticceria Alba">
         <img src="immagini/logo2.jpg" alt="Pasticceria Alba" id="logo">
     </a>
     <div class="header-icons">
       <a href="profilo.php">
         <img src="immagini/login.gif" class="icone" alt="Profilo">
       </a>
       <a href="carrello.php" title="Prenotazioni">
           <img src="immagini/carrello.gif" class="icone" alt="Prenotazioni">
       </a>
     <a href="logout.php"> Logout </a>
 </div>

 </header>

 <nav>
     <ul>
         <li class="menu"><a href="index.php" title="Home Pasticceria Alba">Home</a></li>
         <li class="menu"><a href="torte.php" title="Prodotti: torte">Torte</a></li>
         <li class="menu"><a href="sfogliati.php" title"Prodotti: sfogliati">Sfogliati</a></li>
         <li class="menu"><a href="pasticcini.php" title="Prodotti: pasticcini">Pasticcini</a></li>
         <li class="menu"><a href="monoporzioni.php" title="Prodotti: monoporzioni">Monoporzioni</a></li>
     </ul>
 </nav>


 <section>
       <?php
        echo "<div class='container_2'>";
        echo "<div class='item_2'>";
        echo "<h2> Il tuo carrello </h2>";
        echo "<br>";
        //controllo se carrello non eiste o è vuoto, mostrando messaggio di errore
           if(!isset($_SESSION["carrello"]) || count($_SESSION["carrello"])==0){
             echo "<p> Il carrello è vuoto </p>";
             echo "<a href='index.php' class='btn_home'>Torna alla home </a>";
           }else{
             //inizializzo il totale del carrello a 0
          $totaleCarrello=0;
          //estraggo le informazioni per mostrarle nel carrello
           foreach($_SESSION["carrello"] as $item){
             echo "<p><strong> Prodotto: </strong>" .$item["nome"]. "</p>";
             echo "<p><strong> Quantita aggiunta nel carrello: </strong>" .$item["quantita"]. " prodotto/i </p>";
             echo "<p><strong> Prezzo per singolo prodotto: </strong>" .$item["prezzo"]. "€</p>";
             $totaleProdotti= $item["prezzo"] * $item["quantita"];
             $totaleCarrello=$totaleCarrello + $totaleProdotti;
             echo "<br>";
           }
           echo "<h3>Totale carrello: ".$totaleCarrello." €</h3>";
           echo "<a href='prenotazione_completata.php' class='btn_prenota'>Prenota</a>";
           echo "<a href='svuota_carrello.php' class='btn_svuota'>Svuota carrello</a>";
         }
     echo "</div>";
     echo "</div>";
     ?>
 </section>





 <footer>

     <img src="immagini/logo2.jpg" id="logo_footer">

     <p>© 2026 Pasticceria Alba</p>

 </footer>

 </body>
 </html>
