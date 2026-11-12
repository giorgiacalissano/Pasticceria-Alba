<?php
session_start();
include("funzioni.php");

// se l'utente non è loggato OPPURE non è amministratore (admin != 1)
if(!isset($_SESSION["username"]) || ($_SESSION["admin"])!=1){
  // se il form non è stato compilato, rimanda al login
  if(!isset($_POST["username"]) || empty($_POST["username"])
     || !isset($_POST["password"]) || empty($_POST["password"])){
     header("location: login.php");
     exit();
   }else{
     //form compilato, tenta il login e apre la connessioneal db
     $connessione=connetti();
     //sanitizza dati per prevenire SQL injection
     $username_post=mysqli_real_escape_string($connessione, $_POST["username"]);
     $password_post=mysqli_real_escape_string($connessione, $_POST["password"]);

     // cerca l'utente nel database con quelle credenziali
    // prende anche il campo admin per sapere se è amministratore
     $q="SELECT nome, cognome, email, username, admin
         FROM utenti
         WHERE username='$username_post' && password='$password_post'";
     $risposta=mysqli_query($connessione, $q);
     $numrighe=mysqli_num_rows($risposta);
     if($numrighe>0){
       //utente trovato: salva i dati nella sessione
       $riga=mysqli_fetch_assoc($risposta);
       $nome=$riga["nome"];
       $cognome=$riga["cognome"];
       $email=$riga["email"];
       $username=$riga["username"];
       $admin=$riga["admin"];
       $_SESSION["nome"]=$nome;
       $_SESSION["cognome"]=$cognome;
       $_SESSION["email"]=$email;
       $_SESSION["username"]=$username;
       $_SESSION["admin"]=$admin; //1=admin, 0=utente normale
     }else{
       //credenziali errate, rimanda alla pagina admin.php
       header("location: admin.php");
     }
     //verifico che l'utente loggato sia admin
     //se admin=0 lo blocca e lo manda al login
     verificaAdmin();
   }
}
//la sessione esite admin è verificato
//verifica validità della sessione
verificaSessione();

//recupera nome e cognome per salutare amministratore
$nome=$_SESSION["nome"];
$cognome=$_SESSION["cognome"];

if (isset($connessione)) {
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
   <?php
   echo "<h2> Bentornato $nome $cognome!</h2>";
   echo "<br>";
   ?>
   <h3> Scegli cosa vuoi fare </h3>
   <br>
   <a href="aggiungi_prodotto.php"> Aggiungi un prodotto </a> <br>
   <a href="cancella_prodotto.php"> Cancella un prodotto </a> <br>
   <a href="aggiorna_prodotto.php"> Aggiorna un prodotto </a> <br>
   <a href="elimina_utente.php"> Elimina un utente </a> <br> <br>
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
