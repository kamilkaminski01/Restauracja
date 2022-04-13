<?php include('partials/menu.php'); ?>

<div class="main-content">
  <div class="wrapper">
    <h1>Add Food</h1>
    <br /><br />

    <!-- Dodawanie jedzenia -->
    <form action="#" method="POST">
      <table class="tbl-30">
        <tr>
          <td>Title:</td>
          <td>
            <input type="text" name="title" placeholder="Tytuł jedzenia" />
          </td>
        </tr>
        <tr>
          <td>Description:</td>
          <td>
            <textarea name="description" cols="30" rows="5" placeholder="Opis jedzenia"></textarea>
          </td>
        </tr>
        <tr>
          <td>Price:</td>
          <td>
            <input type="number" name="price" />
          </td>
        </tr>
        <tr>
          <td>Select image:</td>
          <td>
            <input type="file" name="image" />
          </td>
        </tr>
        <tr>
          <td>Category:</td>
          <td>
            <select name="category">
              <option value="1">Pizza</option>
              <option value="2">Burger</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Featured:</td>
          <td>
            <input type="radio" name="featured" value="Yes" /> Yes
            <input type="radio" name="featured" value="No" /> No
          </td>
        </tr>
        <tr>
          <td>Active:</td>
          <td>
            <input type="radio" name="active" value="Yes" /> Yes
            <input type="radio" name="active" value="No" /> No
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <input type="submit" name="submit" value="Add Food" class="btn-secondary" />
          </td>
        </tr>
      </table>
    </form>
    <!-- Dodawanie jedzenia się kończy -->
  </div>
</div>

<?php include('partials/footer.php'); ?>