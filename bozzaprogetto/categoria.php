<?php
session_start();
include("funzioni.php");
verificaSessione();

$connessione = connetti();

// Controlla se la categoria è stata inviata tramite POST (arrivo dalla pagina precedente)
if (isset($_POST["categoria"])) {
    // Se presente, la sanitizza per evitare SQL injection
    $categoria = mysqli_real_escape_string($connessione, $_POST["categoria"]);
    //salva la categoria nela sessione per mantenerla nella pagine succesive
    $_SESSION["categoria"] = $categoria;

    //se non arriva da POST, prova a recuperarla dalla sessione
}elseif (isset($_SESSION["categoria"])) {
    $categoria = $_SESSION["categoria"];
    
    //se non esiste ne in POST ne in sessione, significa che utente non ha selezionato niente
}else {
    echo "<h3>Errore: nessuna categoria selezionata</h3>";
    echo "<a href='index.php'>Torna alla home</a>";
    exit;
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
         <li class="menu" id="home"><a href="index.php" title="Home Pasticceria Alba">Home</a></li>
         <li class="menu"><a href="torte.php" title="Prodotti: torte">Torte</a></li>
         <li class="menu"><a href="sfogliati.php" title="Prodotti: sfogliati">Sfogliati</a></li>
         <li class="menu"><a href="pasticcini.php" title="Prodotti: pasticcini">Pasticcini</a></li>
         <li class="menu"><a href="monoporzioni.php" title="Prodotti: monoporzioni">Monoporzioni</a></li>
     </ul>
 </nav>


 <section>
     <div class="container_2">
       <div class="item_2">
         <h2> Scegli un prodotto </h2>
         <form action="scegli_prodotto.php" method="post">
           <?php
           $connessione=connetti();
           //prende tutti i prodotti della categoria selezionata
           $q= "SELECT nome
                FROM prodotti
                WHERE categoria='$categoria'";
            $risposta=mysqli_query($connessione, $q);
            $numrighe=mysqli_num_rows($risposta);
            if($numrighe>0){
            foreach($risposta as $riga){
              $nome_prodotto=$riga["nome"];
              echo "<input type='radio' name='nome' value='$nome_prodotto'/> $nome_prodotto <br/>";
              }
              echo "<br/><input type='submit' name='cerca' value='Cerca'/>";
              echo "<br/> <br/><a href='index.php'>Torna alla home</a>";
              }else{
              echo "<h3> Nessun prodotto trovato </h3>";
              echo "<br/> <br/><a href='index.php'>Torna alla home</a>";
            }
            if(isset($connessione)){
              mysqli_close($connessione);
            }
            ?>
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
