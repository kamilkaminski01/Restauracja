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
      </tr>

      <?php
      // Wyswietlenie najnowszego zamowienia po id
        $sql = "SELECT * FROM orders ORDER BY id DESC";
        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);
        
        // Licznik
        $p = 1;

        if($count > 0)
        {
          while($row=mysqli_fetch_assoc($res))
          {
            $id = $row['id'];
            $food = $row['food'];
            $price = $row['price'];
            $qty = $row['qty'];
            $total = $row['total'];
            $order_date = $row['order_date'];
            $status = $row['status'];
            $customer_name = $row['customer_name'];
            $customer_contact = $row['customer_contact'];
            $customer_email = $row['customer_email'];
            $customer_address = $row['customer_address'];
            ?>

              <tr class="text-center">
                <td><?php echo $p++ ?>.</td>
                <td><?php echo $food; ?></td>
                <td><?php echo $price; ?></td>
                <td><?php echo $qty; ?></td>
                <td><?php echo $total; ?></td>
                <td><?php echo $order_date; ?></td>
                <td><?php echo $status; ?></td>
                <td><?php echo $customer_name; ?></td>
                <td><?php echo $customer_contact; ?></td>
                <td><?php echo $customer_email; ?></td>
                <td><?php echo $customer_address; ?></td>
              </tr>

            <?php
          }

        }
        else
        {
          echo "<tr><td colspan='12' class='error'>Zamowienie niedostepne</td></tr>";
        }
      ?>


    </table>
  </div>
</div>
<!-- Tabela zamówień się kończy -->

<?php include('partials/footer.php'); ?>