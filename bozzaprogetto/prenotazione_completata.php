<?php
session_start();
include("funzioni.php");
verificaSessione();

unset($_SESSION["carrello"]);
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
       <div class='container_2'>
        <div class='item_2'>
        <h2> Prenotazione completata con successo! </h2>
        <br>
        <p> Grazie per aver effettuato la prenotazone presso Pasticceria Alba </p>
        <br>
        <p> Ti aspettiamo in negozio per il ritiro </p>
        <br>
        <a href="index.php" class="btn_home"> Torna alla home </a>
     </div>
    </div>

 </section>





 <footer>

     <img src="immagini/logo2.jpg" id="logo_footer">

     <p>© 2026 Pasticceria Alba</p>

 </footer>

 </body>
 </html>
