<?php include('partials-front/menu.php'); ?>

    <!-- Sekcja kategorii -->
    <section class="categories-section">
      <div class="container">
        <div class="food-menu-title">Pizzy</div>

        <?php 

          // Wyswietlenie wszystkich aktywnych kategorii
          $sql = "SELECT * FROM categories WHERE active = 'Yes'";

          $res = mysqli_query($conn, $sql);

          $count = mysqli_num_rows($res);

          if($count > 0)
          {
            while($row = mysqli_fetch_assoc($res))
            {
              $id = $row['id'];
              $title = $row['title'];
              $image_name = $row['image_name'];
              ?>

              <a href="<?php echo SITEURL; ?>menu.php">
                <div class="box-3 float-container">

                  <?php
                  if ($image_name == "")
                  {
                    // Zdjecie nie dostepne
                    echo "<div class='error'> Nie znaleziono zdjecia </div>";
                  }
                  else
                  {
                    ?>
                    <img src="<?php echo SITEURL; ?>images/<?php echo $image_name?>" alt="<?php echo $title; ?>" class="img-responsive img-curve">
                    <?php
                  }
                  ?>
                  
                </div>
              </a>

              <?php
            }
          }
          else
          {
            echo "<div class='error'> Kategoria nie znaleziona </div>";
          }

        ?>


        <div class="clearfix"></div>
      </div>
    </section>
    <!-- Sekcja kategorii sie konczy -->

<?php include('partials-front/footer.php'); ?>