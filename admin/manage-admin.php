<?php include('partials/menu.php'); ?>

<!-- Główna sekcja  -->
<div class="main-content">
  <div class="wrapper">
    <h1>Manage Admin</h1>
    <br />

    <?php
    if (isset($_SESSION['add'])) {
      // Wyswietlenie wiadomosci sesji
      echo $_SESSION['add'];
      // Usuniecie wiadomosci sesji
      unset($_SESSION['add']);
    }
    ?>
    <br>
    <br>

    <!-- Przycisk zeby dodac admina -->
    <a href="add-admin.php" class="btn-primary">Add Admin</a>
    <br />
    <br />

    <table class="tbl-full">
      <tr>
        <th>nr</th>
        <th>Full Name</th>
        <th>Username</th>
        <th>Actions</th>
      </tr>

      <?php
      // Wyswietlenie wszystkich adminow z bazy
      $sql = "SELECT * FROM admins";
      $res = mysqli_query($conn, $sql);

      // Sprawdzenie czy zadzialalo
      if ($res == TRUE) {
        // Sprawdzenie czy sa dane
        $count = mysqli_num_rows($res);

        $p = 1;

        if ($count > 0) {
          // Dopoki sa dane w bazie
          while ($rows = mysqli_fetch_assoc($res)) {
            $id = $rows['id'];
            $full_name = $rows['full_name'];
            $username = $rows['username'];
            // Wyswietlenie w tabeli
      ?>

            <tr>
              <td> <?php echo $p++; ?> </td>
              <td> <?php echo $full_name; ?> </td>
              <td> <?php echo $username; ?> </td>
              <td>
                <a href="#" class="btn-secondary">Update Admin</a>
                <a href="#" class="btn-danger">Delete Admin</a>
              </td>
            </tr>

      <?php
          }
        }
      }
      ?>

    </table>
  </div>
</div>
<!-- Główna sekcja się kończy -->

<?php include('partials/footer.php'); ?>