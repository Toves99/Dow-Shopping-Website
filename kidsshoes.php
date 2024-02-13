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
  <p style="position:absolute;margin-top:-20px;margin-left:30px;font-size:16px;color:black;"><a href="index.php" style="color:grey;">shoes/</a>Kids shoes</p>
<section style="margin-top:70px;background-color:lightgrey;height:auto;" id="pro">
<div class="container5">
    <?php
    $select_products = mysqli_query($conn, "SELECT ki.productId, kof.name AS kidsofficialshoes_name, kof.price AS kidsofficialshoes_price, kof.image AS kidsofficialshoes_image,kfl.name AS kidsflipflopshoes_name,kfl.price AS kidsflipflopshoes_price,kfl.image AS kidsflipflopshoes_image,ksk.name AS kidssneakers_name,ksk.price AS kidssneakers_price,ksk.image AS kidssneakers_image,
    ksli.name AS kidssliders_name,ksli.price AS kidssliders_price,ksli.image AS kidssliders_image,kr.name AS kidsrubbers_name,kr.price AS kidsrubbers_price,kr.image AS kidsrubbers_image,kg.name AS kidgumboots_name,kg.price AS kidgumboots_price,kg.image AS kidgumboots_image,ksd.name AS kidssandals_name,ksd.price AS kidssandals_price,
    ksd.image AS kidssandals_image,kh.name AS kidshiking_name,kh.price AS kidshiking_price,kh.image AS kidshiking_image,ksp.name AS kidsportshoes_name,ksp.price AS kidsportshoes_price,ksp.image AS kidsportshoes_image,khe.name AS kidshighheel_name,khe.price AS kidshighheel_price,khe.image AS kidshighheel_image,kb.name AS kidsboots_name,kb.price AS kidsboots_price,kb.image AS kidsboots_image
                                       FROM kidshoes ki
                                       LEFT JOIN kidsofficialshoes kof ON ki.productId = kof.productId
                                       LEFT JOIN kidsflipflopshoes kfl ON ki.productId = kfl.productId
                                       LEFT JOIN kidssneakers ksk ON ki.productId = ksk.productId
                                       LEFT JOIN kidssliders ksli ON ki.productId = ksli.productId
                                       LEFT JOIN kidsrubbers kr ON ki.productId = kr.productId
                                       LEFT JOIN kidgumboots kg ON ki.productId = kg.productId
                                       LEFT JOIN kidssandals ksd ON ki.productId = ksd.productId
                                       LEFT JOIN kidshiking kh ON ki.productId = kh.productId
                                       LEFT JOIN kidsportshoes ksp ON ki.productId = ksp.productId
                                       LEFT JOIN kidshighheel khe ON ki.productId = khe.productId
                                       LEFT JOIN kidsboots kb ON ki.productId = kb.productId
                                       WHERE ki.productId IS NOT NULL
                                       AND (kof.name IS NOT NULL OR kfl.name IS NOT NULL OR ksk.name IS NOT NULL OR ksli.name IS NOT NULL OR kr.name IS NOT NULL 
                                       OR kg.name IS NOT NULL OR ksd.name IS NOT NULL OR kh.name IS NOT NULL OR ksp.name IS NOT NULL OR khe.name IS NOT NULL OR kb.name IS NOT NULL  )");
    if ($select_products) {
        while ($fetch_product = mysqli_fetch_assoc($select_products)) {
            ?>
            <div class="box">
                <form action="" method="post">
                    <img src="images/<?php echo isset($fetch_product['kidsofficialshoes_image']) ? $fetch_product['kidsofficialshoes_image'] : $fetch_product['kidsflipflopshoes_image'],$fetch_product['kidssneakers_image'],$fetch_product['kidssliders_image'],$fetch_product['kidsrubbers_image'],$fetch_product['kidgumboots_image'],$fetch_product['kidssandals_image'],$fetch_product['kidshiking_image'],$fetch_product['kidsportshoes_image'],$fetch_product['kidshighheel_image'],$fetch_product['kidsboots_image']; ?>" 
                         alt=""
                         style="width:100px;margin-left:70px;height:100px;">
                    <h3 style="margin-left:20px;width:220px;font-size:14px;margin-top:20px;position:absolute;font-family:Helvetica;color:grey;"><?php echo isset($fetch_product['kidsofficialshoes_name']) ? $fetch_product['kidsofficialshoes_name'] : $fetch_product['kidsflipflopshoes_name'],$fetch_product['kidssneakers_name'],$fetch_product['kidssliders_name'],$fetch_product['kidsrubbers_name'],$fetch_product['kidgumboots_name'],$fetch_product['kidssandals_name'],$fetch_product['kidshiking_name'],$fetch_product['kidsportshoes_name'],$fetch_product['kidshighheel_name'],$fetch_product['kidsboots_name']; ?></h3>
                    <div style="margin-top:90px;margin-left:60px;font-size:18px;font-weight:700;">KSH<?php echo isset($fetch_product['kidsofficialshoes_price']) ? $fetch_product['kidsofficialshoes_price'] : $fetch_product['kidsflipflopshoes_price'],$fetch_product['kidssneakers_price'],$fetch_product['kidssliders_price'],$fetch_product['kidsrubbers_price'],$fetch_product['kidgumboots_price'],$fetch_product['kidssandals_price'],$fetch_product['kidshiking_price'],$fetch_product['kidsportshoes_price'],$fetch_product['kidshighheel_price'],$fetch_product['kidsboots_price']; ?>/=</div>
                    <input type="text" name="product_name"
                           value="<?php echo isset($fetch_product['kidsofficialshoes_name']) ? $fetch_product['kidsofficialshoes_name'] : $fetch_product['kidsflipflopshoes_name'],$fetch_product['kidssneakers_name'],$fetch_product['kidssliders_name'],$fetch_product['kidsrubbers_name'],$fetch_product['kidgumboots_name'],$fetch_product['kidssandals_name'],$fetch_product['kidshiking_name'],$fetch_product['kidsportshoes_name'],$fetch_product['kidshighheel_name'],$fetch_product['kidsboots_name'];?>"
                           style="margin-top:-170px;position:absolute;color:white;border:0;width:20px;">
                    <input type="text" name="product_price"
                           value="<?php echo isset($fetch_product['kidsofficialshoes_price']) ? $fetch_product['kidsofficialshoes_price'] : $fetch_product['kidsflipflopshoes_price'],$fetch_product['kidssneakers_price'],$fetch_product['kidssliders_price'],$fetch_product['kidsrubbers_price'],$fetch_product['kidgumboots_price'],$fetch_product['kidssandals_price'],$fetch_product['kidshiking_price'],$fetch_product['kidsportshoes_price'],$fetch_product['kidshighheel_price'],$fetch_product['kidsboots_price'];?>"
                           style="margin-top:-150px;position:absolute;color:white;border:0;width:20px;">
                    <input type="text" name="image"
                           value="<?php echo isset($fetch_product['kidsofficialshoes_image']) ? $fetch_product['kidsofficialshoes_image'] : $fetch_product['kidsflipflopshoes_image'],$fetch_product['kidssneakers_image'],$fetch_product['kidssliders_image'],$fetch_product['kidsrubbers_image'],$fetch_product['kidgumboots_image'],$fetch_product['kidssandals_image'],$fetch_product['kidshiking_image'],$fetch_product['kidsportshoes_image'],$fetch_product['kidshighheel_image'],$fetch_product['kidsboots_image']; ?>"
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