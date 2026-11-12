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
        <li class="menu"><a href="sfogliati.php" title="Prodotti: sfogliati">Sfogliati</a></li>
        <li class="menu"><a href="pasticcini.php" title="Prodotti: pasticcini">Pasticcini</a></li>
        <li class="menu" id="monoporzioni"><a href="monoporzioni.php" title="Prodotti: monoporzioni">Monoporzioni</a></li>
    </ul>
</nav>

<p class="percorso"> Home > Monoporzioni </p>
<section>
  <?php
  $connessione=connetti();
  $q="SELECT *
      FROM prodotti
      WHERE categoria='Monoporzioni'";
  $risposta=mysqli_query($connessione, $q);
  //per ogni prodotto trovato nel database, stampa la sua scheda
  foreach($risposta as $riga){
    //salva i dati del prodotto in variabili
    $id=$riga["id"];
    $nome=$riga["nome"];
    $categoria=$riga["categoria"];
    $prezzo=$riga["prezzo"];
    $disponibilita=$riga["disponibilita"];
    $descrizione=$riga["descrizione"];
    $ingredienti=$riga["ingredienti"];
    $allergeni=$riga["allergeni"];
    $immagine=$riga["immagine"];
    echo "<img src= 'immagini/$immagine' class='prodotti'>";
echo "<div class='float'>";
    echo "<h2> $nome </h2>";
    echo "<br>";
    echo "<p class='prezzi'> $prezzo €</p>";
    echo "<br>";
    //gli input hidden trasportano dati necessari alla pagina successiva
    // per eleborare la richiesta senza mostrarli all'utente nella pagina
    echo "<form action='aggiungi_carrello.php' method='post'>";
    echo "<input type='hidden' name='id' value='$id'>";
    echo "<label>Quantità:</label>";
    echo "<input type='number' name='quantita' value='1' min='1' max='10'>";
    echo "<input type='submit' value='Aggiungi al carrello'>";
    echo "<input type='hidden' name='categoria' value='$categoria'>";
    echo "</form>";
echo "</div>";

echo "<div class='clear'>";
  echo "<h3>Descrizione</h3>";
  echo "<p> $descrizione </p><br>";
  echo "<h3>Ingredienti</h3>";
  echo "<p> $ingredienti</p> <br>";
  echo "<h3> Allergeni </h3>";
  echo "<p> $allergeni</p><br>";
echo "</div>";
echo "<hr>";
};
?>
</section>

<footer>

    <img src="immagini/logo2.jpg" id="logo_footer">

    <p>© 2026 Pasticceria Alba</p>

</footer>

</body>
</html>
