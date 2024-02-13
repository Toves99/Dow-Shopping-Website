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
  <p style="position:absolute;margin-top:-20px;margin-left:30px;font-size:16px;color:black;"><a href="index.php" style="color:grey;">mtumba special/</a>women cloth</p>
<section style="margin-top:70px;background-color:lightgrey;height:auto;" id="pro">
<div class="container5">
    <?php
    $select_products = mysqli_query($conn, "SELECT w.productId, de.name AS mtumbawomenclothedresses_name, de.price AS mtumbawomenclothedresses_price, de.image AS mtumbawomenclothedresses_image,bl.name AS mtumbawomenclotheblouseandskirts_name,bl.price AS mtumbawomenclotheblouseandskirts_price,bl.image AS mtumbawomenclotheblouseandskirts_image,ti.name AS mtumbawomenclothetightsandbikers_name,ti.price AS mtumbawomenclothetightsandbikers_price,ti.image AS mtumbawomenclothetightsandbikers_image,
    br.name AS mtumbawomenclothebraandpanties_name,br.price AS mtumbawomenclothebraandpanties_price,br.image AS mtumbawomenclothebraandpanties_image,swe.name AS mtumbawomenclothesweaters_name,swe.price AS mtumbawomenclothesweaters_price,swe.image AS mtumbawomenclothesweaters_image,tr.name AS mtumbawomenclotheshortsandtrousers_name,tr.price AS mtumbawomenclotheshortsandtrousers_price,tr.image AS mtumbawomenclotheshortsandtrousers_image,co.name AS mtumbawomenclothecoatandblazers_name,co.price AS mtumbawomenclothecoatandblazers_price,
    co.image AS mtumbawomenclothecoatandblazers_image,sh.name AS mtumbawomenclotheshirts_name,sh.price AS mtumbawomenclotheshirts_price,sh.image AS mtumbawomenclotheshirts_image,be.name AS mtumbawomenclothebelts_name,be.price AS mtumbawomenclothebelts_price,be.image AS mtumbawomenclothebelts_image,ha.name AS mtumbawomenclothehandbags_name,ha.price AS mtumbawomenclothehandbags_price,ha.image AS mtumbawomenclothehandbags_image,t.name AS mtumbawomenclothetops_name,t.price AS mtumbawomenclothetops_price,t.image AS mtumbawomenclothetops_image,
    ts.name AS mtumbawomenclothetshirts_name,ts.price AS mtumbawomenclothetshirts_price,ts.image AS mtumbawomenclothetshirts_image,su.name AS mtumbawomenclothesuits_name,su.price AS mtumbawomenclothesuits_price,su.image AS mtumbawomenclothesuits_image,ja.name AS mtumbawomenclothejackets_name,ja.price AS mtumbawomenclothejackets_price,ja.image AS mtumbawomenclothejackets_image
                                       FROM mtumbawomencloth w
                                       LEFT JOIN mtumbawomenclothedresses de ON w.productId = de.productId
                                       LEFT JOIN mtumbawomenclotheblouseandskirts bl ON w.productId = bl.productId
                                       LEFT JOIN mtumbawomenclothetightsandbikers ti ON w.productId = ti.productId
                                       LEFT JOIN mtumbawomenclothebraandpanties br ON w.productId = br.productId
                                       LEFT JOIN mtumbawomenclothesweaters swe ON w.productId = swe.productId
                                       LEFT JOIN mtumbawomenclotheshortsandtrousers tr ON w.productId = tr.productId
                                       LEFT JOIN mtumbawomenclothecoatandblazers co ON w.productId = co.productId
                                       LEFT JOIN mtumbawomenclotheshirts sh ON w.productId = sh.productId
                                       LEFT JOIN mtumbawomenclothebelts be ON w.productId = be.productId
                                       LEFT JOIN mtumbawomenclothehandbags ha ON w.productId = ha.productId
                                       LEFT JOIN mtumbawomenclothetops t ON w.productId = t.productId 
                                       LEFT JOIN mtumbawomenclothetshirts ts ON w.productId = ts.productId
                                       LEFT JOIN mtumbawomenclothesuits su ON w.productId = su.productId
                                       LEFT JOIN mtumbawomenclothejackets ja ON w.productId = ja.productId
                                       WHERE w.productId IS NOT NULL
                                       AND (de.name IS NOT NULL OR bl.name IS NOT NULL OR ti.name IS NOT NULL OR br.name IS NOT NULL OR swe.name IS NOT NULL 
                                       OR tr.name IS NOT NULL OR co.name IS NOT NULL OR sh.name IS NOT NULL OR be.name IS NOT NULL 
                                       OR ha.name IS NOT NULL OR t.name IS NOT NULL OR ts.name IS NOT NULL  OR su.name IS NOT NULL OR ja.name IS NOT NULL )");
    if ($select_products) {
        while ($fetch_product = mysqli_fetch_assoc($select_products)) {
            ?>
            <div class="box">
                <form action="" method="post">
                    <img src="images/<?php echo isset($fetch_product['mtumbawomenclothedresses_image']) ? $fetch_product['mtumbawomenclothedresses_image'] : $fetch_product['mtumbawomenclotheblouseandskirts_image'],$fetch_product['mtumbawomenclothetightsandbikers_image'],$fetch_product['mtumbawomenclothebraandpanties_image'],$fetch_product['mtumbawomenclothesweaters_image'],$fetch_product['mtumbawomenclotheshortsandtrousers_image'],$fetch_product['mtumbawomenclothecoatandblazers_image'],$fetch_product['mtumbawomenclotheshirts_image'],$fetch_product['mtumbawomenclothebelts_image'],$fetch_product['mtumbawomenclothehandbags_image'],$fetch_product['mtumbawomenclothetops_image'],$fetch_product['mtumbawomenclothetshirts_image'],$fetch_product['mtumbawomenclothesuits_image'],$fetch_product['mtumbawomenclothejackets_image']; ?>" 
                         alt=""
                         style="width:100px;margin-left:70px;height:100px;">
                    <h3 style="margin-left:20px;width:220px;font-size:14px;margin-top:20px;position:absolute;font-family:Helvetica;color:grey;"><?php echo isset($fetch_product['mtumbawomenclothedresses_name']) ? $fetch_product['mtumbawomenclothedresses_name'] : $fetch_product['mtumbawomenclotheblouseandskirts_name'],$fetch_product['mtumbawomenclothetightsandbikers_name'],$fetch_product['mtumbawomenclothebraandpanties_name'],$fetch_product['mtumbawomenclothesweaters_name'],$fetch_product['mtumbawomenclotheshortsandtrousers_name'],$fetch_product['mtumbawomenclothecoatandblazers_name'],$fetch_product['mtumbawomenclotheshirts_name'],$fetch_product['mtumbawomenclothebelts_name'],$fetch_product['mtumbawomenclothehandbags_name'],$fetch_product['mtumbawomenclothetops_name'],$fetch_product['mtumbawomenclothetshirts_name'],$fetch_product['mtumbawomenclothesuits_name'],$fetch_product['mtumbawomenclothejackets_name']; ?></h3>
                    <div style="margin-top:90px;margin-left:60px;font-size:18px;font-weight:700;">KSH<?php echo isset($fetch_product['mtumbawomenclothedresses_price']) ? $fetch_product['mtumbawomenclothedresses_price'] : $fetch_product['mtumbawomenclotheblouseandskirts_price'],$fetch_product['mtumbawomenclothetightsandbikers_price'],$fetch_product['mtumbawomenclothebraandpanties_price'],$fetch_product['mtumbawomenclothesweaters_price'],$fetch_product['mtumbawomenclotheshortsandtrousers_price'],$fetch_product['mtumbawomenclothecoatandblazers_price'],$fetch_product['mtumbawomenclotheshirts_price'],$fetch_product['mtumbawomenclothebelts_price'],$fetch_product['mtumbawomenclothehandbags_price'],$fetch_product['mtumbawomenclothetops_price'],$fetch_product['mtumbawomenclothetshirts_price'],$fetch_product['mtumbawomenclothesuits_price'],$fetch_product['mtumbawomenclothejackets_price']; ?>/=</div>
                    <input type="text" name="product_name"
                           value="<?php echo isset($fetch_product['mtumbawomenclothedresses_name']) ? $fetch_product['mtumbawomenclothedresses_name'] : $fetch_product['mtumbawomenclotheblouseandskirts_name'],$fetch_product['mtumbawomenclothetightsandbikers_name'],$fetch_product['mtumbawomenclothebraandpanties_name'],$fetch_product['mtumbawomenclothesweaters_name'],$fetch_product['mtumbawomenclotheshortsandtrousers_name'],$fetch_product['mtumbawomenclothecoatandblazers_name'],$fetch_product['mtumbawomenclotheshirts_name'],$fetch_product['mtumbawomenclothebelts_name'],$fetch_product['mtumbawomenclothehandbags_name'],$fetch_product['mtumbawomenclothetops_name'],$fetch_product['mtumbawomenclothetshirts_name'],$fetch_product['mtumbawomenclothesuits_name'],$fetch_product['mtumbawomenclothejackets_name'];?>"
                           style="margin-top:-170px;position:absolute;color:white;border:0;width:20px;">
                    <input type="text" name="product_price"
                           value="<?php echo isset($fetch_product['mtumbawomenclothedresses_price']) ? $fetch_product['mtumbawomenclothedresses_price'] : $fetch_product['mtumbawomenclotheblouseandskirts_price'],$fetch_product['mtumbawomenclothetightsandbikers_price'],$fetch_product['mtumbawomenclothebraandpanties_price'],$fetch_product['mtumbawomenclothesweaters_price'],$fetch_product['mtumbawomenclotheshortsandtrousers_price'],$fetch_product['mtumbawomenclothecoatandblazers_price'],$fetch_product['mtumbawomenclotheshirts_price'],$fetch_product['mtumbawomenclothebelts_price'],$fetch_product['mtumbawomenclothehandbags_price'],$fetch_product['mtumbawomenclothetops_price'],$fetch_product['mtumbawomenclothetshirts_price'],$fetch_product['mtumbawomenclothesuits_price'],$fetch_product['mtumbawomenclothejackets_price'];?>"
                           style="margin-top:-150px;position:absolute;color:white;border:0;width:20px;">
                    <input type="text" name="image"
                           value="<?php echo isset($fetch_product['mtumbawomenclothedresses_image']) ? $fetch_product['mtumbawomenclothedresses_image'] : $fetch_product['mtumbawomenclotheblouseandskirts_image'],$fetch_product['mtumbawomenclothetightsandbikers_image'],$fetch_product['mtumbawomenclothebraandpanties_image'],$fetch_product['mtumbawomenclothesweaters_image'],$fetch_product['mtumbawomenclotheshortsandtrousers_image'],$fetch_product['mtumbawomenclothecoatandblazers_image'],$fetch_product['mtumbawomenclotheshirts_image'],$fetch_product['mtumbawomenclothebelts_image'],$fetch_product['mtumbawomenclothehandbags_image'],$fetch_product['mtumbawomenclothetops_image'],$fetch_product['mtumbawomenclothetshirts_image'],$fetch_product['mtumbawomenclothesuits_image'],$fetch_product['mtumbawomenclothejackets_image']; ?>"
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