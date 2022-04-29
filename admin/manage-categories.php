<?php include('partials/menu.php'); ?>

<!-- Główna sekcja  -->
<div class="main-content">
  <div class="wrapper">
    <h1>Manage Category</h1>
    <br> <br>

    <?php
      if(isset($_SESSION['add']))
      {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
      }

      if(isset($_SESSION['remove']))
      {
        echo $_SESSION['remove'];
        unset($_SESSION['remove']);
      }

      if(isset($_SESSION['delete']))
      {
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
      }
    ?>

    <br>

    <!-- Przycisk zeby dodac kategorie -->
    <a href="<?php echo SITEURL;?>admin/add-category.php" class="btn-primary">Add Category</a>
    <br> <br>

    <table class="tbl-full">
      <tr>
        <th>nr</th>
        <th>Title</th>
        <th>Image</th>
        <th>Featured</th>
        <th>Active</th>
        <th>Actions</th>
      </tr>
      <?php
        $sql = "SELECT * FROM categories";
        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        $p = 1;

        if($count>0){
          while($row = mysqli_fetch_assoc($res)){
            $id = $row['id'];
            $title = $row['title'];
            $image_name = $row['image_name'];
            $featured = $row['featured'];
            $active = $row['active'];
      ?>
            <tr>
              <td><?php echo $p++;?></td>
              <td><?php echo $title;?></td>

              <td>
                <?php
                  // Sprawdzenie czy zdjecie jest dostepne
                  if ($image_name != "")
                  {
                    ?>
                    <img src="<?php echo SITEURL;?>images/<?php echo $image_name;?>" width="100px">
                    <?php
                  }
                  else{
                    echo "<div class='error'>Zdjecie nie dodane</div>";
                  }
                ?>
              </td>

              <td><?php echo $featured;?></td>
              <td><?php echo $active;?></td>
              <td>
                <!-- <a href="#" class="btn-secondary">Update Category</a> -->
                <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn-danger">Delete Category</a>
              </td>
            </tr>
      <?php
          }
        }
        else{
      ?>
          <tr>
            <td colspan="6"><div class="error">Nie dodano kategorii</div></td>
          </tr>
         <?php
        }
        ?>
      <tr>
    </table>
  </div>
</div>
<!-- Główna sekcja się kończy -->

<?php include('partials/footer.php'); ?>