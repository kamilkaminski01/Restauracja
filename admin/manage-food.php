<?php include('partials/menu.php'); ?>

<div class="main-content">
  <div class="wrapper">
    <h1>Manage Food</h1>
    <br />

    <?php
      if(isset($_SESSION['add']))
      {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
      }

      if(isset($_SESSION['delete']))
      {
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
      }
    ?>
    <br> <br>

    <!-- Przycisk zeby dodac jedzenie -->
    <a href="add-food.php" class="btn-primary">Add Food</a>
    <br />
    <br />

    <!-- Dodawanie kategorii -->
    <table class="tbl-full">
      <tr>
        <th>nr</th>
        <th>Title</th>
        <th>Price</th>
        <th>Image</th>
        <th>Featured</th>
        <th>Active</th>
        <th>Actions</th>
      </tr>
      <?php
        $sql = "SELECT * FROM foods";
        $res = mysqli_query($conn, $sql);
        
        $count = mysqli_num_rows($res);
        $p = 1;
        if($count > 0)
        {
          while($row = mysqli_fetch_assoc($res))
          {
            $id = $row['id'];
            $title = $row['title'];
            $price = $row['price'];
            $image_name = $row['image_name'];
            $featured = $row['featured'];
            $active = $row['active'];
            ?>

            <tr>
              <td><?php echo $p++; ?></td>
              <td><?php echo $title; ?></td>
              <td><?php echo $price; ?></td>
              <td>
                <?php 
                  // Sprawdzenie czy jest zdjecie czy nie
                  if ($image_name != "")
                  {
                    ?>
                    <img src="<?php echo SITEURL;?>images/<?php echo $image_name;?>" width="100px">
                    <?php
                  }
                  else
                  {
                    echo "<div class='error'> Nie dodano zdjecia </div>";
                  }
                ?>
              </td>
              <td><?php echo $featured; ?></td>
              <td><?php echo $active; ?></td>
              <td>
                <!-- <a href="#" class="btn-secondary">Update Admin</a> -->
                <a href="<?php echo SITEURL;?>admin/delete-food.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn-danger">Delete Food</a>
              </td>
            </tr>

            <?php
          }
        }
        else
        {
          echo "<tr><td colspan='7' class='error'>Nie dodano jeszcze jedzenia</td></tr>";
        }

      ?>


    </table>
  </div>
</div>
<!-- Dodawanie kategorii się kończy-->

<?php include('partials/footer.php'); ?>