<?php

$host =	"127.0.0.1";
$user = "root";
$pwd =	"root";
$db = "edusogno";
$port = "8889";

$connessione = new mysqli ($host,$user,$pwd,$db,$port);

if($connessione === false){
    die("Tentativo di connessione fallito. Errore: " . $connessione->connect_error);
} echo "Connessione Riuscita!";

?>