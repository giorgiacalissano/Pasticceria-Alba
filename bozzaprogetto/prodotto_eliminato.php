<?php
session_start();
include("funzioni.php");

verificaSessione();//se utente non è loggato lo rimanda al login
verificaAdmin(); //se utente non è admin lo rimanda al login

//prende id del prodotto da eliminare
$id=$_POST["id"];

$connessione=connetti();
//elimina il prodotto dal db con quell'id
$q="DELETE FROM Prodotti
    WHERE id='$id'";
$risposta=mysqli_query($connessione, $q);

if(isset($connessione)){
  mysqli_close($connessione);
}

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
        <li class="menu"><a href="sfogliati.php" title="Prodotti: sfogliati">Sfogliati</a></li>
        <li class="menu"><a href="pasticcini.php" title="Prodotti: pasticcini">Pasticcini</a></li>
        <li class="menu"><a href="monoporzioni.php" title="Prodotti: monoporzioni">Monoporzioni</a></li>
    </ul>
</nav>

<section>
 <div class="container_2">
  <div class="item_2">
     <h2> Prodotto eliminato con successo! </h2>
     <h2> <a href='cancella_prodotto.php'> Elimina un altro prodotto </a> </h2>
     <h2> <a href='profilo_admin.php'> Torna al profilo </a> </h2>
  </div>
 </div>
</section>

<footer>

    <img src="immagini/logo2.jpg" id="logo_footer">

    <p>© 2026 Pasticceria Alba</p>

</footer>

</body>
</html>
