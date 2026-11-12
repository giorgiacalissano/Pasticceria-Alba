<?php
session_start();
include("funzioni.php");
verificaSessione();
$connessione=connetti();

// controlla che l'utente abbia selezionato un prodotto prima di arrivare qui
if (!isset($_POST["nome"])) {
    echo "<h3>Seleziona un prodotto prima di continuare</h3>";
    echo "<a href='categoria.php'>Torna indietro</a>";
    exit;
}

// sanitizza il nome del prodotto per prevenire SQL injection
$nome_prodotto=mysqli_real_escape_string($connessione, $_POST["nome"]);

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
     <div class="container_prodotti">
       <div class="item_prodotti">
         <?php
         $connessione=connetti();
         $q="SELECT *
             FROM prodotti
             WHERE nome='$nome_prodotto'";
          $risposta=mysqli_query($connessione, $q);
          $numrighe=mysqli_num_rows($risposta);
          //prodotto trovato, legge i dati
          if($numrighe>0){
            $riga=mysqli_fetch_assoc($risposta);
            $categoria=$riga["categoria"];
            $prezzo=$riga["prezzo"];
            $descrizione=$riga["descrizione"];
            $ingredienti=$riga["ingredienti"];
            $allergeni=$riga["allergeni"];
            $disponibilita=$riga["disponibilita"];
            //stampa info del prodotto
            echo "<h2> $nome_prodotto </h2>";
            echo "<br>";
            echo "<h3> Informazioni sul prodotto </h3>";
            echo "<br>";
            echo "<strong> Categoria:</strong> $categoria <br/>";
            echo "<br>";
            echo "<strong> Prezzo:</strong> $prezzo € <br/>";
            echo "<br>";
            echo "<strong> Descrizione:</strong> $descrizione <br/>";
            echo "<br>";
            echo "<strong> Ingredienti :</strong> $ingredienti <br/>";
            echo "<br>";
            echo "<strong> Allergeni :</strong> $allergeni <br/>";

            //controlla disponibilità e mostra il messaggio corretto
            if ($disponibilita > 0) {
                echo "<br/>Prodotto disponibile <br/>";
            } else {
                echo "<br/>Prodotto non disponibile <br/>";
            }
            echo "<br/><a href='index.php'>Torna alla home</a>";
           }

           if(isset($connessione)){
             mysqli_close($connessione);
           }
          ?>
        </div>
      </div>
 </section>

 <footer>

     <img src="immagini/logo2.jpg" id="logo_footer">

     <p>© 2026 Pasticceria Alba</p>

 </footer>

 </body>
 </html>
