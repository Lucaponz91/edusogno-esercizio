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
        
        <h1>Hai già un account</h1>
        <div class="register">
            
        <form class="account" action="login.php" method="post" id="login">
            <label for="email">Inserisci l'email</label>
            <input type="email" id="email" placeholder="name@example.com" name="email" required/>

            <label for="password">Inserisci la password</label>
            <div class="togglePwd">
                <input type="password" id="password" placeholder="Scrivila qui" name="password" required/>
                <i class="far fa-eye" id="togglePassword" style="margin-left: -25px; cursor: pointer;"></i>
            </div>
            <input type="submit" value="ACCEDI" />
            <a class="log-register" href="registration.php">Non hai ancora un profilo? <strong>Registrati</strong></a>
        </form>

        </div>
        
    </body>
</html>