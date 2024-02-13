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
   <link rel="stylesheet" href="css/style6.css">

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
  display:none;
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
  display: none;
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
  display: none;
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
  display: none;
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
  display: none;
}

#d7{
  position: absolute;
  margin-left: 30px;
  margin-top: 180px;
  width: 500px;
  color:black;
  justify-content:center;
  align-items:center;
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
  display:none;
}


#d8{
  position: absolute;
  margin-left: 30px;
  margin-top: 210px;
  color:black;
}
#d8:hover{
  color:#fd5c28 ;
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
  visibility: hidden;
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
  display: none;
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
  display: none;
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
  visibility: hidden;
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
  display:none;
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
  visibility: hidden;
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
  display: none;
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
  display: none;
}

.container5 {
  display: flex;
}

.box {
  flex: 0.4;
  height: 300px;
  background-color:white;
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
#prod{
  position:absolute;
  width:300px;
  height:100px;
  border:1px solid grey;
  margin-left:300px;
  margin-top:40px;
}
#imageContainer {
  display: flex;
  flex-wrap: nowrap;
  margin-top:90px;
  margin-left:100px;
}

.uploaded-image {
  padding: 30px; /* Add padding to the right side */
  
}
.fil{
  margin-top:30px;
  margin-left:70px;
}
#uploadButton{
  background-color:#fd5c28;
  color:white;
  width:130px;
  height:50px;
  border-radius:15px;
}

#myTextarea{
  position: absolute;
  width:500px;
  height:100px;
  border:1px solid #fd5c28;
  margin-top:-70px;
  margin-left:250px;
  padding-left:10px;
}
::placeholder{
  padding-top:30px;
  text-align:center;
}
.btn6{
  position:fixed;
  margin-top:300px;
}
input[type="submit"]{
    position:absolute;
    margin-top:300px;
    margin-left:380px;
    width:200px;
    height:50px;
    background-color:#fd5c28;
    border-radius:15px;
    color:white;
}
.container23{
  max-width:750px;
  background-color:#fff;
  border-radius:5px;
  width:750px;
  max-height: 350px;
  padding:20px;
  margin-top:20px;
  margin-left:20px;
  box-sizing: border-box;
  box-shadow:0 2px 2px 10px rgba(0,0,0,0.1);
  overflow: auto;
}
.wrap{
  display:flex;
  justify-content:space-between;
  align-items:center;
  width:100%;
  margin-bottom: 40px;
  padding-bottom:15px;
  border-bottom:2px solid #e4e1e1;
}
.add{
    text-decoration:none;
    display:inline-block;
    width:30px;
    height:30px;
    background-color:#8bc34a;
    font-size: 2rem;
    font-weight:bold;
    color:white;
    display:flex;
    justify-content:center;
    align-items:center;
}
.flex{
    display:flex;
    gap:1.5em;
    margin-bottom:15px;
}
.delete{
    text-decoration:none;
    display:inline-block;
    background:#f44336;
    color:white;
    font-size:1.5rem;
    font-weight:bold;
    width:30px;
    height:30px;
    color:white;
    margin-left:auto;
    display:flex;
    justify-content:center;
    align-items:center;
    cursor:pointer;

}
input{
  padding:8px 10px;
  background:#eeee;
  border:none;
  width:50%;
  border-radius:5px;
}
input:focus{
    outline:1px solid #efefef;
}
#sub{
  position:absolute;
  margin-top:30px;
  margin-left:370px;
  width:200px;
  height:40px;
  color:white;
  background-color:#fd5c28;
}
#hide{
  position:absolute;
  margin-left:800px;
  width:30px;
  height:30px;
  background-color:red;
  color:white;
  margin-top:10px;
}
#hide1{
  position:absolute;
  margin-left:800px;
  width:30px;
  height:30px;
  background-color:red;
  color:white;
  margin-top:10px;
}
#hide2{
  position:absolute;
  margin-left:810px;
  width:20px;
  height:20px;
  background-color:red;
  color:white;
  margin-top:5px;
}
#hide3{
  position:absolute;
  margin-left:810px;
  width:20px;
  height:20px;
  background-color:red;
  color:white;
  margin-top:5px;
}
#hide4{
  position:absolute;
  margin-left:810px;
  width:20px;
  height:20px;
  background-color:red;
  color:white;
  margin-top:5px;
}
#hide5{
  position:absolute;
  margin-left:810px;
  width:20px;
  height:20px;
  background-color:red;
  color:white;
  margin-top:5px;
}
#hide6{
  position:absolute;
  margin-left:810px;
  width:20px;
  height:20px;
  background-color:red;
  color:white;
  margin-top:5px;
}
#hide9{
  position:absolute;
  margin-left:810px;
  width:20px;
  height:20px;
  background-color:red;
  color:white;
  margin-top:5px;
}
#hide10{
  position:absolute;
  margin-left:810px;
  width:20px;
  height:20px;
  background-color:red;
  color:white;
  margin-top:5px;
}
#hide14{
  position:absolute;
  margin-left:810px;
  width:20px;
  height:20px;
  background-color:red;
  color:white;
  margin-top:5px;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body style="background-color:lightgrey">
   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`; window.location.href = `#pro`;"></i> </div>';
   };
};

?>

<?php include 'headerLogin.php'; ?>

<div class="container">

<section id="hero" style="background-color:lightgrey;margin-top:-10px;">
    <div style="background-color:white;width: 250px;height: 450px;
    position: absolute;margin-top: 60px;margin-left: 20px;box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);">

    <div id="d1">
     <img src="images/appliance.png" alt="" style="width: 20px;height: 20px;">
      <p id="pp2" style="position: absolute;margin-left: 30px;margin-top: -22px;font-size: 13px;height:30px;cursor:pointer;width:100%">Electronics</p>
      <div id="d2">
        <!-- ======= d2 content here ======= -->
        <button id="hide2">&#10006;</button>
        <a href="#">
        <h3 style="position: absolute;
        font-size: 16px;color: lightgrey;margin-left: 20px;margin-top: 20px;
        text-decoration: underline;">Television & Video</h3>
         </a>
        <a href="#" style="position: absolute;margin-top: 48px;margin-left: 30px;
        color: lightgrey;font-size: 14px;">Smart Tvs</a>

        <a href="#" style="position: absolute;margin-top: 72px;margin-left: 30px;
        color: lightgrey;font-size: 14px;">Smart Android Tvs</a>

        <a href="#" style="position: absolute;margin-top: 99px;margin-left: 30px;
        color: lightgrey;font-size: 14px;">Smart webos Tvs</a>

        <a href="ElectronicsAudioDevicesLogin.php">
         <h3 style="position: absolute;
        font-size: 16px;color: black;margin-left: 20px;margin-top: 150px;
        text-decoration: underline;">Audio devices</h3>
        </a>
        <a href="homeTheatreSystemLogin.php" style="position: absolute;margin-top: 180px;margin-left: 30px;
        color: grey;font-size: 14px;">Home theatre systems</a>

        <a href="#" style="position: absolute;margin-top: 210px;margin-left: 30px;
        color: lightgrey;font-size: 14px;">Sound bars</a>

        <a href="subWoofersLogin.php" style="position: absolute;margin-top: 240px;margin-left: 30px;
        color: grey;font-size: 14px;">Sub woofers</a>

        <a href="#" style="position: absolute;margin-top: 270px;margin-left: 30px;
        color: lightgrey;font-size: 14px;">Amplifiers & sound sytems</a>
        <a href="ElectronicsCameraLogin.php">
         <h3 style="position: absolute;
        font-size: 16px;color: black;margin-left: 250px;margin-top: 20px;
        text-decoration: underline;">Cameras</h3>
        </a>
        <a href="#" style="position: absolute;margin-top: 48px;margin-left: 260px;
        color: lightgrey;font-size: 14px;">Digital cameras</a>

        <a href="#" style="position: absolute;margin-top: 72px;margin-left: 260px;
        color: lightgrey;font-size: 14px;">Smart cameras</a>

        <a href="ccTvsLogin.php" style="position: absolute;margin-top: 99px;margin-left: 260px;
        color: grey;font-size: 14px;">CCTVs</a>

        <a href="#" style="position: absolute;margin-top: 129px;margin-left: 260px;
        color: lightgrey;font-size: 14px;">Camcoders & WebCam</a>


        <a href="#">
        <h3 style="position: absolute;
        font-size: 16px;color: lightgrey;margin-left: 250px;margin-top: 170px;
        text-decoration: underline;">Laptops</h3>
        </a>
        <a href="#" style="position: absolute;margin-top: 200px;margin-left: 260px;
        color: lightgrey;font-size: 14px;">Hp laptops</a>
        <a href="#" style="position: absolute;margin-top: 230px;margin-left: 260px;
        color: lightgrey;font-size: 14px;">Dell laptops</a>
        <a href="#" style="position: absolute;margin-top: 260px;margin-left: 260px;
        color: lightgrey;font-size: 14px;">Lenovo laptops</a>
        <a href="#" style="position: absolute;margin-top: 290px;margin-left: 260px;
        color: lightgrey;font-size: 14px;">Mac book</a>
        <a href="#" style="position: absolute;margin-top: 320px;margin-left: 260px;
        color: lightgrey;font-size: 14px;">acer laptops</a>

        <a href="ElectronicMobilePhone.php">
        <h3 style="position: absolute;
        font-size: 16px;color: black;margin-left: 450px;margin-top: 20px;
        text-decoration: underline;">Mobile phones</h3>
        </a>

        <a href="samsung.php" style="position: absolute;margin-top: 48px;margin-left: 460px;
        color: grey;font-size: 14px;">Samsung</a>

        <a href="oppo.php" style="position: absolute;margin-top: 72px;margin-left: 460px;
        color: grey;font-size: 14px;">Oppo</a>

        <a href="infinix.php" style="position: absolute;margin-top: 99px;margin-left: 460px;
        color: grey;font-size: 14px;">Infinix</a>

        <a href="tecno.php" style="position: absolute;margin-top: 129px;margin-left: 460px;
        color: grey;font-size: 14px;">Tecno</a>
        <a href="huawai.php" style="position: absolute;margin-top: 156px;margin-left: 460px;
        color: grey;font-size: 14px;">Huawei</a>
        <a href="xiaomRedmi.php" style="position: absolute;margin-top: 183px;margin-left: 460px;
        color: grey;font-size: 14px;">Xiaomi Redmi</a>
        <a href="itel.php" style="position: absolute;margin-top: 210px;margin-left: 460px;
        color: grey;font-size: 14px;">Itel</a>

        <a href="nokia.php" style="position: absolute;margin-top: 237px;margin-left: 460px;
        color: grey;font-size: 14px;">Nokia</a>

        <a href="sonny.php" style="position: absolute;margin-top: 264px;margin-left: 460px;
        color: grey;font-size: 14px;">Sonny</a>

        <a href="wiko.php" style="position: absolute;margin-top: 291px;margin-left: 460px;
        color: grey;font-size: 14px;">Wiko</a>

        <a href="lg.php" style="position: absolute;margin-top: 318px;margin-left: 460px;
        color: grey;font-size: 14px;">LG</a>

        <a href="realMe.php" style="position: absolute;margin-top: 345px;margin-left: 460px;
        color: grey;font-size: 14px;">RealMe</a>

         <a href="iphone.php" style="position: absolute;margin-top: 372px;margin-left: 460px;
        color: grey;font-size: 14px;">Apple (iphone)</a>

        <a href="otherBrand.php" style="position: absolute;margin-top: 399px;margin-left: 460px;
        color: grey;font-size: 14px;">Other brands</a>

        <a href="ElectronicsComputing_Accessories.php">
        <h3 style="position: absolute;
        font-size: 16px;color: black;margin-left: 630px;margin-top: 20px;
        text-decoration: underline;">Computing & Accessories</h3>
        </a>

        <a href="phoneLaptopChanger.php" style="position: absolute;margin-top: 48px;margin-left: 640px;
        color: grey;font-size: 14px;">Phone & Laptop chargers</a>

        <a href="memoryFlashCards.php" style="position: absolute;margin-top: 72px;margin-left: 640px;
        color: grey;font-size: 14px;">Memory cards & Flash disks</a>

        <a href="screenProtector.php" style="position: absolute;margin-top: 99px;margin-left: 640px;
        color: grey;font-size: 14px;">Screens & Screen protector</a>

        <a href="phoneLaptopCases.php" style="position: absolute;margin-top: 129px;margin-left: 640px;
        color: grey;font-size: 14px;">Phone & Laptop cases</a>
        <a href="laptopBags.php" style="position: absolute;margin-top: 156px;margin-left: 640px;
        color: grey;font-size: 14px;">Laptop bags</a>
        <a href="batteriePowerBank.php" style="position: absolute;margin-top: 183px;margin-left: 640px;
        color: grey;font-size: 14px;">Batteries & Power banks</a>
        <a href="earphonesHeadphones.php" style="position: absolute;margin-top: 210px;margin-left: 640px;
        color: grey;font-size: 14px;">Earphones & Headphones</a>

        <a href="remotesControl.php" style="position: absolute;margin-top: 237px;margin-left: 640px;
        color: grey;font-size: 14px;">Remote controls</a>

        <a href="bulbSwithes.php" style="position: absolute;margin-top: 264px;margin-left: 640px;
        color: grey;font-size: 14px;">Bulbs & Switches</a>

        <a href="mouseKeyboards.php" style="position: absolute;margin-top: 291px;margin-left: 640px;
        color: grey;font-size: 14px;">Mouse & Keyboards</a>

        <a href="#" style="position: absolute;margin-top: 318px;margin-left: 640px;
        color: lightgrey;font-size: 14px;">Pc,Monitors & Servers</a>
      </div>
    </div>

    <div id="d3">
      <img src="images/cloth.png" alt="" style="width: 20px;height: 20px;">
      <p id="pp3" style="position: absolute;margin-left: 30px;margin-top: -22px;font-size: 13px;height:20px;cursor:pointer;width:220px">Cloth & Fashion</p>
      <div id="d31">
      <button id="hide3">&#10006;</button>
        <!-- ======= d31 content here ======= -->
        <a href="menitems.php">
        <h3 style="position:absolute;margin-top:20px;margin-left:70px;
        text-decoration:underline;font-size:18px;color:black;">Men's items</h3>
        </a>

       <a href="shirtsmen.php" style="position: absolute;margin-top: 40px;margin-left: 80px;
        color: grey;font-size: 14px;">Shirts</a>
         <a href="t_shirtsmen.php" style="position: absolute;margin-top: 60px;margin-left: 80px;
        color: grey;font-size: 14px;">T-shirts</a>
        <a href="trousersmen.php" style="position: absolute;margin-top: 80px;margin-left: 80px;
        color: grey;font-size: 14px;">Trousers</a>
        <a href="shortsmen.php" style="position: absolute;margin-top: 100px;margin-left: 80px;
        color: grey;font-size: 14px;">Shorts</a>
        <a href="socksandglooves.php" style="position: absolute;margin-top: 120px;margin-left: 80px;
        color: grey;font-size: 14px;">Socks & glooves</a>
        <a href="boxers.php" style="position: absolute;margin-top: 140px;margin-left: 80px;
        color: grey;font-size: 14px;">Innerwear/Boxers</a>
        <a href="vest.php" style="position: absolute;margin-top: 160px;margin-left: 80px;
        color: grey;font-size: 14px;">Vest</a>
        <a href="capsmen.php" style="position: absolute;margin-top: 180px;margin-left: 80px;
        color: grey;font-size: 14px;">Caps</a>
        <a href="beltsmen.php" style="position: absolute;margin-top: 200px;margin-left: 80px;
        color: grey;font-size: 14px;">Belts</a>
        <a href="walletmen.php" style="position: absolute;margin-top: 220px;margin-left: 80px;
        color: grey;font-size: 14px;">Wallets</a>
        <a href="watchesmen.php" style="position: absolute;margin-top: 240px;margin-left: 80px;
        color: grey;font-size: 14px;">Watches</a>
        <a href="jacketsmen.php" style="position: absolute;margin-top: 260px;margin-left: 80px;
        color: grey;font-size: 14px;">Jackets</a>
        <a href="suitsmen.php" style="position: absolute;margin-top: 280px;margin-left: 80px;
        color: grey;font-size: 14px;">Suits</a>
        <a href="sweatersmen.php" style="position: absolute;margin-top: 300px;margin-left: 80px;
        color: grey;font-size: 14px;">Sweaters</a>
        <a href="hoodiesmen.php" style="position: absolute;margin-top: 320px;margin-left: 80px;
        color: grey;font-size: 14px;">hoodies</a>
        <a href="casualmen.php" style="position: absolute;margin-top: 380px;margin-left: 80px;
        color: grey;font-size: 14px;">Casual wear</a>
        <a href="sweatpantsmen.php" style="position: absolute;margin-top: 340px;margin-left: 80px;
        color: grey;font-size: 14px;">Sweatpants</a>
        <a href="tiesandscarfmen.php" style="position: absolute;margin-top: 360px;margin-left: 80px;
        color: grey;font-size: 14px;">Ties & Scarf</a>
        <a href="coatsandblazers.php" style="position: absolute;margin-top: 400px;margin-left: 80px;
        color: grey;font-size: 14px;">Coats & Blazers</a>

        
        <span style="position:absolute;width:2px;height:450px;background-color:lightgrey;
        margin-left:300px;">
        </span>
        <a href="womenGirlscloth.php">
        <h3 style="position:absolute;margin-top:20px;margin-left:380px;
        text-decoration:underline;font-size:18px;color:black;">women's items</h3>
        </a>
        <a href="dresseswomen.php" style="position: absolute;margin-top: 40px;margin-left: 390px;
        color: grey;font-size: 14px;">Dresses</a>
        <a href="blouseandskirtswomen.php" style="position: absolute;margin-top: 60px;margin-left: 390px;
        color: grey;font-size: 14px;">Blouses & skirts</a>
        <a href="tightandbikers.php" style="position: absolute;margin-top: 80px;margin-left: 390px;
        color: grey;font-size: 14px;">Tights & Bikers</a>
        <a href="braandpants.php" style="position: absolute;margin-top: 100px;margin-left: 390px;
        color: grey;font-size: 14px;">Bra & panties</a>
        <a href="sweaterwomen.php" style="position: absolute;margin-top: 120px;margin-left: 390px;
        color: grey;font-size: 14px;">Sweaters</a>
        <a href="shortsandtrousers.php" style="position: absolute;margin-top: 140px;margin-left: 390px;
        color: grey;font-size: 14px;">Shorts & trousers</a>
        <a href="coatandblazerswomen.php" style="position: absolute;margin-top: 160px;margin-left: 390px;
        color: grey;font-size: 14px;">Coats & blazers</a>
        <a href="sheets.php" style="position: absolute;margin-top: 180px;margin-left: 390px;
        color: grey;font-size: 14px;">Sheets</a>
        <a href="beltswomen.php" style="position: absolute;margin-top: 200px;margin-left: 390px;
        color: grey;font-size: 14px;">Belts</a>
        <a href="handbagswomen.php" style="position: absolute;margin-top: 220px;margin-left: 390px;
        color: grey;font-size: 14px;">Handbags</a>
        <a href="topswomen.php" style="position: absolute;margin-top: 240px;margin-left: 390px;
        color: grey;font-size: 14px;">Tops</a>
        <a href="t_shirtswomen.php" style="position: absolute;margin-top: 260px;margin-left: 390px;
        color: grey;font-size: 14px;">T-shits</a>
        <a href="suitswomen.php" style="position: absolute;margin-top: 280px;margin-left: 390px;
        color: grey;font-size: 14px;">Suits</a>
        <a href="jacketswomen.php" style="position: absolute;margin-top: 300px;margin-left: 390px;
        color: grey;font-size: 14px;">Jackets</a>
        
        
        <span style="position:absolute;width:2px;height:450px;background-color:lightgrey;
        margin-left:600px;">
        </span>

        <a href="kidcloth.php">
        <h3 style="position:absolute;margin-top:20px;margin-left:680px;
        text-decoration:underline;font-size:18px;color:black;">Kid's cloth</h3>
        </a>
         <a href="t_shirtkids.php" style="position: absolute;margin-top: 40px;margin-left: 681px;
        color: grey;font-size: 14px;">T-shirts</a>
        <a href="blouseandskirtskids.php" style="position: absolute;margin-top: 60px;margin-left: 681px;
        color: grey;font-size: 14px;">Blouses & skirts</a>
        <a href="jacketskids.php" style="position: absolute;margin-top: 80px;margin-left: 681px;
        color: grey;font-size: 14px;">Jackets</a>
        <a href="sweaterskid.php" style="position: absolute;margin-top: 100px;margin-left: 681px;
        color: grey;font-size: 14px;">Sweaters</a>
        <a href="shortandtrouserskids.php" style="position: absolute;margin-top: 120px;margin-left: 681px;
        color: grey;font-size: 14px;">Shorts & trousers</a>
        <a href="blazerskids.php" style="position: absolute;margin-top: 140px;margin-left: 681px;
        color: grey;font-size: 14px;">Blazers</a>
        <a href="shirtskid.php" style="position: absolute;margin-top: 160px;margin-left: 681px;
        color: grey;font-size: 14px;">Shirts</a>
        <a href="beltskids.php" style="position: absolute;margin-top: 180px;margin-left: 681px;
        color: grey;font-size: 14px;">Belts</a>
        <a href="backpackkids.php" style="position: absolute;margin-top: 200px;margin-left: 681px;
        color: grey;font-size: 14px;">Backpack</a>
        <a href="topkids.php" style="position: absolute;margin-top: 220px;margin-left: 681px;
        color: grey;font-size: 14px;">Tops</a>
        <a href="dresseskids.php" style="position: absolute;margin-top: 240px;margin-left: 681px;
        color: grey;font-size: 14px;">Dresses</a>
        <a href="tightkids.php" style="position: absolute;margin-top: 260px;margin-left: 681px;
        color: grey;font-size: 14px;">Tights</a>
        <a href="#" style="position: absolute;margin-top: 280px;margin-left: 681px;
        color: grey;font-size: 14px;">Shorts</a>
        <a href="sweatpantkids.php" style="position: absolute;margin-top: 300px;margin-left: 681px;
        color: grey;font-size: 14px;">Sweatpants</a>
        <a href="capkids.php" style="position: absolute;margin-top: 320px;margin-left: 681px;
        color: grey;font-size: 14px;">Caps</a>
      </div>
    </div>

    <div id="d4">
     <img src="images/bag.png" alt="" style="width: 20px;height: 20px;">
      <p id="pp4" style="position: absolute;margin-left: 30px;margin-top: -22px;font-size: 13px;cursor:pointer;width:100%">Bags</p>
      <div id="d41">
      <button id="hide4">&#10006;</button>
        <!-- ======= d41 content here ======= -->
        <a href="menBoysbag.php">
        <h3 style="position:absolute;margin-top:20px;margin-left:70px;
        text-decoration:underline;font-size:18px;color:black;">Men/Boys</h3>
        </a>
         <a href="chestBagsmen.php" style="position: absolute;margin-top: 40px;margin-left: 80px;
        color: grey;font-size: 14px;">Chest bags</a>
         <a href="handBags.php" style="position: absolute;margin-top: 60px;margin-left: 80px;
        color: grey;font-size: 14px;">Handbags</a>
        <a href="walletmen.php" style="position: absolute;margin-top: 80px;margin-left: 80px;
        color: grey;font-size: 14px;">Wallets</a>
        
        <a href="unisex.php">
       <h3 style="position:absolute;margin-top:20px;margin-left:400px;
        text-decoration:underline;font-size:18px;color:black;">Unisex</h3>
        </a>
         <a href="schoolBags.php" style="position: absolute;margin-top: 40px;margin-left: 410px;
        color: grey;font-size: 14px;">School bags</a>
         <a href="backPacks.php" style="position: absolute;margin-top: 60px;margin-left: 410px;
        color: grey;font-size: 14px;">BackPack bags</a>
        <a href="travelLaggaugeBacks.php" style="position: absolute;margin-top: 80px;margin-left: 410px;
        color: grey;font-size: 14px;">Travel & luggage bags</a>
        <a href="suitcases.php" style="position: absolute;margin-top: 100px;margin-left: 410px;
        color: grey;font-size: 14px;">Suitcase</a>
        <a href="shoppingBags.php" style="position: absolute;margin-top: 120px;margin-left: 410px;
        color: grey;font-size: 14px;">Shopping bags</a>
        <a href="shoulderBags.php" style="position: absolute;margin-top: 140px;margin-left: 410px;
        color: grey;font-size: 14px;">Shoulder bags</a>
         <a href="laptopBags.php" style="position: absolute;margin-top: 160px;margin-left: 410px;
        color: grey;font-size: 14px;">Laptop bags</a>
        <a href="lunchBags.php" style="position: absolute;margin-top: 180px;margin-left: 410px;
        color: grey;font-size: 14px;">Lunchbags</a>
        <a href="fireProofBags.php" style="position: absolute;margin-top: 200px;margin-left: 410px;
        color: grey;font-size: 14px;">Fireproof bags</a>
        <a href="digitalGearsCameraBags.php" style="position: absolute;margin-top: 220px;margin-left: 410px;
        color: grey;font-size: 14px;">Digital gears & Camera bags</a>
        <a href="Briefcases.php" style="position: absolute;margin-top: 240px;margin-left: 410px;
        color: grey;font-size: 14px;">Briefcases</a>
        
        <a href="womengirlsbag.php">
        <h3 style="position:absolute;margin-top:20px;margin-left:700px;
        text-decoration:underline;font-size:18px;color:black;">Women/Girls</h3>
        </a>
         <a href="handbags.php" style="position: absolute;margin-top: 40px;margin-left: 720px;
        color: grey;font-size: 14px;">Handbags</a>
        <a href="waistBags.php" style="position: absolute;margin-top: 60px;margin-left: 720px;
        color: grey;font-size: 14px;">Waist bags</a>
        <a href="purses.php" style="position: absolute;margin-top: 80px;margin-left: 720px;
        color: grey;font-size: 14px;">Purses</a>
      </div>
</div>

    <div id="d5">
      <img src="images/fa.png" alt="" style="width: 20px;height: 20px;">
      <p id="pp5" style="position: absolute;margin-left: 30px;margin-top: -22px;font-size: 13px;cursor:pointer;width:100%">Mtumba Special</p>
      <div id="d51">
      <button id="hide5">&#10006;</button>
        <!-- ======= d51 content here ======= -->
        <h3 style="position:absolute;margin-top:20px;margin-left:70px;
        text-decoration:underline;font-size:18px;color:black;">Men</h3>
        <a href="mtumbamencloth.php">
        <h4 style="position:absolute;margin-top:60px;margin-left:25px;
        text-decoration:underline;font-size:16px;color:black;cursor:pointer;">Cloth</h4>
        </a>
        <a href="mtumbamenclothshirt.php" style="position: absolute;margin-top: 80px;margin-left: 27px;
        color: grey;font-size: 14px;">Shirts</a>
        <a href="mtumbamenclothtshirt.php" style="position: absolute;margin-top: 100px;margin-left: 27px;
        color: grey;font-size: 14px;">T-shirts</a>
        <a href="mtumbamenclothtrouser.php" style="position: absolute;margin-top: 120px;margin-left: 27px;
        color: grey;font-size: 14px;">Trousers</a>
        <a href="mtumbamenclothsweaters.php" style="position: absolute;margin-top: 140px;margin-left: 27px;
        color: grey;font-size: 14px;">Sweaters</a>
        <a href="mtumbamenclothshort.php" style="position: absolute;margin-top: 160px;margin-left: 27px;
        color: grey;font-size: 14px;">Shorts</a>
        <a href="mtumbamenclothvest.php" style="position: absolute;margin-top: 180px;margin-left: 27px;
        color: grey;font-size: 14px;">Vest</a>
        <a href="mtumbamenclothcoat.php" style="position: absolute;margin-top: 200px;margin-left: 27px;
        color: grey;font-size: 14px;">Coat</a>
        <a href="mtumbamenclothcaps.php" style="position: absolute;margin-top: 220px;margin-left: 27px;
        color: grey;font-size: 14px;">Caps</a>
        <a href="mtumbamenclothbags.php" style="position: absolute;margin-top: 240px;margin-left: 27px;
        color: grey;font-size: 14px;">Bags</a>
        <a href="mtumbamenclothboxers.php" style="position: absolute;margin-top: 260px;margin-left: 27px;
        color: grey;font-size: 14px;">Boxers</a>
        <a href="mtumbamenclothsocks.php" style="position: absolute;margin-top: 280px;margin-left: 27px;
        color: grey;font-size: 14px;">Socks</a>
        <a href="mtumbamenclothjacket.php" style="position: absolute;margin-top: 300px;margin-left: 27px;
        color: grey;font-size: 14px;">Jackets</a>

        <a href="mtumbamenshoes.php">
        <h4 style="position:absolute;margin-top:60px;margin-left:120px;
        text-decoration:underline;font-size:16px;color:black;cursor:pointer">Shoes</h4>
        </a>
        <a href="mtumbamenshoesofficial.php" style="position: absolute;margin-top: 80px;margin-left: 122px;
        color: grey;font-size: 14px;">Official shoes</a>
         <a href="mtumbamenshoesopen.php" style="position: absolute;margin-top: 100px;margin-left: 122px;
        color: grey;font-size: 14px;">Open Shoes</a>
        <a href="mtumbamenshoesgumboots.php" style="position: absolute;margin-top: 120px;margin-left: 122px;
        color: grey;font-size: 14px;">gumboots</a>
        <a href="mtumbamenshoesslippers.php" style="position: absolute;margin-top: 140px;margin-left: 122px;
        color: grey;font-size: 14px;">Slippers/flip-flops</a>
        <a href="mtumbamenshoesrubber.php" style="position: absolute;margin-top: 160px;margin-left: 122px;
        color: grey;font-size: 14px;">Rubbers</a>
        <a href="mtumbamenshoeshiking.php" style="position: absolute;margin-top: 180px;margin-left: 122px;
        color: grey;font-size: 14px;">Hiking shoes</a>
        <a href="mtumbamenshoessport.php" style="position: absolute;margin-top: 200px;margin-left: 122px;
        color: grey;font-size: 14px;">Sports Shoes</a>
        <a href="mtumbamenshoessandals.php" style="position: absolute;margin-top: 220px;margin-left: 122px;
        color: grey;font-size: 14px;">Sandals</a>
        <a href="mtumbamenshoesloafers.php" style="position: absolute;margin-top: 240px;margin-left: 122px;
        color: grey;font-size: 14px;">Loafers</a>
        <a href="mtumbamenshoessneakers.php" style="position: absolute;margin-top: 260px;margin-left: 122px;
        color: grey;font-size: 14px;">Sneakers</a>
        <a href="mtumbamenshoessliders.php" style="position: absolute;margin-top: 280px;margin-left: 122px;
        color: grey;font-size: 14px;">Slides</a>
        
       <h3 style="position:absolute;margin-top:20px;margin-left:350px;
        text-decoration:underline;font-size:18px;color:black;">Women</h3>

        <a href="mtumbawomencloth.php">
        <h4 style="position:absolute;margin-top:60px;margin-left:300px;
        text-decoration:underline;font-size:16px;color:black;cursor:pointer">Cloth</h4>
        </a>
        <a href="mtumbawomendresses.php" style="position: absolute;margin-top: 80px;margin-left: 302px;
        color: grey;font-size: 14px;">Dresses</a>
        <a href="mtumbawomenblousesandskirts.php" style="position: absolute;margin-top: 100px;margin-left: 302px;
        color: grey;font-size: 14px;">Blouses & skirts</a>
        <a href="mtumbawomentightsandskirts.php" style="position: absolute;margin-top: 120px;margin-left: 302px;
        color: grey;font-size: 14px;">Tights & Bikers</a>
        <a href="mtumbawomenbraandpant.php" style="position: absolute;margin-top: 140px;margin-left: 302px;
        color: grey;font-size: 14px;">Bra & panties</a>
        <a href="mtumbawomensweater.php" style="position: absolute;margin-top: 160px;margin-left: 302px;
        color: grey;font-size: 14px;">Sweaters</a>
        <a href="mtumbawomenshortsandtrousers.php" style="position: absolute;margin-top: 180px;margin-left: 302px;
        color: grey;font-size: 14px;">Shorts & trousers</a>
        <a href="mtumbawomencoatandblazer.php" style="position: absolute;margin-top: 200px;margin-left: 302px;
        color: grey;font-size: 14px;">Coats & blazers</a>
        <a href="mtumbawomenshirts.php" style="position: absolute;margin-top: 220px;margin-left: 302px;
        color: grey;font-size: 14px;">Shirts</a>
        <a href="mtumbawomenbelts.php" style="position: absolute;margin-top: 240px;margin-left: 302px;
        color: grey;font-size: 14px;">Belts</a>
        <a href="mtumbawomenhandbags.php" style="position: absolute;margin-top: 260px;margin-left: 302px;
        color: grey;font-size: 14px;">Handbags</a>
        <a href="mtumbawomentops.php" style="position: absolute;margin-top: 280px;margin-left: 302px;
        color: grey;font-size: 14px;">Tops</a>
        <a href="mtumbawomentshirt.php" style="position: absolute;margin-top: 300px;margin-left: 302px;
        color: grey;font-size: 14px;">T-shirts</a>
        <a href="mtumbawomensuit.php" style="position: absolute;margin-top: 320px;margin-left: 302px;
        color: grey;font-size: 14px;">Suits</a>
        <a href="mtumbawomenjacket.php" style="position: absolute;margin-top: 340px;margin-left: 302px;
        color: grey;font-size: 14px;">Jackets</a>

        <a href="mtumbawomenshoes.php">
        <h4 style="position:absolute;margin-top:60px;margin-left:420px;
        text-decoration:underline;font-size:16px;color:black;cursor:pointer;">Shoes</h4>
        </a>
         <a href="mtumbawomenofficialshoes.php" style="position: absolute;margin-top: 80px;margin-left: 422px;
        color: grey;font-size: 14px;">Official shoes</a>
        <a href="mtumbawomenslippers.php" style="position: absolute;margin-top: 100px;margin-left: 422px;
        color: grey;font-size: 14px;">Slippers/flip-flops</a>
        <a href="mtumbawomensneakers.php" style="position: absolute;margin-top: 120px;margin-left: 422px;
        color: grey;font-size: 14px;">Sneakers</a>
        <a href="mtumbawomensliders.php" style="position: absolute;margin-top: 140px;margin-left: 422px;
        color: grey;font-size: 14px;">Sliders</a>
        <a href="mtumbawomenrubbers.php" style="position: absolute;margin-top: 160px;margin-left: 422px;
        color: grey;font-size: 14px;">Rubbers</a>
        <a href="mtumbawomengumboot.php" style="position: absolute;margin-top: 180px;margin-left: 422px;
        color: grey;font-size: 14px;">Gumboots</a>
        <a href="mtumbawomensandals.php" style="position: absolute;margin-top: 200px;margin-left: 422px;
        color: grey;font-size: 14px;">Sandals</a>
        <a href="mtumbawomenhiking.php" style="position: absolute;margin-top: 220px;margin-left: 422px;
        color: grey;font-size: 14px;">Hiking shoes</a>
        <a href="mtumbawomensport.php" style="position: absolute;margin-top: 240px;margin-left: 422px;
        color: grey;font-size: 14px;">Sport shoes</a>
        <a href="mtumbawomenhighheel.php" style="position: absolute;margin-top: 260px;margin-left: 422px;
        color: grey;font-size: 14px;">High heels</a>
        <a href="mtumbawomenboot.php" style="position: absolute;margin-top: 280px;margin-left: 422px;
        color: grey;font-size: 14px;">Boots</a>
        
        <h3 style="position:absolute;margin-top:20px;margin-left:700px;
        text-decoration:underline;font-size:18px;color:black;">Kids</h3>

        <a href="mtumbakidscloth.php">
        <h4 style="position:absolute;margin-top:60px;margin-left:609px;
        text-decoration:underline;font-size:16px;color:black;cursor:pointer;">Cloth</h4>
        </a>
         <a href="mtumbakidtshirts.php" style="position: absolute;margin-top: 80px;margin-left: 610px;
        color: grey;font-size: 14px;">T-shirts</a>
        <a href="mtumbakidblouses.php" style="position: absolute;margin-top: 100px;margin-left: 610px;
        color: grey;font-size: 14px;">Blouses & skirts</a>
        <a href="mtumbakidjacket.php" style="position: absolute;margin-top: 120px;margin-left: 610px;
        color: grey;font-size: 14px;">Jackets</a>
        <a href="mtumbakidsweater.php" style="position: absolute;margin-top: 140px;margin-left: 610px;
        color: grey;font-size: 14px;">Sweaters</a>
        <a href="mtumbakidshortandtrouser.php" style="position: absolute;margin-top: 160px;margin-left: 610px;
        color: grey;font-size: 14px;">Shorts & trousers</a>
        <a href="mtumbakidsblazers.php" style="position: absolute;margin-top: 180px;margin-left: 610px;
        color: grey;font-size: 14px;">Blazers</a>
        <a href="mtumbakidshirts.php" style="position: absolute;margin-top: 200px;margin-left: 610px;
        color: grey;font-size: 14px;">Shirts</a>
        <a href="mtumbakidsbelts.php" style="position: absolute;margin-top: 220px;margin-left: 610px;
        color: grey;font-size: 14px;">Belts</a>
        <a href="mtumbakidbackpacks.php" style="position: absolute;margin-top: 240px;margin-left: 610px;
        color: grey;font-size: 14px;">Backpack</a>
        <a href="mtumbakidtops.php" style="position: absolute;margin-top: 260px;margin-left: 610px;
        color: grey;font-size: 14px;">Tops</a>

        <a href="mtumbakidsshoes.php">
        <h4 style="position:absolute;margin-top:60px;margin-left:750px;
        text-decoration:underline;font-size:16px;color:black;cursor:pointer;">Shoes</h4>
        </a>
         <a href="mtumbakidsofficialshoes.php" style="position: absolute;margin-top: 80px;margin-left: 751px;
        color: grey;font-size: 14px;">Official shoes</a>
        <a href="mtumbakidflipflop.php" style="position: absolute;margin-top: 100px;margin-left: 751px;
        color: grey;font-size: 14px;">flip-flops</a>
        <a href="mtumbakidsneakers.php" style="position: absolute;margin-top: 120px;margin-left: 751px;
        color: grey;font-size: 14px;">Sneakers</a>
        <a href="mtumbakidsliders.php" style="position: absolute;margin-top: 140px;margin-left: 751px;
        color: grey;font-size: 14px;">Sliders</a>
        <a href="mtumbakidrubber.php" style="position: absolute;margin-top: 160px;margin-left: 751px;
        color: grey;font-size: 14px;">Rubbers</a>
        <a href="mtumbakidgumboots.php" style="position: absolute;margin-top: 180px;margin-left: 751px;
        color: grey;font-size: 14px;">Gumboots</a>
        <a href="mtumbakidsandals.php" style="position: absolute;margin-top: 200px;margin-left: 751px;
        color: grey;font-size: 14px;">Sandals</a>
        <a href="mtumbakidhiking.php" style="position: absolute;margin-top: 220px;margin-left: 751px;
        color: grey;font-size: 14px;">Hiking shoes</a>
        <a href="mtumbakidsport.php" style="position: absolute;margin-top: 240px;margin-left: 751px;
        color: grey;font-size: 14px;">Sport shoes</a>
        <a href="mtumbakidhighheel.php" style="position: absolute;margin-top: 260px;margin-left: 751px;
        color: grey;font-size: 14px;">High heels</a>
        <a href="mtumbakidboot.php" style="position: absolute;margin-top: 280px;margin-left: 751px;
        color: grey;font-size: 14px;">Boots</a>
      </div>
</div>

    <div id="d6">
      <img src="images/shoes.png" alt="" style="width: 20px;height: 20px;">
      <p id="pp6" style="position: absolute;margin-left: 30px;margin-top: -22px;font-size: 13px;cursor:pointer">Shoes</p>
      <div id="d61">
      <button id="hide6">&#10006;</button>
        <!-- ======= d61 content here ======= -->
        <a href="menshoes.php">
        <h3 style="position:absolute;margin-top:20px;margin-left:70px;
        text-decoration:underline;font-size:18px;color:black;cursor:pointer;">Men's Shoes</h3>

       <a href="menofficialshoe.php" style="position: absolute;margin-top: 40px;margin-left: 80px;
        color: grey;font-size: 14px;">Official shoes</a>
         <a href="menopenshoes.php" style="position: absolute;margin-top: 60px;margin-left: 80px;
        color: grey;font-size: 14px;">Open Shoes</a>
        <a href="mengumboots.php" style="position: absolute;margin-top: 80px;margin-left: 80px;
        color: grey;font-size: 14px;">gumboots</a>
        <a href="menslippers.php" style="position: absolute;margin-top: 100px;margin-left: 80px;
        color: grey;font-size: 14px;">Slippers/flip-flops</a>
        <a href="menrubbers.php" style="position: absolute;margin-top: 120px;margin-left: 80px;
        color: grey;font-size: 14px;">Rubbers</a>
        <a href="menhikingshoes.php" style="position: absolute;margin-top: 140px;margin-left: 80px;
        color: grey;font-size: 14px;">Hiking shoes</a>
        <a href="mensportshoes.php" style="position: absolute;margin-top: 160px;margin-left: 80px;
        color: grey;font-size: 14px;">Sports Shoes</a>
        <a href="mensandalsshoes.php" style="position: absolute;margin-top: 180px;margin-left: 80px;
        color: grey;font-size: 14px;">Sandals</a>
        <a href="menloafersshoes.php" style="position: absolute;margin-top: 200px;margin-left: 80px;
        color: grey;font-size: 14px;">Loafers</a>
        <a href="mensneakershoes.php" style="position: absolute;margin-top: 220px;margin-left: 80px;
        color: grey;font-size: 14px;">Sneakers</a>
        <a href="menslides.php" style="position: absolute;margin-top: 240px;margin-left: 80px;
        color: grey;font-size: 14px;">Slides</a>
        

        
        <span style="position:absolute;width:2px;height:450px;background-color:lightgrey;
        margin-left:300px;">
        </span>
        <a href="womenshoes.php">
        <h3 style="position:absolute;margin-top:20px;margin-left:380px;
        text-decoration:underline;font-size:18px;color:black;">women's Shoes</h3>
        </a>
        <a href="womenofficialshoes.php" style="position: absolute;margin-top: 40px;margin-left: 390px;
        color: grey;font-size: 14px;">Official shoes</a>
        <a href="womenslippers.php" style="position: absolute;margin-top: 60px;margin-left: 390px;
        color: grey;font-size: 14px;">Slippers/flip-flops</a>
        <a href="womensneaks.php" style="position: absolute;margin-top: 80px;margin-left: 390px;
        color: grey;font-size: 14px;">Sneakers</a>
        <a href="womenslides.php" style="position: absolute;margin-top: 100px;margin-left: 390px;
        color: grey;font-size: 14px;">Sliders</a>
        <a href="womenrubbers.php" style="position: absolute;margin-top: 120px;margin-left: 390px;
        color: grey;font-size: 14px;">Rubbers</a>
        <a href="womengumboots.php" style="position: absolute;margin-top: 140px;margin-left: 390px;
        color: grey;font-size: 14px;">Gumboots</a>
        <a href="womensandals.php" style="position: absolute;margin-top: 160px;margin-left: 390px;
        color: grey;font-size: 14px;">Sandals</a>
        <a href="womenhing.php" style="position: absolute;margin-top: 180px;margin-left: 390px;
        color: grey;font-size: 14px;">Hiking shoes</a>
        <a href="womensport.php" style="position: absolute;margin-top: 200px;margin-left: 390px;
        color: grey;font-size: 14px;">Sport shoes</a>
        <a href="womenhighheel.php" style="position: absolute;margin-top: 220px;margin-left: 390px;
        color: grey;font-size: 14px;">High heels</a>
        <a href="womenfashionboot.php" style="position: absolute;margin-top: 240px;margin-left: 390px;
        color: grey;font-size: 14px;">Fashion boots</a>
        
        
        
        <span style="position:absolute;width:2px;height:450px;background-color:lightgrey;
        margin-left:600px;">
        </span>

        <a href="kidsshoes.php">
        <h3 style="position:absolute;margin-top:20px;margin-left:680px;
        text-decoration:underline;font-size:18px;color:black;">Kid's shoes</h3>
        </a>
        <a href="kidofficialshoes.php" style="position: absolute;margin-top: 40px;margin-left: 681px;
        color: grey;font-size: 14px;">Official/School shoes</a>
        <a href="kidsflipflop.php" style="position: absolute;margin-top: 60px;margin-left: 681px;
        color: grey;font-size: 14px;">flip-flops</a>
        <a href="kidssneakers.php" style="position: absolute;margin-top: 80px;margin-left: 681px;
        color: grey;font-size: 14px;">Sneakers</a>
        <a href="kidslides.php" style="position: absolute;margin-top: 100px;margin-left: 681px;
        color: grey;font-size: 14px;">Sliders</a>
        <a href="kidrubbers.php" style="position: absolute;margin-top: 120px;margin-left: 681px;
        color: grey;font-size: 14px;">Rubbers</a>
        <a href="kidsgumboot.php" style="position: absolute;margin-top: 140px;margin-left: 681px;
        color: grey;font-size: 14px;">Gumboots</a>
        <a href="kidsandals.php" style="position: absolute;margin-top: 160px;margin-left: 681px;
        color: grey;font-size: 14px;">Sandals</a>
        <a href="kidhiking.php" style="position: absolute;margin-top: 180px;margin-left: 681px;
        color: grey;font-size: 14px;">Hiking shoes</a>
        <a href="kidsports.php" style="position: absolute;margin-top: 200px;margin-left: 681px;
        color: grey;font-size: 14px;">Sport shoes</a>
        <a href="kidshighheel.php" style="position: absolute;margin-top: 220px;margin-left: 681px;
        color: grey;font-size: 14px;">High heels</a>
        <a href="kidsboot.php" style="position: absolute;margin-top: 240px;margin-left: 681px;
        color: grey;font-size: 14px;">Boots</a>

      </div>
    </div>

    <div id="d7">
      <img src="images/per.png" alt="" style="width: 20px;height: 20px;">
      <p  id="pp1" style="position: absolute;margin-left: 30px;margin-top: -22px;font-size: 13px;cursor:pointer;width:100%;">Supermarket</p>
      <div id="d71">
        <!-- ======= d71 content here ======= -->
        <button id="hide1">&#10006;</button>
        <div class="container23">
            <div class="wrap">
                <h2 style="color:black;">Supermarket</h2>
                <a href="#" class="add">&plus;</a>
            </div>
            <div class="inp-group"></div>
        </div>

        <button id="sub">Submit</button>
        <!-- ======= d71 content here ======= -->
    </div>
    </div>

    <div id="d8">
      <img src="images/sup.png" alt="" style="width: 20px;height: 20px;">
      <p style="position: absolute;margin-left: 30px;margin-top: -22px;font-size: 13px;width:200%;">Beauty</p>
      <div id="d81">
        <!-- ======= d81 content here ======= -->
        <!-- ======= d81 content here ======= -->
      </div>
    </div>

    <div id="d9">
      <img src="images/b.png" alt="" style="width: 20px;height: 20px;">
      <p id="pp9" style="position: absolute;margin-left: 30px;margin-top: -22px;font-size: 13px;cursor:pointer;width:100%">Food Delivery</p>
      <div id="d91">
      <button id="hide9">&#10006;</button>
        <!-- ======= d91 content here ======= -->
        <a href="cereals.php">
        <h3 style="position:absolute;margin-top:20px;margin-left:70px;
        text-decoration:underline;font-size:18px;color:black;cursor:pointer;">Cereals</h3>
        </a>
         <a href="rice.php" style="position: absolute;margin-top: 40px;margin-left: 80px;
        color: grey;font-size: 14px;">Rice</a>
        <a href="maize.php" style="position: absolute;margin-top: 60px;margin-left: 80px;
        color: grey;font-size: 14px;">maize</a>
        <a href="beans.php" style="position: absolute;margin-top: 80px;margin-left: 80px;
        color: grey;font-size: 14px;">Beans</a>
        <a href="millet.php" style="position: absolute;margin-top: 100px;margin-left: 80px;
        color: grey;font-size: 14px;">Millet</a>
        <a href="soyabean.php" style="position: absolute;margin-top: 120px;margin-left: 80px;
        color: grey;font-size: 14px;">Soya beans</a>
        <a href="groundnut.php" style="position: absolute;margin-top: 140px;margin-left: 80px;
        color: grey;font-size: 14px;">Groundnuts</a>

        <a href="grocerie.php">
       <h3 style="position:absolute;margin-top:20px;margin-left:350px;
        text-decoration:underline;font-size:18px;color:black;cursor:pointer;">Groceries</h3>
        </a>
         <a href="fruit.php" style="position: absolute;margin-top: 40px;margin-left: 360px;
        color: grey;font-size: 14px;">Fruits</a>
        <a href="greens.php" style="position: absolute;margin-top: 60px;margin-left: 360px;
        color: grey;font-size: 14px;">Greens(Mboga)</a>
        <a href="tomatoesOnions.php" style="position: absolute;margin-top: 80px;margin-left: 360px;
        color: grey;font-size: 14px;">Tomatoes & Onions</a>
        <a href="ndumapotatoes.php" style="position: absolute;margin-top: 100px;margin-left: 360px;
        color: grey;font-size: 14px;">Nduma,Irish & Sweet Potatoes</a>
        <a href="egg.php" style="position: absolute;margin-top: 120px;margin-left: 360px;
        color: grey;font-size: 14px;">Eggs</a>

        <a href="cookedFood.php">
        <h3 style="position:absolute;margin-top:20px;margin-left:630px;
        text-decoration:underline;font-size:18px;color:black;cursor:pointer;">Packed/Cooked food</h3>
        </a>
        <a href="pizza.php" style="position: absolute;margin-top: 40px;margin-left: 631px;
        color: grey;font-size: 14px;">Pizza</a>
        <a href="chicken.php" style="position: absolute;margin-top: 60px;margin-left: 631px;
        color: grey;font-size: 14px;">Chicken fry</a>
        <a href="nyamachoma.php" style="position: absolute;margin-top: 80px;margin-left: 631px;
        color: grey;font-size: 14px;">Nyama choma</a>
      </div>
</div>

    <div id="d10">
      <img src="images/car.png" alt="" style="width: 20px;height: 20px;">
      <p id="pp10" style="position: absolute;margin-left: 30px;margin-top: -22px;font-size: 13px;cursor:pointer;width:100%">Motors $ Cycles</p>
      <div id="d101">
      <button id="hide10">&#10006;</button>
        <!-- ======= d101 content here ======= -->
        <h3 style="position:absolute;margin-top:20px;margin-left:70px;
        text-decoration:underline;font-size:18px;color:lightgrey;">Bicycle & tricycles</h3>
         <a href="#" style="position: absolute;margin-top: 40px;margin-left: 71px;
        color: lightgrey;font-size: 14px;">Normal bicycles</a>
        <a href="#" style="position: absolute;margin-top: 60px;margin-left: 71px;
        color: lightgrey;font-size: 14px;">Mountain bike</a>
        <a href="#" style="position: absolute;margin-top: 80px;margin-left: 71px;
        color: lightgrey;font-size: 14px;">Racing bicycles</a>
         <a href="#" style="position: absolute;margin-top: 100px;margin-left: 71px;
        color: lightgrey;font-size: 14px;">Tuktuk</a>
        <a href="#" style="position: absolute;margin-top: 120px;margin-left: 71px;
        color: lightgrey;font-size: 14px;">Used bicycles</a>






        <h3 style="position:absolute;margin-top:20px;margin-left:300px;
        text-decoration:underline;font-size:18px;color:lightgrey;">Motorcycles</h3>
         <a href="#" style="position: absolute;margin-top: 40px;margin-left: 301px;
        color: lightgrey;font-size: 14px;">Stars</a>
        <a href="#" style="position: absolute;margin-top: 60px;margin-left: 301px;
        color: lightgrey;font-size: 14px;">Tvs</a>
        <a href="#" style="position: absolute;margin-top: 80px;margin-left: 301px;
        color: lightgrey;font-size: 14px;">Boxers</a>
        <a href="#" style="position: absolute;margin-top: 100px;margin-left: 301px;
        color: lightgrey;font-size: 14px;">Yahama</a>
        <a href="#" style="position: absolute;margin-top: 120px;margin-left: 301px;
        color: lightgrey;font-size: 14px;">Honda</a>
        <a href="#" style="position: absolute;margin-top: 140px;margin-left: 301px;
        color: lightgrey;font-size: 14px;">Suzuki</a>






        <h3 style="position:absolute;margin-top:20px;margin-left:500px;
        text-decoration:underline;font-size:18px;color:black;">Cars</h3>
        <a href="mercedies.php" style="position: absolute;margin-top: 40px;margin-left: 501px;
        color: grey;font-size: 14px;">Mercedes</a>
        <a href="nissan.php" style="position: absolute;margin-top: 60px;margin-left: 501px;
        color: grey;font-size: 14px;">Nissan</a>
        <a href="bmw.php" style="position: absolute;margin-top: 80px;margin-left: 501px;
        color: grey;font-size: 14px;">BMW</a>
        <a href="toyota.php" style="position: absolute;margin-top: 100px;margin-left: 501px;
        color: grey;font-size: 14px;">Toyota</a>
        <a href="subaru.php" style="position: absolute;margin-top: 120px;margin-left: 501px;
        color: grey;font-size: 14px;">Subaru</a>
        <a href="suzuki.php" style="position: absolute;margin-top: 140px;margin-left: 501px;
        color: grey;font-size: 14px;">Suzuki</a>
        <a href="isuzi.php" style="position: absolute;margin-top: 160px;margin-left: 501px;
        color: grey;font-size: 14px;">Isuzu</a>
        <a href="mobius.php" style="position: absolute;margin-top: 180px;margin-left: 501px;
        color: grey;font-size: 14px;">Mobius</a>







        <h3 style="position:absolute;margin-top:20px;margin-left:650px;
        text-decoration:underline;font-size:18px;color:lightgrey;">Trucks & Trailers</h3>
         <a href="#" style="position: absolute;margin-top: 40px;margin-left: 655px;
        color: lightgrey;font-size: 14px;">Mercedes</a>
        <a href="#" style="position: absolute;margin-top: 60px;margin-left: 655px;
        color: lightgrey;font-size: 14px;">Nissan</a>
        
        <a href="#" style="position: absolute;margin-top: 80px;margin-left: 655px;
        color: lightgrey;font-size: 14px;">Toyota</a>
       
        <a href="#" style="position: absolute;margin-top: 100px;margin-left: 655px;
        color: lightgrey;font-size: 14px;">Suzuki</a>
        <a href="#" style="position: absolute;margin-top: 120px;margin-left: 655px;
        color: lightgrey;font-size: 14px;">Isuzu</a>
        <a href="#" style="position: absolute;margin-top: 140px;margin-left: 655px;
        color: lightgrey;font-size: 14px;">Mobius</a>

        <span style="position:absolute;margin-top:250px;background-color:lightgrey;width:850px;height:2px;
        "></span>
        <h3 style="position:absolute;margin-top:260px;margin-left:300px;
        font-size:18px;color:#fd5c28;font-weight:bold;">Car's elecronics ,Parts & Services</h3>
        <a href="#" style="position: absolute;margin-top: 300px;margin-left: 70px;
        color: grey;font-size: 14px;">Spareparts</a>
        <a href="#" style="position: absolute;margin-top: 300px;margin-left: 350px;
        color: grey;font-size: 14px;">Android radios</a>
        <a href="#" style="position: absolute;margin-top: 300px;margin-left: 600px;
        color: grey;font-size: 14px;">Security & safety alarms</a>
        <a href="#" style="position: absolute;margin-top: 320px;margin-left: 70px;
        color: grey;font-size: 14px;">Car engines</a>
        <a href="#" style="position: absolute;margin-top: 320px;margin-left: 350px;
        color: grey;font-size: 14px;">Car wheels/tyres</a>
        <a href="#" style="position: absolute;margin-top: 320px;margin-left: 600px;
        color: grey;font-size: 14px;">Batteries</a>
         <a href="#" style="position: absolute;margin-top: 340px;margin-left: 70px;
        color: grey;font-size: 14px;">Car repainting services</a>
         <a href="#" style="position: absolute;margin-top: 340px;margin-left: 350px;
        color: grey;font-size: 14px;">Buffing services</a>

        <p style="position:absolute;margin-top:400px;
        margin-left:160px;color:black;">Do you need a professional mechanic to work on your car?<a href="#" style="color:#fd5c28;font-style:italic">Click here</a> </p>
      </div>
</div>

    <div id="d11">
    <img src="images/kids.png" alt="" style="width: 20px;height: 20px;">
      <p style="position: absolute;margin-left: 30px;margin-top: -22px;font-size: 13px;width: 200px;color:lightgrey">Baby products</p>
      <div id="d111">
        <!-- ======= d111 content here ======= -->
        <h3 style="position:absolute;margin-top:20px;margin-left:380px;
        text-decoration:underline;font-size:18px;color:black;">Baby products</h3>
        <a href="#" style="position: absolute;margin-top: 70px;margin-left: 70px;
        color: grey;font-size: 14px;">Diaper Bags</a>
        <a href="#" style="position: absolute;margin-top: 70px;margin-left: 350px;
        color: grey;font-size: 14px;">Disposable diapers</a>
        <a href="#" style="position: absolute;margin-top: 70px;margin-left: 600px;
        color: grey;font-size: 14px;">Wipes & Holders</a>
         <a href="#" style="position: absolute;margin-top: 90px;margin-left: 70px;
        color: grey;font-size: 14px;">Walkers</a>
         <a href="#" style="position: absolute;margin-top: 90px;margin-left: 350px;
        color: grey;font-size: 14px;">Bagpacks & Carriers</a>
         <a href="#" style="position: absolute;margin-top: 90px;margin-left: 600px;
        color: grey;font-size: 14px;">Swings,Jumpers & Bouncers</a>
        <a href="#" style="position: absolute;margin-top: 110px;margin-left: 70px;
        color: grey;font-size: 14px;">Toy gift set</a>
        <a href="#" style="position: absolute;margin-top: 110px;margin-left: 350px;
        color: grey;font-size: 14px;">Bottle feeding</a>
        <a href="#" style="position: absolute;margin-top: 110px;margin-left: 600px;
        color: grey;font-size: 14px;">Potties & seats</a>
        <a href="#" style="position: absolute;margin-top: 10px;margin-left: 70px;
        color: grey;font-size: 14px;">Thermometers</a>
      </div>
</div>

    
    <div id="d12">
     <img src="images/del.png" alt="" style="width: 20px;height: 20px;">
      <p id="p56" style="position: absolute;margin-left: 30px;margin-top: -22px;font-size: 13px;width: 200px;color:black;cursor:pointer">Niletee</p>
      <div id="d112">
        <button id="hide">&#10006;</button>
        <!-- ======= d112 content here ======= -->
        <div class="fil">
        <input type="file" id="fileInput" style="display: none;" accept="image/*">
       <button id="uploadButton"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload Image</button>
       
       </div>
        <!--<input type="text" name="descri">-->
        <textarea id="myTextarea" name="myTextarea" rows="4" cols="50" placeholder="Describe your product here by stating the quantity,quality and color of the product"></textarea>
        <input type="submit" value="submit">
        <div id="imageContainer"></div>
        
        <!-- ======= d112 content here ======= -->
      </div>
      </div>

    <div id="d13">
      <img src="images/tracker.png" alt="" style="width: 20px;height: 20px;">
      <p style="position: absolute;margin-left: 30px;margin-top: -22px;font-size: 13px;width: 200px;color:lightgrey">Sport outfit</p>
      <div id="d113">
        <!-- ======= d113 content here ======= -->
        <h3 style="position:absolute;margin-top:20px;margin-left:380px;
        text-decoration:underline;font-size:18px;color:black;">Sport outfit</h3>
        <a href="#" style="position: absolute;margin-top: 70px;margin-left: 70px;
        color: grey;font-size: 14px;">Track suit</a>
        <a href="#" style="position: absolute;margin-top: 90px;margin-left: 70px;
        color: grey;font-size: 14px;">Gym wear</a>
        <a href="#" style="position: absolute;margin-top: 70px;margin-left: 350px;
        color: grey;font-size: 14px;">Swimming customs(swimsuit)</a>
        <a href="#" style="position: absolute;margin-top: 90px;margin-left: 350px;
        color: grey;font-size: 14px;">Sweat pants</a>
        <a href="#" style="position: absolute;margin-top: 70px;margin-left: 600px;
        color: grey;font-size: 14px;">Running shoes</a>
        <a href="#" style="position: absolute;margin-top: 90px;margin-left: 600px;
        color: grey;font-size: 14px;">Boots</a>
        <a href="#" style="position: absolute;margin-top: 110px;margin-left: 70px;
        color: grey;font-size: 14px;">Game Balls</a>
        <a href="#" style="position: absolute;margin-top: 110px;margin-left: 350px;
        color: grey;font-size: 14px;">Hockey stick</a>
        <a href="#" style="position: absolute;margin-top: 110px;margin-left: 600px;
        color: grey;font-size: 14px;">Track suit</a>
         <a href="#" style="position: absolute;margin-top: 130px;margin-left: 350px;
        color: grey;font-size: 14px;">Athlete's wear</a>
         <a href="#" style="position: absolute;margin-top: 130px;margin-left: 70px;
        color: grey;font-size: 14px;">Joggers</a>
         <a href="#" style="position: absolute;margin-top: 130px;margin-left: 600px;
        color: grey;font-size: 14px;">Sporting foot wear</a>
        <a href="#" style="position: absolute;margin-top: 150px;margin-left: 70px;
        color: grey;font-size: 14px;">Football kits</a>
        <a href="#" style="position: absolute;margin-top: 150px;margin-left: 350px;
        color: grey;font-size: 14px;">Tennis ball kits</a>
        <a href="#" style="position: absolute;margin-top: 150px;margin-left: 600px;
        color: grey;font-size: 14px;">Vollay ball Kits</a>
        <a href="#" style="position: absolute;margin-top: 170px;margin-left: 70px;
        color: grey;font-size: 14px;">Rugby ball kits</a>
        <a href="#" style="position: absolute;margin-top: 170px;margin-left: 350px;
        color: grey;font-size: 14px;">BasketBall kits</a>
      </div>
      </div>

    <div id="d14">
      <img src="images/other.png" alt="" style="width: 20px;height: 20px;">
      <p id="pp14" style="position: absolute;margin-left: 30px;margin-top: -22px;font-size: 13px;width: 200px;font-weight: bold;font-style: italic;cursor:pointer;width:100%">Other Services</p>
      <div id="d114">
      <button id="hide14">&#10006;</button>
        <!-- ======= d114 content here ======= -->
        <h3 style="position:absolute;margin-top:20px;margin-left:340px;
        font-size:18px;color:#fd5c28;font-weight:bold;">Services we offer:</h3>
        <button style="position:absolute;width:350px;height:40px;
        margin-top:80px;margin-left:30px;border:0;background-color:black;color:white;border-radius:10px;">Website & Mobile app development</button>
        <button style="position:absolute;width:350px;height:40px;
        margin-top:140px;margin-left:30px;border:0;background-color:black;color:white;border-radius:10px;">Hire house managers</button>
        <button style="position:absolute;width:350px;height:40px;
        margin-top:200px;margin-left:30px;border:0;background-color:black;color:white;border-radius:10px;">Tour,Travels & Safaris</button>





        <button style="position:absolute;width:350px;height:40px;
        margin-top:80px;margin-left:470px;border:0;background-color:black;color:white;border-radius:10px;">Hire mechanic</button>
        <button style="position:absolute;width:350px;height:40px;
        margin-top:140px;margin-left:470px;border:0;background-color:black;color:white;border-radius:10px;">Get a shopper</button>
        <button style="position:absolute;width:350px;height:40px;
        margin-top:200px;margin-left:470px;border:0;background-color:black;color:white;border-radius:10px;">Sell your product with us</button>
        
        <span style="position:absolute;width:850px;height:2px;background-color:grey;
        margin-top:290px;"></span>

        <h3 style="position:absolute;margin-top:330px;margin-left:30px;
        font-size:24px;color:#fd5c28;font-weight:bold;">Our partners:</h3>
        <a href="#" style="position: absolute;margin-top: 335px;margin-left: 200px;
        color: black;font-size: 14px;">Maw Institute of Digital Engineering</a>
      </div>
      </div>

    <div id="d15">
      <img src="images/home.png" alt="" style="width: 20px;height: 20px;">
      <p style="position: absolute;margin-left: 30px;margin-top: -22px;font-size: 14px;width: 200px;color:lightgrey">Home & Office</p>
      <div id="d115">
        <!-- ======= d114 content here ======= -->
        <h4 style="margin-left:170px;color:black;font-size:18px;font-weight:bold;
        position:absolute;margin-top:10px;text-decoration:underline;">Home</h4>
        <a href="kitchenAppliances.php">
        <h3 style="position: absolute;
        font-size: 16px;color: black;margin-left: 20px;margin-top: 34px;
        text-decoration: underline;">Kitchen Appliances</h3>
        </a>
        <a href="cups.php" style="position: absolute;margin-top: 50px;margin-left: 30px;
        color: grey;font-size: 14px;">Cups</a>

        <a href="plates.php" style="position: absolute;margin-top: 70px;margin-left: 30px;
        color: grey;font-size: 14px;">plates</a>

        <a href="spoons.php" style="position: absolute;margin-top: 90px;margin-left: 30px;
        color: grey;font-size: 14px;">spoons</a>

       <a href="cookingPans.php" style="position: absolute;margin-top: 110px;margin-left: 30px;
        color: grey;font-size: 14px;">Cooking pans</a>

       <a href="fridges.php" style="position: absolute;margin-top: 130px;margin-left: 30px;
        color: grey;font-size: 14px;">Fridge</a>

      <a href="microwavesCookwaves.php" style="position: absolute;margin-top: 150px;margin-left: 30px;
        color: grey;font-size: 14px;">Microwaves & Cookwave</a>

      <a href="heaters.php" style="position: absolute;margin-top: 170px;margin-left: 30px;
        color: grey;font-size: 14px;">Heaters</a>

     <a href="wallArts.php" style="position: absolute;margin-top: 190px;margin-left: 30px;
        color: grey;font-size: 14px;">Wall art</a>

     <a href="culteryKnifeAccessories.php" style="position: absolute;margin-top: 210px;margin-left: 30px;
        color: grey;font-size: 14px;">Cultlery & Knife Accessories</a>
        <a href="beddings.php">
       <h3 style="position: absolute;
        font-size: 16px;color: black;margin-left: 20px;margin-top: 240px;
        text-decoration: underline;">Beddings</h3>
        </a>
       <a href="bedShits.php" style="position: absolute;margin-top: 260px;margin-left: 30px;
        color: grey;font-size: 14px;">Bedshits</a>

       <a href="pillows.php" style="position: absolute;margin-top: 280px;margin-left: 30px;
        color: grey;font-size: 14px;">Pillows</a>

      <a href="blankets.php" style="position: absolute;margin-top: 300px;margin-left: 30px;
        color: grey;font-size: 14px;">Blankets</a>

      <a href="tedybears.php" style="position: absolute;margin-top: 320px;margin-left: 30px;
        color: grey;font-size: 14px;">tedybear</a>

     <a href="mattress.php" style="position: absolute;margin-top: 340px;margin-left: 30px;
        color: grey;font-size: 14px;">Mattress</a>

     <a href="mattressCovers.php" style="position: absolute;margin-top: 360px;margin-left: 30px;
        color: grey;font-size: 14px;">Mattress covers</a>

     <a href="mosquitoesNets.php" style="position: absolute;margin-top: 380px;margin-left: 30px;
        color: grey;font-size: 14px;">Mosquito nets</a>
        <a href="homeFurnitures.php">
        <h3 style="position: absolute;
        font-size: 16px;color: black;margin-left: 250px;margin-top: 34px;
        text-decoration: underline;">Furnitures</h3>
        </a>
        <a href="sofaSets.php" style="position: absolute;margin-top: 55px;margin-left: 260px;
        color: grey;font-size: 14px;">Sofaset</a>

        <a href="plasticChairs.php" style="position: absolute;margin-top: 75px;margin-left: 260px;
        color: grey;font-size: 14px;">Plastic chairs</a>

        <a href="metalicChairs.php" style="position: absolute;margin-top: 95px;margin-left: 260px;
        color: grey;font-size: 14px;">Metalic chairs</a>

        <a href="tables.php" style="position: absolute;margin-top: 115px;margin-left: 260px;
        color: grey;font-size: 14px;">Tables</a>

         <a href="beds.php" style="position: absolute;margin-top: 135px;margin-left: 260px;
        color: grey;font-size: 14px;">Beds</a>
        <a href="drawers.php" style="position: absolute;margin-top: 155px;margin-left: 260px;
        color: grey;font-size: 14px;">Drawers</a>
        <a href="cupboards.php" style="position: absolute;margin-top: 175px;margin-left: 260px;
        color: grey;font-size: 14px;">Cupboards</a>
        <a href="tvStands.php" style="position: absolute;margin-top: 195px;margin-left: 260px;
        color: grey;font-size: 14px;">Tv stands</a>
        <a href="homeDecors.php">
        <h3 style="position: absolute;
        font-size: 16px;color: black;margin-left: 250px;margin-top: 220px;
        text-decoration: underline;">Home decors</h3>
        </a>
        <a href="cushions.php" style="position: absolute;margin-top: 240px;margin-left: 260px;
        color: grey;font-size: 14px;">Cushions</a>

       <a href="curtains.php" style="position: absolute;margin-top: 260px;margin-left: 260px;
        color: grey;font-size: 14px;">Curtains</a>

       <a href="carpents.php" style="position: absolute;margin-top: 280px;margin-left: 260px;
        color: grey;font-size: 14px;">Carpets</a>

      <a href="floorMats.php" style="position: absolute;margin-top: 300px;margin-left: 260px;
        color: grey;font-size: 14px;">Floor mats</a>

       

     


        <span style="position:absolute;width:2px;height:450px;background-color:lightgrey;
        margin-left:410px;"></span>

        <h4 style="position:absolute;margin-left:580px;
        font-size:18px;font-weight:bold;color:black;margin-top:10px;
        text-decoration:underline;">Office</h4>
        <a href="officeFurnitures.php">
        <h3 style="position: absolute;
        font-size: 16px;color: black;margin-left: 450px;margin-top: 40px;
        text-decoration:underline;">Furnitures</h3>
        </a>
        <a href="workingTables.php" style="position: absolute;margin-top: 60px;margin-left: 460px;
        color: grey;font-size: 14px;">Working tables</a>

        <a href="officeChairs.php" style="position: absolute;margin-top: 80px;margin-left: 460px;
        color: grey;font-size: 14px;">Office chairs</a>
        <a href="officeCabinets.php" style="position: absolute;margin-top: 100px;margin-left: 460px;
        color: grey;font-size: 14px;">Office cabinets</a>
        <a href="stationaries.php">
        <h3 style="position: absolute;
        font-size: 16px;color: black;margin-left: 630px;margin-top: 40px;
        text-decoration: underline;">Stationaries</h3>
        </a>
          <a href="whiteBoardMarkers.php" style="position: absolute;margin-top: 60px;margin-left: 640px;
        color: grey;font-size: 14px;">Whiteboard & markers</a>

        <a href="noteBooks.php" style="position: absolute;margin-top: 80px;margin-left: 640px;
        color: grey;font-size: 14px;">Notebooks</a>

        <a href="pensPencils.php" style="position: absolute;margin-top: 100px;margin-left: 640px;
        color: grey;font-size: 14px;">Pens & pencils</a>
      </div>
</div>
    </div>
<!-- ======= our advertsiment ======= -->
    <div style="position: absolute;width: 800px;height: 450px;margin-left: 300px;background-color: lightgrey;
    margin-top:60px ;">

    </div>
    
<!-- ======= advertsiment ======= -->
    <div style="position: absolute;width: 200px;height: 220px;margin-left: 1130px;background-color:white;
    margin-top:60px ;box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);">
    <p style="position: absolute;font-size: 15px;margin-left: 10px;margin-top: 10px;width: 180px;">
      SignUp to high quality products, affordable price & reliable
      sources
    </p>

    <a href="SignUp.php">
    <button style="position: absolute;margin-top: 120px;margin-left: 10px;width: 180px;
    border-radius: 10px;background-color:#fd5c28;border: none;color: white;cursor:pointer;">
      SignUp
    </button>
    </a>

    <a href="login.php">
    <button style="position: absolute;margin-top: 168px;margin-left: 10px;width: 180px;
    border-radius: 10px;background-color:white;border: 1px solid black;color: black;cursor:pointer;">
      SignIn
    </button>
    </a>
    </div>




    <div style="position: absolute;width: 200px;height: 220px;margin-left: 1130px;background-color:white;
    margin-top:295px ;box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);">

    </div>
  </section><!-- End Hero -->

<section style="margin-top:420px;background-color:lightgrey;height:270vh;" id="pro">
<div style="position: absolute;background-color:lightgrey;width: 1300px;height: 350px;margin-left: 20px;margin-top: 80px;">
      <div style="background-color: lightgrey;width: 1300px;height: 40px;">
        <h5 style="position: absolute;margin-left: 10px;margin-top: 6px;
        color: white;font-size:19px;color:black;">Electronics & Computing</h5>
        <span style="margin-left: 93%;position: absolute;margin-top: 6px;">
          <a href="#" style="color:black;font-size:18px;font-weight:600;">See all</a>
        </span>
      </div>
      
      <div class="container5">
     
       <?php
       $select_products = mysqli_query($conn, "SELECT * FROM `electronics`");
      if(mysqli_num_rows($select_products) > 0){
       while($fetch_product = mysqli_fetch_assoc($select_products)){
        ?>
      
     <div class="box">
     <form action="" method="post">
      <img src="images/<?php echo $fetch_product['image']; ?>" alt="" style="width:100px;margin-left:70px;height:100px;">
      <h3 style="margin-left:20px;width:220px;font-size:14px;margin-top:40px;position:absolute;font-family:Helvetica;color:grey;"><?php echo $fetch_product['name']; ?></h3>
      <div style="margin-top:80px;
      margin-left:60px;font-size:18px;font-weight:700;">KSH<?php echo $fetch_product['price']; ?>/=</div>
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
  </div>



  <div style="position: absolute;background-color:lightgrey;width: 1300px;height: 350px;margin-left: 20px;margin-top: 470px;">
      <div style="background-color: lightgrey;width: 1300px;height: 40px;">
        <h5 style="position: absolute;margin-left: 10px;margin-top: 6px;
        color: white;font-size:19px;color:black;">Cloth & Shoes</h5>
        <span style="margin-left: 93%;position: absolute;margin-top: 6px;">
          <a href="#" style="color: black;font-size:18px;font-weight:600;">See all</a>
        </span>
      </div>
      
      <div class="container5">
     
       <?php
       $select_products = mysqli_query($conn, "SELECT * FROM `clothFashion`");
      if(mysqli_num_rows($select_products) > 0){
       while($fetch_product = mysqli_fetch_assoc($select_products)){
        ?>
      
     <div class="box">
     <form action="" method="post">
     <img src="images/<?php echo $fetch_product['image']; ?>" alt="" style="width:80px;margin-left:70px;height:100px;">
      <h3 style="margin-left:20px;width:220px;font-size:14px;margin-top:40px;position:absolute;font-family:Helvetica;color:grey;"><?php echo $fetch_product['name']; ?></h3>
      <div style="margin-top:90px;
      margin-left:60px;font-size:18px;font-weight:700;">KSH<?php echo $fetch_product['price']; ?>/=</div>
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
  </div>





  <div style="position: absolute;background-color:lightgrey;width: 1300px;height: 350px;margin-left: 20px;margin-top: 860px;">
      <div style="background-color: lightgrey;width: 1300px;height: 40px;">
        <h5 style="position: absolute;margin-left: 10px;margin-top: 6px;
        color: white;font-size:19px;color:black;">Bags</h5>
        <span style="margin-left: 93%;position: absolute;margin-top: 6px;">
          <a href="#" style="color:black;font-size:18px;font-weight:600;">See all</a>
        </span>
      </div>
      
      <div class="container5">
     
       <?php
       $select_products = mysqli_query($conn, "SELECT * FROM `bags`");
      if(mysqli_num_rows($select_products) > 0){
       while($fetch_product = mysqli_fetch_assoc($select_products)){
        ?>
      
     <div class="box">
     <form action="" method="post">
      <img src="images/<?php echo $fetch_product['image']; ?>" alt="" style="width:100px;margin-left:70px;height:70px">
      <h3 style="margin-left:20px;width:220px;font-size:14px;margin-top:40px;position:absolute;font-family:Helvetica;color:grey;"><?php echo $fetch_product['name']; ?></h3>
      <div style="margin-top:100px;
      margin-left:60px;font-size:18px;font-weight:700;">KSH<?php echo $fetch_product['price']; ?>/=</div>
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
  </div>



  <div style="position: absolute;background-color:lightgrey;width: 1300px;height: 350px;margin-left: 20px;margin-top: 1250px;">
      <div style="background-color: lightgrey;width: 1300px;height: 40px;">
        <h5 style="position: absolute;margin-left: 10px;margin-top: 6px;
        color: white;font-size:20px;color:black;">Food & Food delivery</h5>
        <span style="margin-left: 93%;position: absolute;margin-top: 6px;">
          <a href="#" style="color:black;font-size:20px;font-weight:600;">See all</a>
        </span>
      </div>
      
      <div class="container5">
     
       <?php
       $select_products = mysqli_query($conn, "SELECT * FROM `fooddelivery`");
      if(mysqli_num_rows($select_products) > 0){
       while($fetch_product = mysqli_fetch_assoc($select_products)){
        ?>
      
     <div class="box">
     <form action="" method="post">
      <img src="images/<?php echo $fetch_product['image']; ?>" alt="" style="width:100px;margin-left:70px;height:70px">
      <h3 style="margin-left:20px;width:220px;font-size:14px;margin-top:40px;position:absolute;font-family:Helvetica;color:grey;"><?php echo $fetch_product['name']; ?></h3>
      <div style="margin-top:100px;
      margin-left:60px;font-size:18px;font-weight:700;">KSH<?php echo $fetch_product['price']; ?>/=</div>
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
<script>
    var maxImages = 4; // Maximum number of images allowed

    document.getElementById('uploadButton').addEventListener('click', function () {
        if (document.querySelectorAll('.uploaded-image').length < maxImages) {
            document.getElementById('fileInput').click();
        } else {
            alert('You can upload a maximum of ' + maxImages + ' images.');
        }
    });

    document.getElementById('fileInput').addEventListener('change', function () {
        const files = this.files;
        const currentImagesCount = document.querySelectorAll('.uploaded-image').length;
        const remainingImages = maxImages - currentImagesCount;

        for (let i = 0; i < files.length && i < remainingImages; i++) {
            const file = files[i];
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function (event) {
                    const img = new Image();
                    img.src = event.target.result;
                    img.style.maxWidth = '200px';
                    img.style.maxHeight = '200px'; // Adjust the max width as needed
                    img.className = 'uploaded-image';
                    document.getElementById('imageContainer').appendChild(img);
                };
                reader.readAsDataURL(file);
            } else {
                alert('Please select an image file.');
            }
        }

        // Clear the file input to allow selecting the same file again
        this.value = '';
    });
</script>




<script>
    // Get references to the divs and the "Hide" button
    const d12Div = document.getElementById('p56');
    const hideButton = document.getElementById('hide');
    const hiddenDiv = document.getElementById('d112');

    // Add click event listener to the "d12" div
    d12Div.addEventListener('click', () => {
        // Show the hidden div (d112)
        hiddenDiv.style.display = 'block';
    });

    // Add click event listener to the "Hide" button
    hideButton.addEventListener('click', () => {
        // Hide the hidden div (d112)
        hiddenDiv.style.display = 'none';
    });
</script>


<script>
    // Get references to the divs and the "Hide" button
    const d12Div1 = document.getElementById('pp1');
    const hideButton1 = document.getElementById('hide1');
    const hiddenDiv1 = document.getElementById('d71');

    // Add click event listener to the "d12" div
    d12Div1.addEventListener('click', () => {
        // Show the hidden div (d112)
        hiddenDiv1.style.display = 'block';
        d12Div1.style.color = '#fd5c28';
    });

    // Add click event listener to the "Hide" button
    hideButton1.addEventListener('click', () => {
        // Hide the hidden div (d112)
        hiddenDiv1.style.display = 'none';
        d12Div1.style.color = '';
    });
</script>


<script>
    // Get references to the divs and the "Hide" button
    const d12Div2 = document.getElementById('pp2');
    const hideButton2 = document.getElementById('hide2');
    const hiddenDiv2 = document.getElementById('d2');

    // Add click event listener to the "d12" div
    d12Div2.addEventListener('click', () => {
        // Show the hidden div (d112)
        hiddenDiv2.style.display = 'block';
        d12Div2.style.color = '#fd5c28';
    });

    // Add click event listener to the "Hide" button
    hideButton2.addEventListener('click', () => {
        // Hide the hidden div (d112)
        hiddenDiv2.style.display = 'none';
        d12Div2.style.color = '';
    });
</script>

<script>
    // Get references to the divs and the "Hide" button
    const d12Div3 = document.getElementById('pp3');
    const hideButton3 = document.getElementById('hide3');
    const hiddenDiv3 = document.getElementById('d31');

    // Add click event listener to the "d12" div
    d12Div3.addEventListener('click', () => {
        // Show the hidden div (d112)
        hiddenDiv3.style.display = 'block';
        d12Div3.style.color = '#fd5c28';
    });

    // Add click event listener to the "Hide" button
    hideButton3.addEventListener('click', () => {
        // Hide the hidden div (d112)
        hiddenDiv3.style.display = 'none';
        d12Div3.style.color = '';
    });
</script>

<script>
    // Get references to the divs and the "Hide" button
    const d12Div4 = document.getElementById('pp4');
    const hideButton4 = document.getElementById('hide4');
    const hiddenDiv4 = document.getElementById('d41');

    // Add click event listener to the "d12" div
    d12Div4.addEventListener('click', () => {
        // Show the hidden div (d112)
        hiddenDiv4.style.display = 'block';
        d12Div4.style.color = '#fd5c28';
    });

    // Add click event listener to the "Hide" button
    hideButton4.addEventListener('click', () => {
        // Hide the hidden div (d112)
        hiddenDiv4.style.display = 'none';
        d12Div4.style.color = '';
    });
</script>

<script>
    // Get references to the divs and the "Hide" button
    const d12Div5 = document.getElementById('pp5');
    const hideButton5 = document.getElementById('hide5');
    const hiddenDiv5 = document.getElementById('d51');

    // Add click event listener to the "d12" div
    d12Div5.addEventListener('click', () => {
        // Show the hidden div (d112)
        hiddenDiv5.style.display = 'block';
        d12Div5.style.color = '#fd5c28';
    });

    // Add click event listener to the "Hide" button
    hideButton5.addEventListener('click', () => {
        // Hide the hidden div (d112)
        hiddenDiv5.style.display = 'none';
        d12Div5.style.color = '';
    });
</script>

<script>
    // Get references to the divs and the "Hide" button
    const d12Div6 = document.getElementById('pp6');
    const hideButton6 = document.getElementById('hide6');
    const hiddenDiv6 = document.getElementById('d61');

    // Add click event listener to the "d12" div
    d12Div6.addEventListener('click', () => {
        // Show the hidden div (d112)
        hiddenDiv6.style.display = 'block';
        d12Div6.style.color = '#fd5c28';
    });

    // Add click event listener to the "Hide" button
    hideButton6.addEventListener('click', () => {
        // Hide the hidden div (d112)
        hiddenDiv6.style.display = 'none';
        d12Div6.style.color = '';
    });
</script>

<script>
    // Get references to the divs and the "Hide" button
    const d12Div9 = document.getElementById('pp9');
    const hideButton9 = document.getElementById('hide9');
    const hiddenDiv9 = document.getElementById('d91');

    // Add click event listener to the "d12" div
    d12Div9.addEventListener('click', () => {
        // Show the hidden div (d112)
        hiddenDiv9.style.display = 'block';
        d12Div9.style.color = '#fd5c28';
    });

    // Add click event listener to the "Hide" button
    hideButton9.addEventListener('click', () => {
        // Hide the hidden div (d112)
        hiddenDiv9.style.display = 'none';
        d12Div9.style.color = '';
    });
</script>

<script>
    // Get references to the divs and the "Hide" button
    const d12Div10 = document.getElementById('pp10');
    const hideButton10 = document.getElementById('hide10');
    const hiddenDiv10 = document.getElementById('d101');

    // Add click event listener to the "d12" div
    d12Div10.addEventListener('click', () => {
        // Show the hidden div (d112)
        hiddenDiv10.style.display = 'block';
        d12Div10.style.color = '#fd5c28';
    });

    // Add click event listener to the "Hide" button
    hideButton10.addEventListener('click', () => {
        // Hide the hidden div (d112)
        hiddenDiv10.style.display = 'none';
        d12Div10.style.color = '';
    });
</script>

<script>
    // Get references to the divs and the "Hide" button
    const d12Div14 = document.getElementById('pp14');
    const hideButton14 = document.getElementById('hide14');
    const hiddenDiv14 = document.getElementById('d114');

    // Add click event listener to the "d12" div
    d12Div14.addEventListener('click', () => {
        // Show the hidden div (d112)
        hiddenDiv14.style.display = 'block';
        d12Div14.style.color = '#fd5c28';
    });

    // Add click event listener to the "Hide" button
    hideButton14.addEventListener('click', () => {
        // Hide the hidden div (d112)
        hiddenDiv14.style.display = 'none';
        d12Div14.style.color = '';
    });
</script>


<script src="script.js"></script>

</body>
</html>