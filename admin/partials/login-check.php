<?php
  // Sprawdzenie czy uzytkownik jest zalogowany czy nie
  if(!isset($_SESSION['user']))
  {
    $_SESSION['no-login-message'] = "<div class='error text-center'> Zaloguj sie aby uzyskac dostep </div>";
    header('location:'.SITEURL.'admin/login.php');
  }
?>