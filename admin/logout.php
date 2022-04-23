<?php 
    include('../config/constants.php');
    
    // Zniszczenie sesji i przekierowanie do strony logowania
    session_destroy();
    header('location:'.SITEURL.'admin/login.php');
?>