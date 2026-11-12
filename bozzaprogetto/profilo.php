<?php
session_start();
include("funzioni.php");
verificaSessione();

// se l'utente è admin, lo reindirizza al profilo admin
if($_SESSION["admin"]==1){
  header("location:profilo_admin.php");
  exit;
}

// recupera i dati dell'utente dalla sessione per mostrarli nella pagina
$nome=$_SESSION["nome"];
$cognome=$_SESSION["cognome"];
$email=$_SESSION["email"];
$username=$_SESSION["username"];

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
   <?php
   echo "<h2> Bentornato $nome $cognome!</h2>";
   echo "<br>";
   ?>
   <h3> Le tue informazioni </h3>
   <br>
   <?php
   echo "<strong>Nome:</strong> $nome <br>";
   echo "<br>";
   echo "<strong>Cognome:</strong> $cognome <br>";
   echo "<br>";
   echo "<strong>Email:</strong> $email <br>";
   echo "<br>";
   echo "<strong>Username:</strong> $username </br>";
   ?>
   <br/>
   <a href="cambia_password.php"> Cambia la password </a> <br/>
   <a href="logout.php"> Logout </a>
   </div>
  </div>
</section>

<footer>

    <img src="immagini/logo2.jpg" id="logo_footer">

    <p>© 2026 Pasticceria Alba</p>

</footer>

</body>
</html>
