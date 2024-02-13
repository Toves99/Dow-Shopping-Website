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
  #d1{
  position: absolute;
  margin-left: 30px;
  margin-top: 30px;
  color:black;
  width: 500px;
}
#d1:hover{
  color: #fd5c28;
  cursor: pointer;
}
#d2{
  position: absolute;
  width: 850px;
  z-index: 99;
  height: 450px;
  margin-left: 222px;
  background-color: white;
  margin-top:-54px ;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
  visibility: hidden;
}
#d1:hover #d2{
  visibility: visible;

}
#d3{
  position: absolute;
  margin-left: 30px;
  margin-top: 60px;
  color:black;
  cursor:pointer;
}
#d3:hover{
  color: #fd5c28;
}
#d31{
  position: absolute;
  width: 850px;
  z-index: 99;
  height: 450px;
  margin-left: 222px;
  background-color: white;
  margin-top:-84px ;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
  visibility: hidden;
}
#d3:hover #d31{
  visibility: visible;
  
}
#d4{
  position: absolute;
  margin-left: 30px;
  margin-top: 90px;
  color:black;
  width: 500px;
}
#d4:hover{
  color: #fd5c28;
}
#d41{
  position: absolute;
  width: 850px;
  z-index: 99;
  height: 450px;
  margin-left: 222px;
  background-color: white;
  margin-top:-114px ;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
  visibility: hidden;
}
#d4:hover #d41{
  visibility: visible;
}
#d5{
  position: absolute;
  margin-left: 30px;
  margin-top: 120px;
  width: 500px;
  color:black;
}
#d5:hover{
  color: #fd5c28;
}
#d51{
  position: absolute;
  width: 850px;
  z-index: 99;
  height: 450px;
  margin-left: 222px;
  background-color: white;
  margin-top:-144px ;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
  visibility: hidden;
}
#d5:hover #d51{
  visibility: visible;
}
#d6{
  position: absolute;
  margin-left: 30px;
  margin-top: 150px;
  width: 500px;
  color:black;
}
#d6:hover{
  color: #fd5c28;
}
#d61{
  position: absolute;
  width: 850px;
  z-index: 99;
  height: 450px;
  margin-left: 222px;
  background-color: white;
  margin-top:-174px ;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
  visibility: hidden;
}
#d6:hover #d61{
  visibility: visible;
}
#d7{
  position: absolute;
  margin-left: 30px;
  margin-top: 180px;
  width: 500px;
  color:black;
}
#d7:hover{
  color: #fd5c28;
}
#d71{
  position: absolute;
  width: 850px;
  z-index: 99;
  height: 450px;
  margin-left: 222px;
  background-color: white;
  margin-top:-204px ;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
  visibility: hidden;
}
#d7:hover #d71{
  visibility: visible;
}
#d8{
  position: absolute;
  margin-left: 30px;
  margin-top: 210px;
  color:black;
}
#d8:hover{
  color: #fd5c28;
}
#d81{
  position: absolute;
  width: 850px;
  z-index: 99;
  height: 450px;
  margin-left: 222px;
  background-color: white;
  margin-top:-234px ;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
  visibility: hidden;
}
#d8:hover #d81{
  visibility: visible;
}
#d9{
  position: absolute;
  margin-left: 30px;
  margin-top: 240px;
  width: 500px;
  color:black;
}
#d9:hover{
  color: #fd5c28;
}
#d91{
  position: absolute;
  width: 850px;
  z-index: 99;
  height: 450px;
  margin-left: 222px;
  background-color: white;
  margin-top:-264px ;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
  visibility: hidden;
}
#d9:hover #d91{
  visibility: visible;
  
}
#d10{
  position: absolute;
  margin-left: 30px;
  margin-top: 270px;
  width: 500px;
  color:black;
}
#d10:hover{
  color: #fd5c28;
}
#d101{
  position: absolute;
  width: 850px;
  z-index: 99;
  height: 450px;
  margin-left: 222px;
  background-color: white;
  margin-top:-294px ;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
  visibility: hidden;
}
#d10:hover #d101{
  visibility: visible;
}
#d11{
  position: absolute;
  margin-left: 30px;
  margin-top: 300px;
  width: 500px;
  color:black;
}
#d11:hover{
  color: #fd5c28;
}
#d111{
  position: absolute;
  width: 850px;
  z-index: 99;
  height: 450px;
  margin-left: 222px;
  background-color: white;
  margin-top:-324px ;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
  visibility: hidden;
}
#d11:hover #d111{
  visibility: visible;
}
#d12{
  position: absolute;
  margin-left: 30px;
  margin-top: 329px;
  width: 500px;
  color:black;
}
#d12:hover{
  color: #fd5c28;
}
#d112{
  position: absolute;
  width: 850px;
  z-index: 99;
  height: 450px;
  margin-left: 222px;
  background-color: white;
  margin-top:-354px ;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
  visibility: hidden;
}
#d12:hover #d112{
  visibility: visible;
}
#d13{
  position: absolute;
  margin-left: 30px;
  margin-top: 350px;
  width: 500px;
  color:black;
}
#d13:hover{
  color: #fd5c28;
}
#d113{
  position: absolute;
  width: 850px;
  z-index: 99;
  height: 450px;
  margin-left: 222px;
  background-color: white;
  margin-top:-374px ;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
  visibility: hidden;
}
#d13:hover #d113{
  visibility: visible;
}
#d14{
  position: absolute;
  margin-left: 30px;
  margin-top: 410px;
  width: 500px;
  color:black;
}
#d14:hover{
  color: #fd5c28;
}
#d114{
  position: absolute;
  width: 850px;
  z-index: 99;
  height: 450px;
  margin-left: 222px;
  background-color: white;
  margin-top:-434px ;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
  visibility: hidden;
}
#d14:hover #d114{
  visibility: visible;
}


#d15{
  position: absolute;
  margin-left: 30px;
  margin-top: 380px;
  width: 500px;
  color:black;
}
#d15:hover{
  color: #fd5c28;
}
#d115{
  position: absolute;
  width: 850px;
  z-index: 99;
  height: 450px;
  margin-left: 222px;
  background-color: white;
  margin-top:-404px ;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
  visibility: hidden;
}
#d15:hover #d115{
  visibility: visible;
}
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
<p style="position:absolute;margin-top:-20px;margin-left:30px;font-size:16px;color:black;"><a href="index.php" style="color:grey;">mtumba special/</a>men open shoes</p>
<section style="margin-top:70px;background-color:lightgrey;height:270vh;" id="pro">
      <div class="container5">
       <?php
       $select_products = mysqli_query($conn, "SELECT * FROM `mtumbamenshoesopenshoes`");
      if(mysqli_num_rows($select_products) > 0){
       while($fetch_product = mysqli_fetch_assoc($select_products)){
        ?>
      
     <div class="box">
     <form action="" method="post">
      <img src="images/<?php echo $fetch_product['image']; ?>" alt="" style="width:150px;margin-left:70px;">
      <h3 style="margin-left:20px;width:220px;font-size:14px;margin-top:-10px;position:absolute;font-family:Helvetica;color:grey;"><?php echo $fetch_product['name']; ?></h3>
      <div style="margin-top:35px;
      margin-left:90px;font-size:18px;font-weight:700;">KSH<?php echo $fetch_product['price']; ?>/=</div>
      <input type="text" name="product_name" value="<?php echo $fetch_product['name']; ?>" style="margin-top:-170px;position:absolute;color:white;border:0;
      width:20px;">
      <input type="text" name="product_price" value="<?php echo $fetch_product['price']; ?>" style="margin-top:-150px;position:absolute;color:white;border:0;
      width:20px;">
      <input type="text" name="image" value="<?php echo $fetch_product['image']; ?>" style="margin-top:-130px;position:absolute;color:white;border:0;
      width:20px;">
      <input type="submit" class="btn" value="add to cart" name="add_to_cart" id="btn">
      </form>
     </div>
    
    <?php
      };
     };
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
