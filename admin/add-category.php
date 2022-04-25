<?php include('partials/menu.php'); ?>

<div class="main-content">
  <div class="wrapper">
    <h1>Add Category</h1>
    <br>


    <?php
    if (isset($_SESSION['add'])) {
      echo $_SESSION['add'];
      unset($_SESSION['add']);
    }

    if (isset($_SESSION['upload'])) {
      echo $_SESSION['upload'];
      unset($_SESSION['upload']);
    }

    ?>

    <br> <br>

    <!-- Dodawanie kategorii -->
    <form action="" method="POST" enctype="multipart/form-data">
      <table class="tbl-30">
        <tr>
          <td>Title:</td>
          <td>
            <input type="text" name="title" placeholder="Tytul Kategorii">
          </td>
        </tr>

        <tr>
          <td>Select Image: </td>
          <td>
            <input type="file" name="image">
          </td>
        </tr>

        <tr>
          <td>Featured:</td>
          <td>
            <input type="radio" name="featured" value="Yes"> Yes
            <input type="radio" name="featured" value="No"> No
          </td>
        </tr>

        <tr>
          <td>Active:</td>
          <td>
            <input type="radio" name="active" value="Yes"> Yes
            <input type="radio" name="active" value="No"> No
          </td>
        </tr>

        <tr>
          <td colspan="2">
            <input type="submit" name="submit" value="Add Category" class="btn-secondary">
          </td>
        </tr>

      </table>
    </form>
    <!-- Dodawanie kategorii się kończy -->

    <?php

    if (isset($_POST['submit'])) 
    {
      $title = $_POST['title'];

      if (isset($_POST['featured'])) 
      {
        $featured = $_POST['featured'];
      } 
      else 
      {
        // Ustawienie domyslnie "No"
        $featured = "No";
      }
      if (isset($_POST['active'])) 
      {
        $active = $_POST['active'];
      } 
      else 
      {
        $active = "No";
      }

      if(isset($_FILES['image']['name']))
      {
        $image_name = $_FILES['image']['name'];
        $source_path = $_FILES['image']['tmp_name'];
        $destination_path = "../images/category/".$image_name;

        // $upload = move_uploaded_file($source_path, $destination_path);
        // if($upload==false)
        // {
        //     $_SESSION['upload'] = "<div class='error'>Nie udalo sie dodac</div>";
        //     header('location:'.SITEURL.'admin/add-category.php');
        //     die();
        // }
      }
      else 
      {
        $image_name = "";
      }

      // Insertowanie dane do bazy
      $sql = "INSERT INTO categories SET 
      title='$title',
      image_name='$image_name',
      featured='$featured',
      active='$active'
      ";

      $res = mysqli_query($conn, $sql);
      
      if ($res == true) {
        $_SESSION['add'] = "<div class='success'> Kategoria dodana pomyslnie </div>";
        header('location:' . SITEURL . 'admin/manage-categories.php');
      } else {
        $_SESSION['add'] = "<div class='error'> Kategoria nie dodana pomyslnie </div>";
        header('location:' . SITEURL . 'admin/add-category.php');
      }
    }
    ?>

  </div>
</div>

<?php include('partials/footer.php'); ?>