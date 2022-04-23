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
    ?>

    <br>

    <!-- Przycisk zeby dodac kategorie -->
    <a href="<?php echo SITEURL;?>admin/add-category.php" class="btn-primary">Add Category</a>
    <br> <br>

    <table class="tbl-full">
      <tr>
        <th>nr</th>
        <th>Full Name</th>
        <th>Username</th>
        <th>Actions</th>
      </tr>

      <tr>
        <td>1. </td>
        <td>Kamil Kaminski</td>
        <td>kamilkaminski</td>
        <td>
          <a href="#" class="btn-secondary">Update Admin</a>
          <a href="#" class="btn-danger">Delete Admin</a>
        </td>
      </tr>
      <tr>
        <td>1. </td>
        <td>Kamil Kaminski</td>
        <td>kamilkaminski</td>
        <td>
          <a href="#" class="btn-secondary">Update Admin</a>
          <a href="#" class="btn-danger">Delete Admin</a>
        </td>
      </tr>
      <tr>
        <td>1. </td>
        <td>Kamil Kaminski</td>
        <td>kamilkaminski</td>
        <td>
          <a href="#" class="btn-secondary">Update Admin</a>
          <a href="#" class="btn-danger">Delete Admin</a>
        </td>
      </tr>

    </table>
  </div>
</div>
<!-- Główna sekcja się kończy -->

<?php include('partials/footer.php'); ?>