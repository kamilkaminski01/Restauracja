<?php
    include('../config/constants.php');

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

    
        $sql = "DELETE FROM foods WHERE id=$id";
        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            $_SESSION['delete'] = "<div class='success'>Udalo sie usunac jedzenie</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
        else
        {
            $_SESSION['delete'] = "<div class='error'>Nie udalo sie usunac jedzenia</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
    }
    else
    {
        header('location:'.SITEURL.'admin/manage-food.php');
    }
    
?>