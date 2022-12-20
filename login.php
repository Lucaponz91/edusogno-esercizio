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
        

        include_once("./assets/styles/header.php");
       
            require_once ('connection.php');//connessione al db

            $email = $connessione->real_escape_string ($_POST['email']);
            $password = $connessione->real_escape_string ($_POST['password']);

            if($_SERVER ["REQUEST_METHOD"] === "POST"){

                $sql_select = "SELECT * FROM utenti WHERE email = '$email'";
                if($result = $connessione->query($sql_select)){
                    if($result->num_rows == 1){
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                        if(password_verify($password,$row['password'])){
                            session_start();

                            $_SESSION['loggato'] = true;
                            $_SESSION['id'] = $row['id'];
                            $_SESSION['nome'] = $row['nome'];
                            $_SESSION['email'] = $row['email'];

                            header("location: user_area.php");
                        }else{
                            echo '<p style="background-color:yellow; padding:5px">La password inserita non è corretta.</p>';
                            header('Refresh:4; URL=index.php');
                        }
                    }else{
                        echo '<p style="background-color:yellow; padding:5px">L\'email inserita non risulta registrata.</p>';
                        header('Refresh:4; URL=index.php');
                    }
                }else{
                    echo '<p style="background-color:yellow; padding:5px">Errore, riprova</p>';
                    echo '<a href="logout.php">Torna alla pagina di Login.</a>';
                }

                $connessione->close();
            };
          
        ?>
    </body>
</html>