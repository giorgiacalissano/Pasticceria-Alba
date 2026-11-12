<?php
session_start();
include("funzioni.php");
verificaSessione();

//prende username dell'utente loggato dalla sessione
$username=$_SESSION["username"];

// controlla che tutti e tre i campi del form siano stati compilati
// se manca anche solo uno, rimanda alla pagina cambia_password
if (!isset($_POST["pwd_vecchia"]) || empty($_POST["pwd_vecchia"]) ||
    !isset($_POST["pwd_nuova"]) || empty($_POST["pwd_nuova"]) ||
    !isset($_POST["verifica_pwd"]) || empty($_POST["verifica_pwd"])) {
	header("location:cambia_password.php");
  exit;
}

$connessione=connetti();
// sanitizza i dati del form per prevenire SQL injection
$pwd_vecchia=mysqli_real_escape_string($connessione,$_POST["pwd_vecchia"]);
$pwd_nuova=mysqli_real_escape_string($connessione,$_POST["pwd_nuova"]);
$verifica_pwd=mysqli_real_escape_string($connessione,$_POST["verifica_pwd"]);

// verifica che la vecchia password inserita sia corretta
// cerca nel database un utente con quello username e quella password
$q1="SELECT password
    FROM utenti
    WHERE username='$username' && password='$pwd_vecchia'";
$risposta1=mysqli_query($connessione, $q1);
$numrighe=mysqli_num_rows($risposta1);

// se non trova nessuna riga significa che la vecchia password è sbagliata
if($numrighe==0){
  echo "<a href='cambia_password.php'>La vecchia password è sbagliata. Riprova </a>";
  exit;
}

// controlla che la nuova password abbia almeno 8 caratteri
if(strlen($pwd_nuova)<8){
  echo "<a href='cambia_password.php'> La password deve contenere almeno 8 caratteri </a>";
  exit;
}

// controlla che la nuova password e la verifica corrispondano
if($pwd_nuova!= $verifica_pwd){
  echo "<a href='cambia_password.php'> Le due password non corrispondono </a>";
  exit;
}
// tutti i controlli sono passati: aggiorna la password nel database
$q2="UPDATE utenti
     SET password='$pwd_nuova'
     WHERE username='$username'";
$risposta2=mysqli_query($connessione, $q2);

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
     <h2> Password aggiornata con successo! </h2>
     <h2> <a href='profilo.php'> Torna al profilo </a> </h2>
  </div>
 </div>
</section>


<footer>

    <img src="immagini/logo2.jpg" id="logo_footer">

    <p>© 2026 Pasticceria Alba</p>

</footer>

</body>
</html>
