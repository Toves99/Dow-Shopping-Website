<?php
session_start();
@include 'config.php';

if (isset($_POST['order_btn'])) {
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        $grand_total = 0;
        foreach ($_SESSION['cart'] as $cart_item) {
            $total_price = $cart_item['price'] * $cart_item['quantity'];
            $grand_total += $total_price;
            $userId = $_SESSION['userId'];
            //echo "userId is:".$userId;
            
            // Insert order item into the database
            $name = mysqli_real_escape_string($conn, $cart_item['name']);
            $quantity = (int) $cart_item['quantity'];
            $price = (float) $cart_item['price'];
            $query = "INSERT INTO orders (userId,name, quantity, price,grand_total) VALUES ('$userId','$name', $quantity, $price,$grand_total)";
            mysqli_query($conn, $query);
            
            
        }
    
        // Clear the cart after successful order
        $_SESSION['cart'] = array();
    }
}
?>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style6.css">

</head>
<body>

<?php include 'headerloggged.php'; ?>

<div class="container">

<section class="checkout-form">
    <h1 class="heading">Complete Your Order</h1>

    <form action="" method="post">
        <div class="display-order">
            <?php
            $total = 0;
            $grand_total = 0;
            
            if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $cart_item) {
                    $total_price = $cart_item['price'] * $cart_item['quantity'];
                    $grand_total += $total_price;
                    ?>
                    <span><?= $cart_item['name']; ?>(<?= $cart_item['quantity']; ?>)</span>
                    <?php
                }
            } else {
                echo "<div class='display-order'><span>Your cart is empty!</span></div>";
            }
            ?>
            <span class="grand-total">Grand Total: $<?= $grand_total; ?>/-</span>
            <input type="tel" name="phone" placeholder="phonumber" style="border:1px solid grey;
            width:250px;height:50px;">
        </div>
        

        <input type="submit" value="Order Now" name="order_btn" class="btn" >
    </form>
</section>



</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>