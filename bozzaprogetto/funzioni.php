<?php

function connetti(){
  $connessione=mysqli_connect("localhost", "root", "", "pasticceria_alba");
  //se la connessione fallisce, blocca tutto e mostra errore
  if(!$connessione){
    die("errore di connessione");
  }
return $connessione; //restituisce la connessione per usarla fuori dalla funzione
}

function verificaAdmin(){
  //se l'utente loggato non è admin (admin!=1)
  if($_SESSION["admin"] != 1){
    session_unset(); //svuota la sessione
    header("location:login.php"); //rimanda al login
    exit; //blocca esecuzione pagina
  }
}

function verificaSessione(){
  //se non esite la variabile di sessione username
  //utente non è loggato
  if(!isset($_SESSION["username"])){
  header("location:login.php"); //rimanda al login
  exit; //blocca esecuzione pagina
  }
}




 ?>
