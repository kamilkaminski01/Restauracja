<?php include('partials/menu.php'); ?>

<div class="main-content">
  <div class="wrapper">
    <h1>Add Food</h1>
    <br /><br />

    <?php
      if(isset($_SESSION['']))
      {
        
      }
    ?>

    <!-- Dodawanie jedzenia -->
    <form action="" method="POST" enctype="multipart/form-data">
      <table class="tbl-30">
        <tr>
          <td>Title:</td>
          <td>
            <input type="text" name="title" placeholder="Tytul jedzenia" />
          </td>
        </tr>
        <tr>
          <td>Description:</td>
          <td>
            <textarea name="description" cols="30" rows="5" placeholder="Opis jedzenia"></textarea>
          </td>
        </tr>
        <tr>
          <td>Price:</td>
          <td>
            <input type="number" name="price" />
          </td>
        </tr>
        <tr>
          <td>Select image:</td>
          <td>
            <input type="file" name="image" />
          </td>
        </tr>
        <tr>
          <td>Category:</td>
          <td>
            <select name="category">

              <?php 
                // Wybor kategorii na podstawie tego, czy kategoria jest active
                $sql = "SELECT * FROM categories WHERE active='Yes'";
                $res = mysqli_query($conn, $sql);
                
                $count = mysqli_num_rows($res);

                if($count > 0)
                {
                  while($row=mysqli_fetch_assoc($res))
                  {
                    $id = $row['id'];
                    $title = $row['title'];
                    ?>

                    <option value="<?php echo $id;?>"><?php echo $title; ?></option>

                    <?php
                  }
                }
                else
                {
                  ?>
                  <option value="0">Nie znaleziono kategorii</option>
                  <?php
                }
                

              ?>
            </select>
          </td>
        </tr>
        <tr>

            
          <td>Featured:</td>
          <td>
            <input type="radio" name="featured" value="Yes" /> Yes
            <input type="radio" name="featured" value="No" /> No
          </td>
        </tr>
        <tr>
          <td>Active:</td>
          <td>
            <input type="radio" name="active" value="Yes" /> Yes
            <input type="radio" name="active" value="No" /> No
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <input type="submit" name="submit" value="Add Food" class="btn-secondary" />
          </td>
        </tr>
      </table>
    </form>
    <!-- Dodawanie jedzenia się kończy -->

    <?php

      if(isset($_POST['submit']))
      {

        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        
        if(isset($_POST['featured']))
        {
            $featured = $_POST['featured'];
        }
        else
        {
          // Jesli nie ustawiono featured to domyslnie jest No
            $featured = "No";
        }

        if(isset($_POST['active']))
        {
            $active = $_POST['active'];
        }
        else
        {
          // Jesli nie ustawiono active to domyslnie jest No
            $active = "No";
        }

        if(isset($_FILES['image']['name']))
        {
          $image_name = $_FILES['image']['name'];
          
          if ($image_name != "")
          {
            $src = $_FILES['image']['tmp_name'];
            $dst = "../images/".$image_name;
          }

        }
        else
        {
          $image_name = "";
        }

        $sql2 = "INSERT INTO foods SET
          title = '$title',
          description = '$description',
          price = $price,
          image_name = '$image_name',
          category_id = $category,
          featured = '$featured',
          active = '$active'
        ";

        $res2 = mysqli_query($conn, $sql2);
        if($res2 == true)
        {
          $_SESSION['add'] = "<div class='success'>Udalo sie dodac jedzenie</div>";
          header('location:'.SITEURL.'admin/manage-food.php');
        }
        else
        {
          $_SESSION['add'] = "<div class='error'>Nie udalo sie dodac jedzenia</div>";
          header('location:'.SITEURL.'admin/manage-food.php');
        }
      }
    ?>


  </div>
</div>

<?php include('partials/footer.php'); ?>