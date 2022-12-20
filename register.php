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
        <script src="assets/js/script.js" defer></script> 
    </head>
    <body>
        <?php  
            //connetto il database
            require_once ('connection.php');
            // escape string riferito al charset

            $name = $connessione->real_escape_string ($_POST['firstName']);
            $surname = $connessione->real_escape_string ($_POST['lastName']);
            $email = $connessione->real_escape_string ($_POST['email']);
            $password = $connessione->real_escape_string ($_POST['password']);
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // controllo che l'email non sia già nel db
            $sql_select = "SELECT * FROM utenti WHERE email = '$email'";
            if($connessione->query($sql_select)->num_rows == 0){
                // controllo a buon fine: inserisco nel db
                $sql = "INSERT INTO utenti (nome,cognome,email, password) VALUES ('$name','$surname','$email','$hashed_password')";
                if($connessione->query($sql) === true){
                    echo '<p style="background-color:green;">Registrazione effettuata con successo</p>';
                    header('Refresh:4; URL=index.php');
                
                }else{
                    echo 'Errore durante la registrazione di un nuovo account utente $sql. ' . $connessione->error;
            }}else{
                echo '<p style="background-color:yellow;">Email già registrata</p>';
                header('Refresh: 4; URL=registration.php');
            }

            
        ?>
    </body>
</html>