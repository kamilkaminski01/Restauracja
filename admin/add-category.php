<?php include('partials/menu.php');?>

  <div class="main-content">
    <div class="wrapper">
      <h1>Add Category</h1>
      <br /><br />

      <!-- Dodawanie kategorii -->
      <form action="" method="POST">
        <table class="tbl-30">
          <tr>
            <td>Title:</td>
            <td>
              <input type="text" name="title" placeholder="Tytuł Kategorii" />
            </td>
          </tr>
          <tr>
            <td>Select Image:</td>
            <td>
              <input type="file" name="image" />
            </td>
          </tr>
          <tr>
            <td>Featured:</td>
            <td>
              <input type="radio" name="featured" id="Yes" /> Yes
              <input type="radio" name="featured" id="No" /> No
            </td>
          </tr>
          <tr>
            <td>Active:</td>
            <td>
              <input type="radio" name="featured" id="Yes" /> Yes
              <input type="radio" name="featured" id="No" /> No
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <input
                type="submit"
                name="submit"
                value="Add Category"
                class="btn-secondary"
              />
            </td>
          </tr>
        </table>
      </form>
      <!-- Dodawanie kategorii się kończy -->
    </div>
  </div>

<?php include('partials/footer.php');?>