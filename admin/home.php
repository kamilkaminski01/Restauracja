<?php include('partials/menu.php'); ?>

<!-- Główna sekcja  -->
<div class="main-content">
  <div class="wrapper">
    <h1>Home</h1>
    <br> <br>
    <?php
      if (isset($_SESSION['login'])) {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
      }
    ?>
    <br> <br>

    <div class="col-4 text-center">

      <?php 
        $sql = "SELECT * FROM categories";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
      ?>

      <h1><?php echo $count ?></h1>
      <br>
      Categories
    </div>
    <div class="col-4 text-center">

      <?php 
        $sql2 = "SELECT * FROM foods";
        $res2 = mysqli_query($conn, $sql2);
        $count2 = mysqli_num_rows($res2);
      ?>

      <h1><?php echo $count2; ?></h1>
      <br>
      Food
    </div>
    <div class="col-4 text-center">

      <?php
        $sql3 = "SELECT * FROM orders";
        $res3 = mysqli_query($conn, $sql3);
        $count3 = mysqli_num_rows($res3);
      ?>

      <h1><?php echo $count3; ?></h1>
      <br />
      Orders
    </div>
    <div class="col-4 text-center">

      <?php
        $sql4 = "SELECT SUM(total) AS total FROM orders";
        $res4 = mysqli_query($conn, $sql4);
        $row4 = mysqli_fetch_assoc($res4);

        $total_revenue = $row4['total'];
      ?>

      <h1><?php echo $total_revenue; ?>zl</h1>
      <br />
      Order Amount
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<!-- Główna sekcja się kończy -->

<?php include('partials/footer.php'); ?>