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

/* stile per i campi input numero e textarea */
input[type=number],
textarea {
    background-color: #FFF8FB;
    border: 1px solid #E8D7A6;
    padding: 10px;
    width: 90%;
    border-radius: 8px;
    color: #2E2A28;
}

/* sovrascrive la larghezza per gli input numero, più piccoli dei textarea */
input[type=number] {
    width: 12%;
}

/* stile quando l'utente clicca dentro un campo (focus) */
input[type=number]:focus,
textarea:focus {
    outline: none;
    border: 2px solid #d9c48a;
    box-shadow: 0 0 5px rgba(232, 215, 166, 0.5);
}

/* stile del contenitore del form */
.item_2 {
    width: 600px;
    background-color: #ffffff;
    border-radius: 15px;
    border: 1px solid #F3E6EB;
    padding: 30px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
}

/* sovrascrive la larghezza solo per l'input prezzo */
input.prezzo {
    width: 30% !important;
}

/* sovrascrive la larghezza solo per l'input disponibilita */
input.disponibilita {
    width: 30% !important;
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
    <h2> Aggiungi un prodotto </h2> <br/>
    <form action="salva_prodotto.php" method="post">
     <label for="nome"> Inserisci il nome </label> <br/>
     <input type="text" name="nome" id="nome" value="" size="20" maxlength="50"  />
     <br/> <br/>
     <label for="categoria">Seleziona la categoria</label><br>
     <select name="categoria" id="categoria">
    <option value="">-- Scegli una categoria --</option>
    <option value="Torte">Torte</option>
    <option value="Sfogliati">Sfogliati</option>
    <option value="Pasticcini">Pasticcini</option>
    <option value="Monoporzioni">Monoporzioni</option>
    </select>
    <br><br>
     <label for="prezzo"> Inserisci il prezzo </label> <br/>
     <input type="number" name="prezzo" id="prezzo" min="0" class="prezzo"/>
     <br/> <br/>
     <label for="disponibilita"> Inserisci la disponibilità </label> <br/>
     <input type="number" name="disponibilita" id="disponibilita" min="0" class="disponibilita"  />
     <br/> <br/>
     <label for="descrizione"> Inserisci la descrizione </label> <br/>
     <textarea name="descrizione" id="descrizione" rows="10" cols="40" > </textarea>
     <br/> <br/>
     <label for="ingredienti"> Inserisci gli ingredienti </label> <br/>
     <textarea name="ingredienti" id="ingredienti" rows="10" cols="40" > </textarea>
     <br/> <br/>
     <label for="allergeni"> Inserisci gli allergeni </label> <br/>
     <textarea name="allergeni" id="allergeni" rows="4" cols="25" > </textarea>
     <br/> <br/>
     <input type="submit" name="aggiungi" value="Aggiungi" />
     <br/> <br/>
   </form>
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
