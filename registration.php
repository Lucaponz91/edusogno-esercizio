<?php
require_once('connection.php');

if (isset($_POST['register'])) {
    $user_name = $_POST['username'] ?? '';
    $user_surname = $_POST['usersurname'] ?? '';
    $password = $_POST['password'] ?? '';
    $email = $_POST['email'] ?? '';
   
    $pwdLenght = mb_strlen($password);
    
    if (empty($user_name)  || empty($user_surname) || empty($password) || empty($email)) {
        $msg = 'Compila tutti i campi %s';
    } 
   
    else {
        

        $query = "
            SELECT id
            FROM users
            WHERE username = :username
        ";
        
        $check = $pdo->prepare($query);
        $check->bindParam(':username', $user_name, PDO::PARAM_STR);
        $check->bindParam(':usersurname', $user_surname, PDO::PARAM_STR);

        $check->execute();
        
        $user = $check->fetchAll(PDO::FETCH_ASSOC);
        
        if (count($user) > 0) {
            $msg = 'Username già in uso %s';
        } else {
            $query = "
                INSERT INTO users
                VALUES (0, :username, :password)
            ";
        
            $check = $pdo->prepare($query);
            $check->bindParam(':username', $user_name, PDO::PARAM_STR);
            $check->bindParam(':usersurname', $user_surname, PDO::PARAM_STR);
            $check->bindParam(':password', $password_hash, PDO::PARAM_STR);
            $check->execute();
            
            if ($check->rowCount() > 0) {
                $msg = 'Registrazione eseguita con successo';
            } else {
                $msg = 'Problemi con l\'inserimento dei dati %s';
            }
        }
    }
    
    printf($msg, '<a href="../register.html">torna indietro</a>');
}