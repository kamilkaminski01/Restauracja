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
      <h1>5</h1>
      <br>
      Admin
    </div>
    <div class="col-4 text-center">
      <h1>5</h1>
      <br>
      Categories
    </div>
    <div class="col-4 text-center">
      <h1>5</h1>
      <br />
      Food
    </div>
    <div class="col-4 text-center">
      <h1>5</h1>
      <br />
      Orders
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<!-- Główna sekcja się kończy -->

<?php include('partials/footer.php'); ?>