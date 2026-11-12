<?php
session_start();
include("funzioni.php");
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
    <h2> Registrati </h2> <br/>
    <form action="conferma_registrazione.php" method="post">
     <label for="nome"> Inserisci il tuo nome </label> <br/>
     <input type="text" name="nome" id="nome" value="" size="20" maxlength="20"  />
     <br/> <br/>
     <label for="cognome"> Inserisci il tuo cognome </label> <br/>
     <input type="text" name="cognome" id="cognome" value="" size="20" maxlength="20" />
     <br/> <br/>
     <label for="email"> Inserisci la tua e-mail </label> <br/>
     <input type="email" name="email" id="email" value="" />
     <br/> <br/>
   <label for="username"> Inserisci il tuo username </label> <br/>
     <input type="text" name="user" id="user" value="" size="20" maxlength="20" />
     <br/> <br/>
     <label for="password"> Inserisci la tua password </label> <br/>
     <input type="password" name="password" id="password" value="" size="20" maxlength="20"  />
     <br/> <br/>
     <label for="verifica_password"> Verifica password </label> <br/>
     <input type="password" name="verifica_password" id="verifica_password" value="" size="20" maxlength="20"  />
     <br/> <br/>
     <input type="submit" name="registrati" value="Registrati" />
     <br/> <br/>
   </form>

   <p> Hai già un account? </p>
   <form action="login.php" method="get">
    <input type="submit" value="Accedi">
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
