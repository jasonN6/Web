<?php
    $dsn = 'mysql:host=localhost;dbname=D00194632';
    $username = 'root';
    $password = '';
    
//     $dsn = 'mysql:host=localhost;dbname=D00194632';
//     $username = 'D00194632';
//    $password = 'cPuZDVy^';
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>