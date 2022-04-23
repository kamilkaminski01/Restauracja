<?php include('../config/constants.php'); ?>

<html>
    <head>
        <title>Login - Panel Administracyjny</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br> <br>

            <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
            <br> <br>

            <!-- Form logowania -->
            <form action="" method="POST" class="text-center">

            Nazwa uzytkownika:
            <br> <br>
            <input type="text" name="username" placeholder="Podaj nazwe uzytkownika">
            <br><br>
            Haslo:
            <br> <br>
            <input type="password" name="password" placeholder="Podaj haslo">
            <br><br>
            <input type="submit" name="submit" value="Login" class="btn-primary">
            </form>
            <br> <br>
            <!-- Form logowania sie konczy -->
            <p class="text-center">Created by <a href="#">Kamil Kaminski</a></p>
        </div>

    </body>
</html>

<?php

    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM admins WHERE username='$username' AND password='$password'";

        $res = mysqli_query($conn, $sql);
    }

    // Policzenie wierszy i sprawdzenie czy admin istnieje
    $count = mysqli_num_rows($res);

    if($count == 1)
    {
        $_SESSION['login'] = "<div class='success'> Logowanie sie udalo </div>";
        
        // Sprawdzenie czy admin jest zalogowany a wylogowanie unsetuje go
        $_SESSION['user'] = $username;

        header('location:'.SITEURL.'admin/home.php');
    }
    else
    {
        $_SESSION['login'] = "<div class='error text-center'> Nie udalo sie zalogowac </div>";
        header('location:'.SITEURL.'admin/login.php');
    }

?>