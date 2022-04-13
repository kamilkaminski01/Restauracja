<?php 
    // Rozpoczecie sesji
    session_start();

    // Stale
    define('SITEURL', 'http://localhost/restauracja/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'restauracja');

    // Zapisanie danych do bazy i polaczenie z baza
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
    // Wybranie bazy danych
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
?>