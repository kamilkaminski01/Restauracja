<?php include('partials-front/menu.php'); ?>

    <!-- Sekcja wyszukiwania -->
    <section class="food-search text-center">
      <div class="container">
        <form action="#">
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

    <!-- Sekcja menu -->
    <section class="food-menu">
      <div class="container">
      <div class="food-menu-title">Menu</div>

        <?php

          $sql = "SELECT * FROM foods WHERE active = 'Yes'";

          $res = mysqli_query($conn, $sql);

          $count = mysqli_num_rows($res);

          if($count > 0)
          {
            while($row = mysqli_fetch_assoc($res))
            {
              $id = $row['id'];
              $title = $row['title'];
              $description = $row['description'];
              $price = $row['price'];
              $image_name = $row['image_name'];
              ?>

                <!-- <div class="food-menu-title">Pizzy</div> -->
                  <div class="food-menu-box">
                    <div class="food-menu-img">
                    <?php
                      if($image_name == "")
                      {
                        echo "<div class='error'>Zdjecie nie dostepne</div>";
                      }
                      else
                      {
                        ?>
                          <img src="<?php echo SITEURL ?>images/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve"/>
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
    </section>
    <!-- Pierogi się kończą-->
    <!-- Sekcja menu sie konczy -->

    <?php include('partials-front/footer.php'); ?>