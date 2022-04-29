<?php
    include('../config/constants.php');

    // Sprawdzenie czy podano id i nazwe zdjecia
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];
        
        // if($image_name != "")
        // {
        //     $path = "../images/".$image_name;
            
        //     // Usuniecie zdjecia
        //     $remove = unlink($path);
        //     if($remove == false)
        //     {
        //         $_SESSION['remove'] = "<div class='error'>Nie udalo sie usunac zdjecia kategorii</div>";
        //         header('location:'.SITEURL.'admin/manage-categories.php');
        //         die();
        //     }
        // }

        // Usuniecie z bazy danych
        $sql = "DELETE FROM categories WHERE id=$id";
        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            $_SESSION['delete'] = "<div class='success'>Udalo sie usunac kategorie</div>";
            header('location:'.SITEURL.'admin/manage-categories.php');
        }
        else
        {
            $_SESSION['delete'] = "<div class='error'>Nie udalo sie usunac kategorii</div>";
            header('location:'.SITEURL.'admin/manage-categories.php');
        }
    }
    else
    {
        header('location:'.SITEURL.'admin/manage-categories.php');
    }

?>