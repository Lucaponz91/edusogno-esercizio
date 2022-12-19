<?php

$host =	"127.0.0.1";
$user = "root";
$pwd =	"root";
$db = "edusogno";

$connessione = new mysqli ($host,$user,$pwd,$db);

if($connessione === false){
    die("Tentativo di connessione fallito. Errore: " . $connessione->connect_error);

}

?>