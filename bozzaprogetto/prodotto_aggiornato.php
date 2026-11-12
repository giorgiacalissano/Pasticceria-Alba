<?php
session_start();
include("funzioni.php");
verificaSessione();
verificaAdmin();

// controlla che tutti i campi del form siano compilati e validi
// se anche solo uno non va, rimanda alla pagina aggiorna_prodotto
if (!isset($_POST["nome"]) || empty($_POST["nome"]) ||
    !isset($_POST["categoria"]) || empty($_POST["categoria"]) ||
    !isset($_POST["prezzo"]) || empty($_POST["prezzo"]) || $_POST["prezzo"] < 0 ||
    !isset($_POST["disponibilita"]) || empty($_POST["disponibilita"]) || $_POST["disponibilita"] < 0 ||
    !isset($_POST["descrizione"]) || empty($_POST["descrizione"]) ||
    !isset($_POST["ingredienti"]) || empty($_POST["ingredienti"]) ||
    !isset($_POST["allergeni"])   || empty($_POST["allergeni"])) {
	header("location:aggiorna_prodotto.php");
  exit;
}



$connessione=connetti();
// sanitizza tutti i dati del form per prevenire SQL injection
$id=mysqli_real_escape_string($connessione, $_POST["id"]);
$nome = mysqli_real_escape_string($connessione, $_POST["nome"]);
$categoria = mysqli_real_escape_string($connessione, $_POST["categoria"]);
$prezzo=mysqli_real_escape_string($connessione, $_POST["prezzo"]);
$disponibilita=mysqli_real_escape_string($connessione, $_POST["disponibilita"]);
$descrizione = mysqli_real_escape_string($connessione, $_POST["descrizione"]);
$ingredienti = mysqli_real_escape_string($connessione, $_POST["ingredienti"]);
$allergeni = mysqli_real_escape_string($connessione, $_POST["allergeni"]);

// aggiorna tutti i campi del prodotto nel database cercandolo per id
$q="UPDATE prodotti
    SET nome='$nome',
    categoria='$categoria',
    prezzo='$prezzo',
    disponibilita='$disponibilita',
    descrizione='$descrizione',
    ingredienti='$ingredienti',
    allergeni='$allergeni'
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
  <div class="container_table">
   <div class="item_table">
      <h2> Prodotto aggiornato con successo! </h2>
      <h2> <a href='aggiorna_prodotto.php'> Aggiorna un altro prodotto </a> </h2>
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
