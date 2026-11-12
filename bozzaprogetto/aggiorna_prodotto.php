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
      <h2> Aggiorna un prodotto </h2>
      <table>
        <tr>
            <th> Id </th>
            <th> Nome </th>
            <th> Categoria </th>
            <th> Prezzo </th>
            <th> Disponibilita </th>
            <th> Descrizione </th>
            <th> Ingredienti </th>
            <th> Allergeni </th>
        </tr>
      <?php
      $connessione=connetti();
      //prende tutti i prodotti dal db
      $q="SELECT *
          FROM prodotti
          WHERE true";
      $risposta=mysqli_query($connessione, $q);
      //per ogni prodotto prende le sue info e crea una riga dela tabella con i suoi dati
      foreach($risposta as $riga){
        $id=$riga["id"];
        $nome=$riga["nome"];
        $categoria=$riga["categoria"];
        $prezzo=$riga["prezzo"];
        $disponibilita=$riga["disponibilita"];
        $descrizione=$riga["descrizione"];
        $ingredienti=$riga["ingredienti"];
        $allergeni=$riga["allergeni"];
        echo "<tr>";
        echo "<form action='prodotto_aggiornato.php' method='post'>";
        echo "<td>$id</td>"; //id non modificiabile, viene solo mostrato
        // ogni campo è un input già compilato con il valore attuale del prodotto
        // l'admin può modificarli direttamente nella tabella
        echo "<td><input type='text' name='nome' value='$nome'></td>";
        echo "<td><input type='text' name='categoria' value='$categoria'></td>";
        echo "<td><input type='number' name='prezzo' min='0' value='$prezzo'> </td>";
        echo "<td><input type='number' name='disponibilita' min='0' value='$disponibilita'></td>";
        echo "<td><input type='text' name='descrizione' value='$descrizione'></td>";
        echo "<td><input type='text' name='ingredienti' value='$ingredienti'></td>";
        echo "<td><input type='text' name='allergeni' value='$allergeni'></td>";
        // input hidden: manda l'id a prodotto_aggiornato.php in modo invisibile
        // serve per sapere quale prodotto aggiornare nel database
        echo "<td> <input type='hidden' name='id' value='$id'> <input type='submit' value='Aggiorna'> </td>";

echo "</form>";

echo "</tr>";
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
