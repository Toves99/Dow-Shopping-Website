<?php
session_start(); // Start or resume the session

@include 'config.php';

if (isset($_POST['add_to_cart'])) {

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['image'];
    $product_quantity = 1;

    // Retrieve cart data from session
    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

    // Check if the product is already in the cart
    $product_already_in_cart = false;
    foreach ($cart as $cart_item) {
        if ($cart_item['name'] === $product_name) {
            $product_already_in_cart = true;
            break;
        }
    }

    if ($product_already_in_cart) {
        $message[] = 'Product already added to cart';
    } else {
        // Add the product to the session cart
        $cart[] = [
            'name' => $product_name,
            'price' => $product_price,
            'image' => $product_image,
            'quantity' => $product_quantity
        ];
        $_SESSION['cart'] = $cart;

        $message[] = 'Product added to cart successfully';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style3.css">

   
   <style>

.container5 {
  display: flex;
  flex-direction: row; /* Change this to "row" */
  flex-wrap:wrap;
}

.box {
  flex: 0.2;
  height: 300px;
  background-color: white;
  margin: 5px;
  box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
}
#btn{
  margin-top:20px;
  background-color: white;
  box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
  color:#fd5c28;
  font-size: 18px;
  border-radius: 7px;
  border: 0;
  font-size:17px;
  margin-left:25px;
  width:200px;
  height:45px;
  text-align:center;
  visibility:hidden;
}
.box:hover #btn{
  visibility:visible;
  background-color:#fd5c28;
  color:white;
}
</style>
</head>
<body style="background-color:lightgrey">
   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`; window.location.href = `#pro`;"></i> </div>';
   };
};

?>

<?php include 'header.php'; ?>

<div class="container">
  <p style="position:absolute;margin-top:-20px;margin-left:30px;font-size:16px;color:black;"><a href="index.php" style="color:grey;">shoes/</a>women shoes</p>
<section style="margin-top:70px;background-color:lightgrey;height:auto;" id="pro">
<div class="container5">
    <?php
    $select_products = mysqli_query($conn, "SELECT we.productId, wof.name AS mtumbawomenshoesofficial_name, wof.price AS mtumbawomenshoesofficial_price, wof.image AS mtumbawomenshoesofficial_image,wsl.name AS mtumbawomenshoesslippers_name,wsl.price AS mtumbawomenshoesslippers_price,wsl.image AS mtumbawomenshoesslippers_image,wsk.name AS mtumbawomenshoessneakers_name,wsk.price AS mtumbawomenshoessneakers_price,wsk.image AS mtumbawomenshoessneakers_image,
    wsli.name AS mtumbawomenshoesslides_name,wsli.price AS mtumbawomenshoesslides_price,wsli.image AS mtumbawomenshoesslides_image,wr.name AS mtumbawomenshoesrubber_name,wr.price AS mtumbawomenshoesrubber_price,wr.image AS mtumbawomenshoesrubber_image,wg.name AS mtumbawomenshoesgumboot_name,wg.price AS mtumbawomenshoesgumboot_price,wg.image AS mtumbawomenshoesgumboot_image,wsd.name AS mtumbawomenshoessandals_name,wsd.price AS mtumbawomenshoessandals_price,
    wsd.image AS mtumbawomenshoessandals_image,wh.name AS mtumbawomenshoeshiking_name,wh.price AS mtumbawomenshoeshiking_price,wh.image AS mtumbawomenshoeshiking_image,wsp.name AS mtumbawomenshoessportshoes_name,wsp.price AS mtumbawomenshoessportshoes_price,wsp.image AS mtumbawomenshoessportshoes_image,whe.name AS mtumbawomenshoeshighheel_name,whe.price AS mtumbawomenshoeshighheel_price,whe.image AS mtumbawomenshoeshighheel_image,wfs.name AS mtumbawomenshoesboot_name,wfs.price AS mtumbawomenshoesboot_price,wfs.image AS mtumbawomenshoesboot_image
                                       FROM mtumbawomenshoes we
                                       LEFT JOIN mtumbawomenshoesofficial wof ON we.productId = wof.productId
                                       LEFT JOIN mtumbawomenshoesslippers wsl ON we.productId = wsl.productId
                                       LEFT JOIN mtumbawomenshoessneakers wsk ON we.productId = wsk.productId
                                       LEFT JOIN mtumbawomenshoesslides wsli ON we.productId = wsli.productId
                                       LEFT JOIN mtumbawomenshoesrubber wr ON we.productId = wr.productId
                                       LEFT JOIN mtumbawomenshoesgumboot wg ON we.productId = wg.productId
                                       LEFT JOIN mtumbawomenshoessandals wsd ON we.productId = wsd.productId
                                       LEFT JOIN mtumbawomenshoeshiking wh ON we.productId = wh.productId
                                       LEFT JOIN mtumbawomenshoessportshoes wsp ON we.productId = wsp.productId
                                       LEFT JOIN mtumbawomenshoeshighheel whe ON we.productId = whe.productId
                                       LEFT JOIN mtumbawomenshoesboot wfs ON we.productId = wfs.productId
                                       WHERE we.productId IS NOT NULL
                                       AND (wof.name IS NOT NULL OR wsl.name IS NOT NULL OR wsk.name IS NOT NULL OR wsli.name IS NOT NULL OR wr.name IS NOT NULL 
                                       OR wg.name IS NOT NULL OR wsd.name IS NOT NULL OR wh.name IS NOT NULL OR wsp.name IS NOT NULL OR whe.name IS NOT NULL OR wfs.name IS NOT NULL  )");
    if ($select_products) {
        while ($fetch_product = mysqli_fetch_assoc($select_products)) {
            ?>
            <div class="box">
                <form action="" method="post">
                    <img src="images/<?php echo isset($fetch_product['mtumbawomenshoesofficial_image']) ? $fetch_product['mtumbawomenshoesofficial_image'] : $fetch_product['mtumbawomenshoesslippers_image'],$fetch_product['mtumbawomenshoessneakers_image'],$fetch_product['mtumbawomenshoesslides_image'],$fetch_product['mtumbawomenshoesrubber_image'],$fetch_product['mtumbawomenshoesgumboot_image'],$fetch_product['mtumbawomenshoessandals_image'],$fetch_product['mtumbawomenshoeshiking_image'],$fetch_product['mtumbawomenshoessportshoes_image'],$fetch_product['mtumbawomenshoeshighheel_image'],$fetch_product['mtumbawomenshoesboot_image']; ?>" 
                         alt=""
                         style="width:100px;margin-left:70px;height:100px;">
                    <h3 style="margin-left:20px;width:220px;font-size:14px;margin-top:20px;position:absolute;font-family:Helvetica;color:grey;"><?php echo isset($fetch_product['mtumbawomenshoesofficial_name']) ? $fetch_product['mtumbawomenshoesofficial_name'] : $fetch_product['mtumbawomenshoesslippers_name'],$fetch_product['mtumbawomenshoessneakers_name'],$fetch_product['mtumbawomenshoesslides_name'],$fetch_product['mtumbawomenshoesrubber_name'],$fetch_product['mtumbawomenshoesgumboot_name'],$fetch_product['mtumbawomenshoessandals_name'],$fetch_product['mtumbawomenshoeshiking_name'],$fetch_product['mtumbawomenshoessportshoes_name'],$fetch_product['mtumbawomenshoeshighheel_name'],$fetch_product['mtumbawomenshoesboot_name']; ?></h3>
                    <div style="margin-top:90px;margin-left:60px;font-size:18px;font-weight:700;">KSH<?php echo isset($fetch_product['mtumbawomenshoesofficial_price']) ? $fetch_product['mtumbawomenshoesofficial_price'] : $fetch_product['mtumbawomenshoesslippers_price'],$fetch_product['mtumbawomenshoessneakers_price'],$fetch_product['mtumbawomenshoesslides_price'],$fetch_product['mtumbawomenshoesrubber_price'],$fetch_product['mtumbawomenshoesgumboot_price'],$fetch_product['mtumbawomenshoessandals_price'],$fetch_product['mtumbawomenshoeshiking_price'],$fetch_product['mtumbawomenshoessportshoes_price'],$fetch_product['mtumbawomenshoeshighheel_price'],$fetch_product['mtumbawomenshoesboot_price']; ?>/=</div>
                    <input type="text" name="product_name"
                           value="<?php echo isset($fetch_product['mtumbawomenshoesofficial_name']) ? $fetch_product['mtumbawomenshoesofficial_name'] : $fetch_product['mtumbawomenshoesslippers_name'],$fetch_product['mtumbawomenshoessneakers_name'],$fetch_product['mtumbawomenshoesslides_name'],$fetch_product['mtumbawomenshoesrubber_name'],$fetch_product['mtumbawomenshoesgumboot_name'],$fetch_product['mtumbawomenshoessandals_name'],$fetch_product['mtumbawomenshoeshiking_name'],$fetch_product['mtumbawomenshoessportshoes_name'],$fetch_product['mtumbawomenshoeshighheel_name'],$fetch_product['mtumbawomenshoesboot_name'];?>"
                           style="margin-top:-170px;position:absolute;color:white;border:0;width:20px;">
                    <input type="text" name="product_price"
                           value="<?php echo isset($fetch_product['mtumbawomenshoesofficial_price']) ? $fetch_product['mtumbawomenshoesofficial_price'] : $fetch_product['mtumbawomenshoesslippers_price'],$fetch_product['mtumbawomenshoessneakers_price'],$fetch_product['mtumbawomenshoesslides_price'],$fetch_product['mtumbawomenshoesrubber_price'],$fetch_product['mtumbawomenshoesgumboot_price'],$fetch_product['mtumbawomenshoessandals_price'],$fetch_product['mtumbawomenshoeshiking_price'],$fetch_product['mtumbawomenshoessportshoes_price'],$fetch_product['mtumbawomenshoeshighheel_price'],$fetch_product['mtumbawomenshoesboot_price'];?>"
                           style="margin-top:-150px;position:absolute;color:white;border:0;width:20px;">
                    <input type="text" name="image"
                           value="<?php echo isset($fetch_product['mtumbawomenshoesofficial_image']) ? $fetch_product['mtumbawomenshoesofficial_image'] : $fetch_product['mtumbawomenshoesslippers_image'],$fetch_product['mtumbawomenshoessneakers_image'],$fetch_product['mtumbawomenshoesslides_image'],$fetch_product['mtumbawomenshoesrubber_image'],$fetch_product['mtumbawomenshoesgumboot_image'],$fetch_product['mtumbawomenshoessandals_image'],$fetch_product['mtumbawomenshoeshiking_image'],$fetch_product['mtumbawomenshoessportshoes_image'],$fetch_product['mtumbawomenshoeshighheel_image'],$fetch_product['mtumbawomenshoesboot_image']; ?>"
                           style="margin-top:-130px;position:absolute;color:white;border:0;width:20px;">
                    <input type="submit" class="btn" value="add to cart" name="add_to_cart" id="btn">
                </form>
            </div>
            <?php
        }
    } else {
        // Handle query error
        echo "Error: " . mysqli_error($conn);
    }
    ?>
</div>
 
</section>

</div>

<!-- ======= Footer ======= -->
<footer id="footer">

<div class="footer-top">
  <div class="container">
    <div class="row">

      <div class="col-lg-3 col-md-6 footer-contact" style="margin-left:30px;">
        <h3>Dow</h3>
        <p>
          CBD <br>
          Nairobi<br>
          Kenya <br><br>
          <strong>Phone:</strong> +254726586630<br>
          <strong>Email:</strong> info@dow.co.ke<br>
        </p>
      </div>

      <div class="col-lg-2 col-md-6 footer-links" style="margin-left:500px;
      margin-top:-200px;">
        <h4>Useful Links</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-6 footer-links" style="margin-left:780px;
      margin-top:-240px;">
        <h4>Our Services</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="#">App & Web Design & development</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Online Shop (Buy & Sell with us)</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing Platform & Product Management</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
        </ul>
      </div>

      <div class="col-lg-4 col-md-6 footer-newsletter" style="margin-left:980px;
      margin-right:20px;">
        <h4>Join Our Newsletter</h4>
        <p>Get latest and trending products and services from our market by subscribing</p>
        <form action="" method="post">
          <input type="email" name="email"><input type="submit" value="Subscribe">
        </form>
      </div>

    </div>
  </div>
</div>

<div class="container d-md-flex py-4" style="margin-left:500px;">

  <div class="me-md-auto text-center text-md-start">
    <div class="copyright">
      &copy; Copyright <strong><span>Dow</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flattern-multipurpose-bootstrap-template/ -->
      Designed by <a href="https://dow.co.ke/">Clinton Toves & Douglas Otunga</a>
    </div>
  </div>
  <div class="social-links text-center text-md-right pt-3 pt-md-0">
    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
    <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
    <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
  </div>
</div>
</footer><!-- End Footer -->
<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>