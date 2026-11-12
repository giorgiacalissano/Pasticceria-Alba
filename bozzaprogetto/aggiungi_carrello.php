<?php
session_start();
include("funzioni.php");
verificaSessione();

// controlla che id e quantita siano arrivati dal form
// se mancano, rimanda alla home
if(!isset($_POST["id"]) || !isset($_POST["quantita"])){
  header("location: index.php");
  exit;
}
$id = $_POST["id"];
$quantita = $_POST["quantita"];

$connessione = connetti();
// sanitizza i dati per prevenire SQL injection
$id=mysqli_real_escape_string($connessione, $_POST["id"]);
$quantita=mysqli_real_escape_string($connessione, $_POST["quantita"]);

// cerca nel database il prodotto con quell'id
$q = "SELECT nome, prezzo, categoria
          FROM prodotti
          WHERE id = $id";
$risposta = mysqli_query($connessione, $q);

$riga = mysqli_fetch_assoc($risposta);
// salva i dati del prodotto in variabili
$nome = $riga["nome"];
$prezzo = $riga["prezzo"];
$categoria = $riga["categoria"];

// se il carrello non esiste ancora nella sessione, lo crea come array vuoto
if (!isset($_SESSION["carrello"])) {
    $_SESSION["carrello"] = [];
}
// aggiunge il prodotto al carrello nella sessione
// [] alla fine significa "aggiungi in fondo all'array" senza sovrascrivere gli altri
$_SESSION["carrello"][] = [
    "nome" => $nome,
    "quantita" => $quantita,
    "categoria" => $categoria,
    "prezzo" => $prezzo
];

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
          echo "<h2> Prodotto aggiunto al carrello! </h2><br>";
          echo "<p> <strong>Prodotto:</strong> $nome <p><br>";
          echo "<p> <strong> Quantita:</strong> $quantita </p><br>";
          // in base alla categoria del prodotto appena aggiunto
          // mostra il link per continuare gli acquisti nella stessa categoria
          if($categoria=="Torte"){
            echo "<p><a href='torte.php'> Continua gli acqusiti</a></p>";
            echo "<p><a href='carrello.php'> Vai al carrello</a></p>";
          }elseif ($categoria=="Sfogliati") {
            echo "<p><a href='sfogliati.php'> Continua gli acqusiti</a></p>";
            echo "<p><a href='carrello.php'> Vai al carrello</a></p>";
          }elseif($categoria=="Pasticcini"){
            echo "<p><a href='pasticcini.php'> Continua gli acqusiti</a></p>";
            echo "<p><a href='carrello.php'> Vai al carrello</a></p>";
          }elseif ($categoria=="Monoporzioni") {
            echo "<p><a href='monoporzioni.php'> Continua gli acqusiti</a></p>";
            echo "<p><a href='carrello.php'> Vai al carrello</a></p>";
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
