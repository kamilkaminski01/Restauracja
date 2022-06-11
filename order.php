<?php include('partials-front/menu.php'); ?>

  <?php
    // Sprawdzic czy id jest ustawione
    if(isset($_GET['food_id']))
    {
        $food_id = $_GET['food_id'];

        $sql = "SELECT * FROM foods WHERE id=$food_id";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if($count==1)
        {
            $row = mysqli_fetch_assoc($res);

            $title = $row['title'];
            $price = $row['price'];
            $image_name = $row['image_name'];
        }
        else
        {
          // Jesli nie przekierowanie do strony glownej
          header('location:'.SITEURL.'/glowna.php');
        }
    }
    else
    {
      // Jesli nie przekierowanie do strony glownej
      header('location:'.SITEURL.'/glowna.php');
    }
  ?>

    <!-- Sekcja formularza -->
    <section class="food-search">
      <div class="container">

        <h2 class="text-center text-white">Twoje Zamówienie</h2>

        <form action="" method="POST" class="order">
          <fieldset>
            <legend>Wybrane Jedzenie</legend>

            <div class="food-menu-img">
              <?php 
              
                if($image_name=="")
                {
                  echo "<div class='error'>Zdjecie nie dostepne</div>";
                }
                else
                {
                  ?>
                  <img src="<?php echo SITEURL; ?>images/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve"/>
                  <?php
                }
              
              ?>
              
            </div>

            <div class="food-menu-desc">
              <h3><?php echo $title; ?></h3>
              <input type="hidden" name="food" value="<?php echo $title; ?>">

              <p class="food-price"><?php echo $price; ?> zl</p>
              <input type="hidden" name="price" value="<?php echo $price; ?>">

              <div class="order-label">Ilość</div>
              <input type="number" name="qty" class="input-responsive" value="1" required>
              
            </div>
          </fieldset>

          <fieldset>
            <legend>Szczegóły Zamówienia</legend>
            <div class="order-label">Imię i nazwisko</div>
            <input type="text" name="full-name" placeholder="" class="input-responsive"required/>

            <div class="order-label">Numer Telefonu</div>
            <input type="tel" name="contact" placeholder="" class="input-responsive" required/>

            <div class="order-label">Email</div>
            <input type="email" name="email" placeholder="" class="input-responsive" required/>

            <div class="order-label">Adres</div>
            <textarea name="address" rows="10" placeholder="ulica, kod pocztowy, miejscowość" class="input-responsive" required ></textarea>

            <input type="submit" name="submit" value="Potwierdź Zamówienie" class="btn btn-primary"/>
          </fieldset>
        </form>

        <?php

          if(isset($_POST['submit']))
          {
            $food = $_POST['food'];
            $price = $_POST['price'];
            $qty = $_POST['qty'];

            $total = $price * $qty;
            $order_date = date("Y-m-d h:i");
            $status = "Ordered";

            $customer_name = $_POST['full-name'];
            $customer_contact = $_POST['contact'];
            $customer_email = $_POST['email'];
            $customer_address = $_POST['address'];

            $sql2 = "INSERT INTO orders SET 
              food = '$food',
              price = $price,
              qty = $qty,
              total = $total,
              order_date = '$order_date',
              status = '$status',
              customer_name = '$customer_name',
              customer_contact = '$customer_contact',
              customer_email = '$customer_email',
              customer_address = '$customer_address'
              ";
            
            $res2 = mysqli_query($conn, $sql2);

            if($res2 == true)
            {
                $_SESSION['order'] = "<div class='success text-center'>Zlozono zamowienie</div>";
                header('location:'.SITEURL.'/glowna.php');
            }
            else
            {
                $_SESSION['order'] = "<div class='error text-center'>Nie udalo sie zlozyc zamowienia</div>";
                header('location:'.SITEURL.'/glowna.php');
            }
          }
          
        ?>

      </div>
    </section>
    <!-- Sekcja wyszukiwania sie konczy -->

<?php include('partials-front/footer.php'); ?>