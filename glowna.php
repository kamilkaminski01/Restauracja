<?php include('partials-front/menu.php'); ?>

    <!-- Sekcja wyszukiwania -->
    <section class="food-search text-center">
      <div class="container">
        <form action="<?php echo SITEURL; ?>menu.php" method="POST">
          <input
            type="search"
            name="search"
            placeholder="Wyszukaj jedzenie..."
          />
          <input
            type="submit"
            name="submit"
            value="Wyszukaj"
            class="btn btn-primary"
          />
        </form>
      </div>
    </section>
    <!-- Sekcja wyszukiwania sie konczy -->

    <?php 
      if(isset($_SESSION['order']))
      {
          echo $_SESSION['order'];
          unset($_SESSION['order']);
      }
    ?>

    <!-- Sekcja kategorii -->
    <section class="categories">
      <div class="container">
        <h2 class="text-center">Popularne Kategorie</h2>

        <?php 

          // Zapytanie SQL do wyswietlenia kategorii z bazy danych
          $sql = "SELECT * FROM categories WHERE active = 'Yes' AND featured = 'Yes' LIMIT 3";
          // Wykonanie 
          $res = mysqli_query($conn, $sql);
          // Policzenie wierszy i sprawdzenie czy kategoria jest dostepna
          $count = mysqli_num_rows($res);
          
          
          if($count > 0)
          {
            while($row = mysqli_fetch_assoc($res))
            {
              $id = $row['id'];
              $title = $row['title'];
              $image_name = $row['image_name'];
              ?>

              <a href="<?php echo SITEURL ?>/menu.php">
                <div class="box-3 float-container">
                    <?php 
                    // Sprawdzenie czy jest zdjęcie
                      if($image_name == "")
                      {
                        echo "<div class='error'>Zdjecie niedostepne</div>";
                      }
                      else
                      {
                        ?>
                          <img src="<?php echo SITEURL; ?>images/<?php echo $image_name; ?>"alt="Pizza" class="img-responsive img-curve">
                        <?php
                      }
                    ?>
                    
                  <h3 class="float-text text-white"><?php echo $title; ?></h3>
                </div>
              </a>

              <?php
            }
          }
          else
          {
            echo "<div class='error'>Kategoria nie dodana</div>";
          }

        ?>


        <div class="clearfix"></div>
      </div>
    </section>
    <!-- Sekcja kategorii sie konczy -->

    <!-- Sekcja menu -->
    <section class="food-menu">
      <div class="container">
        <h2 class="text-center">Popularne Dania</h2>

        <?php

          $sql2 = "SELECT * FROM foods WHERE active = 'Yes' AND featured = 'Yes' LIMIT 6";

          $res2 = mysqli_query($conn, $sql2);

          $count2 = mysqli_num_rows($res2);

          if($count2 > 0)
          {
            while($row = mysqli_fetch_assoc($res2))
            {
              $id = $row['id'];
              $title = $row['title'];
              $price = $row['price'];
              $description = $row['description'];
              $image_name = $row['image_name'];

              ?>

              <div class="food-menu-box">
                <div class="food-menu-img">
                  <?php
                    if($image_name =="")
                    {
                      echo "<div class='error'>Zdjecie niedostepne</div>";
                    }
                    else
                    {
                      ?>
                      <img src="<?php echo SITEURL; ?>images/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve" />
                      <?php
                    }
                  ?>
                  
                </div>

                <div class="food-menu-desc">
                  <h4><?php echo $title; ?></h4>
                  <p class="food-price"><?php echo $price; ?> zl</p>
                  <p class="food-detail"><?php echo $description; ?></p>
                  <br />

                  <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary"> Zamów teraz </a>
                </div>
              </div>

              <?php

            }
          }
          else
          {
            echo "<div class='error'>Jedzenie nie dostepne</div>";
          }

        ?>

        <div class="clearfix"></div>
      </div>
      <a href="#">
        <p class="text-center">Zobacz więcej</p>
      </a>
    </section>
    <!-- Sekcja menu sie konczy -->



    <?php include('partials-front/footer.php'); ?>