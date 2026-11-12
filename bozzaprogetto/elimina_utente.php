<?php
session_start();
include("funzioni.php");
verificaSessione();
verificaAdmin();
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
    <style type="text/css">
        .item_2 {
	        width: 800px;
         }
    </style>
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
     <h2> Cancella un utente </h2>
     <table>
       <tr>
           <th> Nome </th>
           <th> Cognome </th>
           <th> Username </th>
           <th> Elimina </th>
       </tr>
    <?php
    $connessione=connetti();
    //seleziona nome, cognome e username di tutti gli utenti
    $q= "SELECT nome, cognome, username
         FROM utenti
         WHERE true";
    $risposta=mysqli_query($connessione, $q);
    foreach($risposta as $riga){
      $nome=$riga["nome"];
      $cognome=$riga["cognome"];
      $username=$riga["username"];
      echo "<form action='utente_eliminato.php' method='post'>";
      echo "<tr>";
      echo "<td> $nome </td>";
      echo "<td> $cognome </td>";
      echo "<td> $username </td>";
      echo "<input type='hidden' name='username' value='$username'/>";
      echo "<td> <input type='submit' name='elimina' value='Elimina' /></td>";
      echo "</tr>";
      echo "</form>";
    }

    if(isset($connessione)){
      mysqli_close($connessione);
    }

     ?>
   </table>
   <br>
   <p> <a href="profilo_admin.php"> Torna al profilo </a> </p>
 </div>
</div>
</section>

<footer>

    <img src="immagini/logo2.jpg" id="logo_footer">

    <p>© 2026 Pasticceria Alba</p>

</footer>

</body>
</html>
