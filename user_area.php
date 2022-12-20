<?php
session_start();

if (!isset($_SESSION['loggato']) || $_SESSION['loggato'] !== true) {
    header("location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edusogno</title>
    <link rel="stylesheet" href="assets/styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>

<body>
    <?php

    include_once("./assets/styles/header.php");
    require_once('connection.php'); //connessione al db
    echo '<main>';
    echo '<div class="private">';
    echo "<h1>Ciao " . $_SESSION['nome'] . " ecco i tuoi eventi.</h1>";
    echo '<div class="events">';
    $email = $_SESSION['email'];
    $sql_select = "SELECT * FROM eventi WHERE attendees LIKE '%$email%'";
    $result = mysqli_query($connessione, $sql_select);
    $events = $result->fetch_all(MYSQLI_ASSOC);
    if (count($events) > 0) {
        foreach ($events as $event) {
            echo '<div class="event">';
            echo '<h2>' . $event['nome_evento'] . '</h2>';
            echo '<span class="date">' . $event['data_evento'] . '</span>';
            echo '<button type="button">JOIN</button>';
            echo '</div>';
        }
    } else {
        echo '<h3>Non ci sono eventi</h3>';
    }
    echo '</div>';
    echo '<div class="log-out">';
    echo '<a class="log-register logout" href="logout.php">Disconnetti</a>';
    echo '</div>';
    echo '</div>';
    echo '</main>';
    ?>


</body>

</html>