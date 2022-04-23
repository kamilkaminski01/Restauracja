<?php

    include('../config/constants.php');

    // Przechwytanie ID admina do usuniecia
    echo $id = $_GET['id'];

    // SQL zeby usunac admina
    $sql = "DELETE FROM admins WHERE id=$id";
    $res = mysqli_query($conn, $sql);

    // Sprawdzenie czy sie udalo
    if ($res == TRUE) {
        $_SESSION['delete'] = "<div class='success'>Admin usuniety prawidlowo </div>";
        header('location:' . SITEURL . 'admin/manage-admin.php');
    } else {
        $_SESSION['delete'] = "<div class='error'>Admin nie usuniety prawidlowo</div>";
        header('location:' . SITEURL . 'admin/manage-admin.php');
    }
?>