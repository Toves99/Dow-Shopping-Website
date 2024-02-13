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
  <p style="position:absolute;margin-top:-20px;margin-left:30px;font-size:16px;color:black;"><a href="index.php" style="color:grey;">Clothing&fashion/</a>menItems</p>
<section style="margin-top:70px;background-color:lightgrey;height:auto;" id="pro">
<div class="container5">
    <?php
    $select_products = mysqli_query($conn, "SELECT m.productId, sh.name AS shirts_name, sh.price AS shirts_price, sh.image AS shirts_image,ts.name AS tshirts_name,ts.price AS tshirts_price,ts.image AS tshirts_image,tr.name AS trousers_name,tr.price AS trousers_price,tr.image AS trousers_image,
    sho.name AS shorts_name,sho.price AS shorts_price,sho.image AS shorts_image,so.name AS socksandglooves_name,so.price AS socksandglooves_price,so.image AS socksandglooves_image,bo.name AS boxers_name,bo.price AS boxers_price,bo.image AS boxers_image,ve.name AS vest_name,ve.price AS vest_price,
    ve.image AS vest_image,ca.name AS caps_name,ca.price AS caps_price,ca.image AS caps_image,be.name AS belts_name,be.price AS belts_price,be.image AS belts_image,wa.name AS wallets_name,wa.price AS wallets_price,wa.image AS wallets_image,wat.name AS watches_name,wat.price AS watches_price,wat.image AS watches_image,
    ja.name AS jackets_name,ja.price AS jackets_price,ja.image AS jackets_image,su.name AS suits_name,su.price AS suits_price,su.image AS suits_image,swe.name AS sweaters_name,swe.price AS sweaters_price,swe.image AS sweaters_image,ho.name AS hoodies_name,ho.price AS hoodies_price,
    ho.image AS hoodies_image,swea.name AS sweatpants_name,swea.price AS sweatpants_price,swea.image AS sweatpants_image,tie.name AS tiesscarf_name,tie.price AS tiesscarf_price,tie.image As tiesscarf_image,cu.name AS casual_name,cu.price As casual_price,cu.image AS casual_image,co.name AS coatblazers_name,co.price AS coatblazers_price,co.image AS coatblazers_image
                                       FROM menitem m
                                       LEFT JOIN shirts sh ON m.productId = sh.productId
                                       LEFT JOIN tshirts ts ON m.productId = ts.productId
                                       LEFT JOIN trousers tr ON m.productId = tr.productId
                                       LEFT JOIN shorts sho ON m.productId = sho.productId
                                       LEFT JOIN socksandglooves so ON m.productId = so.productId
                                       LEFT JOIN boxers bo ON m.productId = bo.productId
                                       LEFT JOIN vest ve ON m.productId = ve.productId
                                       LEFT JOIN caps ca ON m.productId = ca.productId
                                       LEFT JOIN belts be ON m.productId = be.productId
                                       LEFT JOIN wallets wa ON m.productId = wa.productId
                                       LEFT JOIN watches wat ON m.productId = wat.productId 
                                       LEFT JOIN jackets ja ON m.productId = ja.productId
                                       LEFT JOIN suits su ON m.productId = su.productId
                                       LEFT JOIN sweaters swe ON m.productId = swe.productId
                                       LEFT JOIN hoodies ho ON m.productId = ho.productId
                                       LEFT JOIN sweatpants swea ON m.productId = swea.productId
                                       LEFT JOIN tiesscarf tie ON m.productId = tie.productId
                                       LEFT JOIN casual cu ON m.productId = cu.productId
                                        LEFT JOIN coatblazers co ON m.productId = co.productId
                                       WHERE m.productId IS NOT NULL
                                       AND (sh.name IS NOT NULL OR ts.name IS NOT NULL OR tr.name IS NOT NULL OR sho.name IS NOT NULL OR so.name IS NOT NULL OR bo.name IS NOT NULL OR ve.name IS NOT NULL OR ca.name IS NOT NULL OR be.name IS NOT NULL 
                                       OR wa.name IS NOT NULL OR wat.name IS NOT NULL OR ja.name IS NOT NULL  OR su.name IS NOT NULL OR swe.name IS NOT NULL OR ho.name IS NOT NULL OR swea.name IS NOT NULL OR tie.name IS NOT NULL OR cu.name IS NOT NULL OR co.name IS NOT NULL )");
    
    if ($select_products) {
        while ($fetch_product = mysqli_fetch_assoc($select_products)) {
            ?>
            <div class="box">
                <form action="" method="post">
                    <img src="images/<?php echo isset($fetch_product['shirts_image']) ? $fetch_product['shirts_image'] : $fetch_product['tshirts_image'],$fetch_product['trousers_image'],$fetch_product['shorts_image'],$fetch_product['socksandglooves_image'],$fetch_product['boxers_image'],$fetch_product['vest_image'],$fetch_product['caps_image'],$fetch_product['belts_image'],$fetch_product['wallets_image'],$fetch_product['watches_image'],$fetch_product['jackets_image'],$fetch_product['suits_image'],$fetch_product['sweaters_image'],$fetch_product['hoodies_image'],$fetch_product['sweatpants_image'],$fetch_product['tiesscarf_image'],$fetch_product['casual_image'],$fetch_product['coatblazers_image']; ?>" 
                         alt=""
                         style="width:100px;margin-left:70px;height:100px;">
                    <h3 style="margin-left:20px;width:220px;font-size:14px;margin-top:20px;position:absolute;font-family:Helvetica;color:grey;"><?php echo isset($fetch_product['shirts_name']) ? $fetch_product['shirts_name'] : $fetch_product['tshirts_name'],$fetch_product['trousers_name'],$fetch_product['shorts_name'],$fetch_product['socksandglooves_name'],$fetch_product['boxers_name'],$fetch_product['vest_name'],$fetch_product['caps_name'],$fetch_product['belts_name'],$fetch_product['wallets_name'],$fetch_product['watches_name'],$fetch_product['jackets_name'],$fetch_product['suits_name'],$fetch_product['sweaters_name'],$fetch_product['hoodies_name'],$fetch_product['sweatpants_name'],$fetch_product['tiesscarf_name'],$fetch_product['casual_name'],$fetch_product['coatblazers_name']; ?></h3>
                    <div style="margin-top:90px;margin-left:60px;font-size:18px;font-weight:700;">KSH<?php echo isset($fetch_product['shirts_price']) ? $fetch_product['shirts_price'] : $fetch_product['tshirts_price'],$fetch_product['trousers_price'],$fetch_product['shorts_price'],$fetch_product['socksandglooves_price'],$fetch_product['boxers_price'],$fetch_product['vest_price'],$fetch_product['caps_price'],$fetch_product['belts_price'],$fetch_product['wallets_price'],$fetch_product['watches_price'],$fetch_product['jackets_price'],$fetch_product['suits_price'],$fetch_product['sweaters_price'],$fetch_product['hoodies_price'],$fetch_product['sweatpants_price'],$fetch_product['tiesscarf_price'],$fetch_product['casual_price'],$fetch_product['coatblazers_price']; ?>/=</div>
                    <input type="text" name="product_name"
                           value="<?php echo isset($fetch_product['shirts_name']) ? $fetch_product['shirts_name'] : $fetch_product['tshirts_name'],$fetch_product['trousers_name'],$fetch_product['shorts_name'],$fetch_product['socksandglooves_name'],$fetch_product['boxers_name'],$fetch_product['vest_name'],$fetch_product['caps_name'],$fetch_product['belts_name'],$fetch_product['wallets_name'],$fetch_product['watches_name'],$fetch_product['jackets_name'],$fetch_product['suits_name'],$fetch_product['sweaters_name'],$fetch_product['hoodies_name'],$fetch_product['sweatpants_name'],$fetch_product['tiesscarf_name'],$fetch_product['casual_name'],$fetch_product['coatblazers_name'];?>"
                           style="margin-top:-170px;position:absolute;color:white;border:0;width:20px;">
                    <input type="text" name="product_price"
                           value="<?php echo isset($fetch_product['shirts_price']) ? $fetch_product['shirts_price'] : $fetch_product['tshirts_price'],$fetch_product['trousers_price'],$fetch_product['shorts_price'],$fetch_product['socksandglooves_price'],$fetch_product['boxers_price'],$fetch_product['vest_price'],$fetch_product['caps_price'],$fetch_product['belts_price'],$fetch_product['wallets_price'],$fetch_product['watches_price'],$fetch_product['jackets_price'],$fetch_product['suits_price'],$fetch_product['sweaters_price'],$fetch_product['hoodies_price'],$fetch_product['sweatpants_price'],$fetch_product['tiesscarf_price'],$fetch_product['casual_price'],$fetch_product['coatblazers_price'];?>"
                           style="margin-top:-150px;position:absolute;color:white;border:0;width:20px;">
                    <input type="text" name="image"
                           value="<?php echo isset($fetch_product['shirts_image']) ? $fetch_product['shirts_image'] : $fetch_product['tshirts_image'],$fetch_product['trousers_image'],$fetch_product['shorts_image'],$fetch_product['socksandglooves_image'],$fetch_product['boxers_image'],$fetch_product['vest_image'],$fetch_product['caps_image'],$fetch_product['belts_image'],$fetch_product['wallets_image'],$fetch_product['watches_image'],$fetch_product['jackets_image'],$fetch_product['suits_image'],$fetch_product['sweaters_image'],$fetch_product['hoodies_image'],$fetch_product['sweatpants_image'],$fetch_product['tiesscarf_image'],$fetch_product['casual_image'],$fetch_product['coatblazers_image']; ?>"
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