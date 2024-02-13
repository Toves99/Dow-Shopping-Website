<?php
session_start();
@include 'config.php';

if (isset($_POST['update_update_btn'])) {
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   
   if (isset($_SESSION['cart'][$update_id])) {
       $_SESSION['cart'][$update_id]['quantity'] = $update_value;
   }
   
   header('location:cart.php');
}

if (isset($_GET['remove'])) {
   $remove_id = $_GET['remove'];
   
   if (isset($_SESSION['cart'][$remove_id])) {
       unset($_SESSION['cart'][$remove_id]);
   }
   
   header('location:cart.php');
}

if (isset($_GET['delete_all'])) {
   unset($_SESSION['cart']);
   header('location:cart.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dow</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style6.css">
</head>
<body>

<?php include 'header.php'; ?>

<div class="container">
   <section class="shopping-cart">
      <table>
         <thead>
            <h2 style="margin-left:650px;font-size:20px;margin-top:20px;">products you selected</h2>
         </thead>
         <tbody>
            <?php 
            $grand_total = 0;
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
               foreach ($_SESSION['cart'] as $productId => $item) {
                  $sub_total = 0;
                  if (is_numeric($item['price']) && is_numeric($item['quantity'])) {
                     $sub_total = $item['price'] * $item['quantity'];
                  }
            ?>
            <tr>
               <td><img src="images/<?php echo $item['image']; ?>" height="100" alt=""></td>
               <td><?php echo $item['name']; ?></td>
               <td>$<?php echo number_format($item['price']); ?>/-</td>
               <td>
                  <form action="" method="post">
                     <input type="hidden" name="update_quantity_id"  value="<?php echo $productId; ?>" >
                     <input type="number" name="update_quantity" min="1"  value="<?php echo $item['quantity']; ?>" >
                     <input type="submit" value="update" name="update_update_btn">
                  </form>   
               </td>
               <td>$<?php echo number_format($sub_total); ?>/-</td>
               <td><a href="cart.php?remove=<?php echo $productId; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
            </tr>
            <?php
                  $grand_total += $sub_total;  
               }
            }
            ?>
            <tr class="table-bottom">
               <td><a href="index.php#pro" class="option-btn" style="margin-top: 0;">continue shopping</a></td>
               <td colspan="3">grand total</td>
               <td>$<?php echo number_format($grand_total); ?>/-</td>
               <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
            </tr>
         </tbody>
      </table>
      <div class="checkout-btn">
         <a href="login.php" class="btn <?= ($grand_total > 1) ? '' : 'disabled'; ?>">proceed to checkout</a>
      </div>
   </section>
</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
