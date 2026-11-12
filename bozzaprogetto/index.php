<?php
session_start();
include("funzioni.php");

//se utente non ha ancora una sessiona attiva quindi  non è loggato
if(!isset($_SESSION["username"])){

  //se mancano username o password nel form, reindirizza al login
  if(!isset($_POST["username"]) || empty($_POST["username"])
  && !isset($_POST["password"]) || empty($_POST["password"])){
    header("location: login.php");
    exit();
  }else{
    //l'utente invia il form con username e password
    //connessione al db
    $connessione=connetti();
    //sanitizza i dati del form per prevenire SQL injection
    $username_post= mysqli_real_escape_string($connessione, $_POST["username"]);
    $password_post= mysqli_real_escape_string($connessione, $_POST["password"]);
    // cerca nella tabella utente con queste credenziali
    $q= "SELECT *
        FROM utenti
        WHERE username='$username_post' && password='$password_post' ";
    $risposta=mysqli_query($connessione, $q);

    $numrighe=mysqli_num_rows($risposta);
    if($numrighe>0){
      //se ce un risultato
      //legge i dati dell'utente
      $riga=mysqli_fetch_assoc($risposta);
      //salva i dati dell'utente nelle variabili di sessione
      $email=$riga["email"];
      $nome=$riga["nome"];
      $cognome=$riga["cognome"];
      $admin=$riga["admin"];
      $username=$riga["username"];
      $_SESSION["email"]=$email;
      $_SESSION["nome"]=$nome;
      $_SESSION["cognome"]=$cognome;
      $_SESSION["admin"]=$admin;
      $_SESSION["username"]=$username;
    }else{
      //nessun utente trovato con quelle credenziali -->manda al login
      header("location: login.php");
      exit();
    }
  }
}
verificaSessione();

$nome=$_SESSION["nome"];
$cognome=$_SESSION["cognome"];

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
        <li class="menu" id="home"><a href="index.php" title="Home Pasticceria Alba">Home</a></li>
        <li class="menu"><a href="torte.php" title="Prodotti: torte">Torte</a></li>
        <li class="menu"><a href="sfogliati.php" title="Prodotti: sfogliati">Sfogliati</a></li>
        <li class="menu"><a href="pasticcini.php" title="Prodotti: pasticcini">Pasticcini</a></li>
        <li class="menu"><a href="monoporzioni.php" title="Prodotti: monoporzioni">Monoporzioni</a></li>
    </ul>
</nav>

<?php
  echo "<br>";
  echo "<h2 style='text-align:center;'> Benvenuto $nome $cognome!</h2>"
?>
<section>
    <div class="container">
        <a href="torte.php">
            <div class="item" id="card_torte">Torte</div>
        </a>
        <a href="sfogliati.php">
            <div class="item" id="card_sfogliati">Sfogliati</div>
        </a>
        <a href="pasticcini.php">
            <div class="item" id="card_pasticcini">Pasticcini</div>
        </a>
        <a href="monoporzioni.php">
            <div class="item" id="card_monoporzioni">Monoporzioni</div>
        </a>
    </div>

    <div class= "container_2">
      <div class="item_2">
        <h2>Cerca un prodotto</h2>
        <h3> Seleziona una categoria </h3>
        <form action="categoria.php" method="post">
          <?php
          $connessione=connetti();
          //prende tutte la categorie distinte dalla tabella prodotti
          //DISTINCT evita i duplicati, WHERE true non applica nessun filtro (prende tutto)
          $q1= "SELECT DISTINCT categoria
               FROM prodotti
               WHERE true";
          $risultato1=mysqli_query($connessione, $q1);
          $numrighe1=mysqli_num_rows($risultato1);
          foreach($risultato1 as $riga1){
            //per ogni categoria trovata, stampa un radio button
            $categoria=$riga1["categoria"];
            echo "<input type='radio' name='categoria' value='$categoria'/> $categoria <br/>";
          }
          if(isset($connessione)){
            mysqli_close($connessione);
          }
           ?>
           <br/>
      		<input type="submit" name="cerca" value="Cerca" />
      	   <br/> <br/>
      	   </form>
      	</div>
    </div>
</section>

<footer>

    <img src="immagini/logo2.jpg" id="logo_footer">

    <p>© 2026 Pasticceria Alba</p>

</footer>

</body>
</html>
