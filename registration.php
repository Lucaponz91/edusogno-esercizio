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
        
        <h1>Crea il tuo account</h1>
        <div class="register">
            
        <form class="account" action="register.php" method="post" id="account-register">
            <label for="firstName">Inserisci il nome</label>
            <input type="text" id="firstName" placeholder="Mario" name="firstName"/>

            <label for="lastName">Inserisci il cognome</label>
            <input type="text" id="lastName" placeholder="Rossi" name="lastName" />

            <label for="email">Inserisci l'email</label>
            <input type="email" id="email" placeholder="name@example.com" name="email" />

            <label for="password">Inserisci la password</label>
            <div class="psw_box">
                <input type="password" id="password" placeholder="Scegli una password" id="password" name="password" />
                <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>

            </div>
            <input type="submit" value="REGISTRATI" />
            <a class="log-register" href="index.php">Hai già un account? <strong>Accedi</strong></a>
        </form>

        </div>
       
    </body>
</html>