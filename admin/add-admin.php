<?php include('partials/menu.php'); ?>

<div class="main-content">
  <div class="wrapper">
    <h1>Add Admin</h1>
    <br /><br />

    <?php
    if (isset($_SESSION['add'])) {
      echo $_SESSION['add'];
      unset($_SESSION['add']);
    }
    ?>

    <!-- Dodawanie admina -->
    <form action="" method="POST">
      <table class="tbl-30">
        <tr>
          <td>Full name:</td>
          <td>
            <input type="text" name="full_name" placeholder="Imie i nazwisko" />
          </td>
        </tr>
        <tr>
          <td>Username:</td>
          <td>
            <input type="text" name="username" placeholder="Nazwa uzytkownika" />
          </td>
        </tr>
        <tr>
          <td>Password:</td>
          <td>
            <input type="password" name="password" placeholder="Hasło" />
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <input type="submit" name="submit" value="Add Admin" class="btn-secondary" />
          </td>
        </tr>
      </table>
    </form>
    <!-- Dodawanie admina się kończy -->
  </div>
</div>

<?php include('partials/footer.php'); ?>

<?php
// Sprawdzenie czy przycisk jest nacisniety czy nie

if (isset($_POST['submit'])) {
  // Przycisk nacisniety
  // Przechwytanie danych z formularza
  $full_name = $_POST['full_name'];
  $username = $_POST['username'];
  $password = md5($_POST['password']); // Haslo encrypted z md5

  // SQL zeby zapisac dane do bazy
  $sql = "INSERT INTO admins SET
      full_name='$full_name',
      username='$username',
      password='$password' 
    ";

  // Zapisanie danych do bazy i polaczenie z baza w menu includem
  // Dodanie danych do bazy
  $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

  // Sprawdzenie czy dane są dodane czy nie
  if ($res == TRUE) {
    // Dane dodane
    $_SESSION['add'] = "<div class='success'> Admin dodany prawidlowo </div>";
    // Przekierowanie do manage admin
    header("location:" . SITEURL . 'admin/manage-admin.php');
  } else {
    // Nie dodano danych
    $_SESSION['add'] = "<div class='error'>Admin nie dodany prawidlowo </div>";
    // Przekierowanie do add admin
    header("location:" . SITEURL . 'admin/add-admin.php');
  }
}
?>