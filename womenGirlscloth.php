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
    $select_products = mysqli_query($conn, "SELECT w.productId, de.name AS dresses_name, de.price AS dresses_price, de.image AS dresses_image,bl.name AS blouseskirts_name,bl.price AS blouseskirts_price,bl.image AS blouseskirts_image,ti.name AS tightsbikers_name,ti.price AS tightsbikers_price,ti.image AS tightsbikers_image,
    br.name AS brapants_name,br.price AS brapants_price,br.image AS brapants_image,swe.name AS sweaterswo_name,swe.price AS sweaterswo_price,swe.image AS sweaterswo_image,tr.name AS trousershorts_name,tr.price AS trousershorts_price,tr.image AS trousershorts_image,co.name AS coatblazerswo_name,co.price AS coatblazerswo_price,
    co.image AS coatblazerswo_image,sh.name AS sheets_name,sh.price AS sheets_price,sh.image AS sheets_image,be.name AS beltswo_name,be.price AS beltswo_price,be.image AS beltswo_image,ha.name AS handbag_name,ha.price AS handbag_price,ha.image AS handbag_image,t.name AS tops_name,t.price AS tops_price,t.image AS tops_image,
    ts.name AS tshirtswo_name,ts.price AS tshirtswo_price,ts.image AS tshirtswo_image,su.name AS suitswo_name,su.price AS suitswo_price,su.image AS suitswo_image,ja.name AS jacketswo_name,ja.price AS jacketswo_price,ja.image AS jacketswo_image
                                       FROM womenitems w
                                       LEFT JOIN 	dresses de ON w.productId = de.productId
                                       LEFT JOIN blouseskirts bl ON w.productId = bl.productId
                                       LEFT JOIN tightsbikers ti ON w.productId = ti.productId
                                       LEFT JOIN brapants br ON w.productId = br.productId
                                       LEFT JOIN sweaterswo swe ON w.productId = swe.productId
                                       LEFT JOIN trousershorts tr ON w.productId = tr.productId
                                       LEFT JOIN coatblazerswo co ON w.productId = co.productId
                                       LEFT JOIN sheets sh ON w.productId = sh.productId
                                       LEFT JOIN beltswo be ON w.productId = be.productId
                                       LEFT JOIN handbag ha ON w.productId = ha.productId
                                       LEFT JOIN tops t ON w.productId = t.productId 
                                       LEFT JOIN tshirtswo ts ON w.productId = ts.productId
                                       LEFT JOIN suitswo su ON w.productId = su.productId
                                       LEFT JOIN jacketswo ja ON w.productId = ja.productId
                                       WHERE w.productId IS NOT NULL
                                       AND (de.name IS NOT NULL OR bl.name IS NOT NULL OR ti.name IS NOT NULL OR br.name IS NOT NULL OR swe.name IS NOT NULL 
                                       OR tr.name IS NOT NULL OR co.name IS NOT NULL OR sh.name IS NOT NULL OR be.name IS NOT NULL 
                                       OR ha.name IS NOT NULL OR t.name IS NOT NULL OR ts.name IS NOT NULL  OR su.name IS NOT NULL OR ja.name IS NOT NULL )");
    if ($select_products) {
        while ($fetch_product = mysqli_fetch_assoc($select_products)) {
            ?>
            <div class="box">
                <form action="" method="post">
                    <img src="images/<?php echo isset($fetch_product['dresses_image']) ? $fetch_product['dresses_image'] : $fetch_product['blouseskirts_image'],$fetch_product['tightsbikers_image'],$fetch_product['brapants_image'],$fetch_product['sweaterswo_image'],$fetch_product['trousershorts_image'],$fetch_product['coatblazerswo_image'],$fetch_product['sheets_image'],$fetch_product['beltswo_image'],$fetch_product['handbag_image'],$fetch_product['tops_image'],$fetch_product['tshirtswo_image'],$fetch_product['suitswo_image'],$fetch_product['jacketswo_image']; ?>" 
                         alt=""
                         style="width:100px;margin-left:70px;height:100px;">
                    <h3 style="margin-left:20px;width:220px;font-size:14px;margin-top:20px;position:absolute;font-family:Helvetica;color:grey;"><?php echo isset($fetch_product['dresses_name']) ? $fetch_product['dresses_name'] : $fetch_product['blouseskirts_name'],$fetch_product['tightsbikers_name'],$fetch_product['brapants_name'],$fetch_product['sweaterswo_name'],$fetch_product['trousershorts_name'],$fetch_product['coatblazerswo_name'],$fetch_product['sheets_name'],$fetch_product['beltswo_name'],$fetch_product['handbag_name'],$fetch_product['tops_name'],$fetch_product['tshirtswo_name'],$fetch_product['suitswo_name'],$fetch_product['jacketswo_name']; ?></h3>
                    <div style="margin-top:90px;margin-left:60px;font-size:18px;font-weight:700;">KSH<?php echo isset($fetch_product['dresses_price']) ? $fetch_product['dresses_price'] : $fetch_product['blouseskirts_price'],$fetch_product['tightsbikers_price'],$fetch_product['brapants_price'],$fetch_product['sweaterswo_price'],$fetch_product['trousershorts_price'],$fetch_product['coatblazerswo_price'],$fetch_product['sheets_price'],$fetch_product['beltswo_price'],$fetch_product['handbag_price'],$fetch_product['tops_price'],$fetch_product['tshirtswo_price'],$fetch_product['suitswo_price'],$fetch_product['jacketswo_price']; ?>/=</div>
                    <input type="text" name="product_name"
                           value="<?php echo isset($fetch_product['dresses_name']) ? $fetch_product['dresses_name'] : $fetch_product['blouseskirts_name'],$fetch_product['tightsbikers_name'],$fetch_product['brapants_name'],$fetch_product['sweaterswo_name'],$fetch_product['trousershorts_name'],$fetch_product['coatblazerswo_name'],$fetch_product['sheets_name'],$fetch_product['beltswo_name'],$fetch_product['handbag_name'],$fetch_product['tops_name'],$fetch_product['tshirtswo_name'],$fetch_product['suitswo_name'],$fetch_product['jacketswo_name'];?>"
                           style="margin-top:-170px;position:absolute;color:white;border:0;width:20px;">
                    <input type="text" name="product_price"
                           value="<?php echo isset($fetch_product['dresses_price']) ? $fetch_product['dresses_price'] : $fetch_product['blouseskirts_price'],$fetch_product['tightsbikers_price'],$fetch_product['brapants_price'],$fetch_product['sweaterswo_price'],$fetch_product['trousershorts_price'],$fetch_product['coatblazerswo_price'],$fetch_product['sheets_price'],$fetch_product['beltswo_price'],$fetch_product['handbag_price'],$fetch_product['tops_price'],$fetch_product['tshirtswo_price'],$fetch_product['suitswo_price'],$fetch_product['jacketswo_price'];?>"
                           style="margin-top:-150px;position:absolute;color:white;border:0;width:20px;">
                    <input type="text" name="image"
                           value="<?php echo isset($fetch_product['dresses_image']) ? $fetch_product['dresses_image'] : $fetch_product['blouseskirts_image'],$fetch_product['tightsbikers_image'],$fetch_product['brapants_image'],$fetch_product['sweaterswo_image'],$fetch_product['trousershorts_image'],$fetch_product['coatblazerswo_image'],$fetch_product['sheets_image'],$fetch_product['beltswo_image'],$fetch_product['handbag_image'],$fetch_product['tops_image'],$fetch_product['tshirtswo_image'],$fetch_product['suitswo_image'],$fetch_product['jacketswo_image']; ?>"
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