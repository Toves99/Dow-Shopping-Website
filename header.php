<header class="header">

   <div class="flex">

   <h1 class="text-light" style="margin-top:-5px;"><a href="index.html" style="color:white;">Dow</a></h1>
   <button style="width: 120px;height: 30px;position: absolute;margin-left: 90px;
        margin-top: -15px;font-size: 13px;background-color: transparent;
        border: none;color: lightgrey;">
          <span style="font-size: 12px;color:white;">Best online shop</span><br>
          Kenya
        </button>

        

        <input type="text" name="search" placeholder="Search for products and services">
        <button style="position:absolute;margin-left:790px;
        height: 40px;border-top-right-radius: 5px;border-bottom-right-radius: 5px;
        border: grey;margin-top: -10px;background-color:lightgrey;">
        <img src="images/se.png" alt="">
        </button>
        <button id="helpMain">Help
      <i class="bi bi-caret-down"></i>

      <div id="help">
      <a href="#" style="position:absolute;margin-top:10px;
        margin-left:-50px;font-size:20px;color:black;">FAQs</a>
        
      
        <a href="#" style="position:absolute;margin-top:50px;
        margin-left:-70px;font-size:20px;color:white;background-color:#fd5c28;
        width:140px;height:40px;text-decoration:none;"><i class="bi bi-chat-left-text" style="font-style:normal;
        "> chat</i></a>
        </div>
     </button>
     <button id="moreMain">More <i class="bi bi-caret-down"></i>

       <div id="more">
       <a href="#" style="position:absolute;margin-top:10px;
        margin-left:-50px;font-size:20px;color:black;">T's & C's</a>
        </div>
    </button>
    <a href="loginIndex.php">
    <button id="dsign">
      <i class="bi bi-box-arrow-in-right" style="font-size:18px;font-style:normal;"> Login</i>
   </button>
   </a>

   
        







   <?php
//session_start(); // Start or resume the session

@include 'config.php';

// ... your previous code ...

// Calculate the total number of items in the cart
$cart_item_count = 0;
if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $cart_item) {
        $cart_item_count += $cart_item['quantity'];
    }
}
?>

      <img src="images/ca.png" alt="" style="margin-top:-10px;margin-left:980px;">
      <a href="cart.php" class="cart" style="margin-top:-30px;margin-left:-17px;"><span style="font-size:15px;color:white;background-color:#fd5c28"><?php echo $cart_item_count; ?></span> </a>

      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>
<header   style="position:fixed;width:100%;background: #fd5c28;
   height:20px;margin-top:-2px; z-index:99;">
    <div class="container d-flex justify-content-between">

      <div style="position: absolute;margin-left: 30px;margin-top: 4px;">
        <p style="color: white;">
          Call or whatsapp us to order
          <span style="position: absolute;margin-left: 10px;
          font-weight:bold;color:white">0757561782</span>
        </p>
         
      </div>
      <a href="">
      <p style="position: absolute;margin-left: 86%;color: white;font-size: 13px;margin-top: 2px;">
        info.dow@ac.ke
      </p>
    </a>
    </div>
  </header><!-- End Header -->