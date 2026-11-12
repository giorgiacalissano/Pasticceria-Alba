<?php
session_start();
include("funzioni.php");

// controllo che tutti i campi del form siano stati compilati
// se anche uno manca o è vuoto, torno alla pagina di registrazione
if(!isset($_POST["nome"])|| empty($_POST["nome"]) ||
   !isset($_POST["cognome"]) || empty($_POST["cognome"]) ||
   !isset($_POST["email"]) || empty($_POST["email"]) ||
   !isset($_POST["user"]) || empty($_POST["user"]) ||
   !isset($_POST["password"]) || empty($_POST["password"]) ||
   !isset($_POST["verifica_password"]) || empty($_POST["verifica_password"])){
     header("location: registrazione.php");
     exit;
   }
$connessione=connetti();
// sanitizza i dati per prevenire SQL injection
$nome=mysqli_real_escape_string($connessione,$_POST["nome"]);
$cognome=mysqli_real_escape_string($connessione,$_POST["cognome"]);
$email=mysqli_real_escape_string($connessione,$_POST["email"]);
$username=mysqli_real_escape_string($connessione,$_POST["user"]);
$password=mysqli_real_escape_string($connessione,$_POST["password"]);
$verifica_password=mysqli_real_escape_string($connessione,$_POST["verifica_password"]);


$q1="SELECT username
     FROM utenti
     WHERE username='$username'";

$risposta1=mysqli_query($connessione, $q1);
$numrighe=mysqli_num_rows($risposta1);
if($numrighe>0){
  echo "<a href='registrazione.php'> Questo username è già esistente </a>";
  exit;
}
//controllo lunghezza password
if(strlen($password)<8){
  echo "<a href='registrazione.php'> La password deve contenere almeno 8 caratteri </a>";
  exit;
}
//controllo che le due password coincidano
if($password != $verifica_password){
  echo "<a href='registrazione.php'> Le due password non corrispondono </a>";
  exit;
}
//inserimento nuovo utente nel db
$q2="INSERT INTO utenti(nome, cognome, email, username, password)
     VALUES ('$nome', '$cognome', '$email', '$username', '$password')";
$risposta2=mysqli_query($connessione, $q2);
mysqli_close($connessione);
session_unset();

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
   echo "<h2> Utente registrato con successo! </h2>";
     echo "<h2> <a href='login.php'> Fai il login </a> </h2>";
     ?>
  </div>
 </div>
</section>

<footer>

    <img src="immagini/logo2.jpg" id="logo_footer">

    <p>© 2026 Pasticceria Alba</p>

</footer>

</body>
</html>
