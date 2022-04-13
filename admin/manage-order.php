<?php include('partials/menu.php'); ?>

<!-- Tabela zamowien  -->
<div class="main-content">
  <div class="wrapper">
    <h1>Manage Order</h1>

    <table class="tbl-full">
      <tr>
        <th>nr</th>
        <th>Food</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Order Date</th>
        <th>Status</th>
        <th>Customer Name</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Address</th>
        <th>Actions</th>
      </tr>

      <tr class="text-center">
        <td>1.</td>
        <td>Pizza</td>
        <td>20,99</td>
        <td>1</td>
        <td>20,99</td>
        <td>2022-03-30</td>
        <td>Order</td>
        <td>Kamil Kaminski</td>
        <td>123 456 789</td>
        <td>abc@gmail.com</td>
        <td>Bialystok</td>
        <td>
          <a href="#" class="btn-secondary">Update Order</a>
        </td>
      </tr>
    </table>
  </div>
</div>
<!-- Tabela zamówień się kończy -->

<?php include('partials/footer.php'); ?>