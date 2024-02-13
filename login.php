<?php
// starting the session
session_start();
include("config.php");
if(isset($_POST['submit'])){
    $userEmail=$_POST['userEmail'];
    //echo "The username was".$uname;
    $password=$_POST['password'];
    // query
    $select_query="Select * from `user` where userEmail='$userEmail'";
    //echo "select_query is". $select_query;
    $result=mysqli_query($conn,$select_query);
    $fetch_data=mysqli_fetch_assoc($result);
    //print_r($fetch_data);
    // get the user id against the user whose username is $uname
    $userId=$fetch_data['userId'];
 
  //$selectUserId = "SELECT user_id FROM users WHERE uname='$uname'";
 //$result_user_id = mysqli_query($conn, $selectUserId);
 //$fetch_user_id_data=mysqli_fetch_assoc($result_user_id);
 
 
 //echo "user_id is".$user_id;
 // 
    $num_rows=mysqli_num_rows($result);
    // echo $num_rows;
    if($num_rows>0){
      if(password_verify($password,$fetch_data['password'])){
        $_SESSION['userEmail']=$userEmail;
        $_SESSION['userId']=$userId;
        //$messageToUser="You have successfully logged in";
        //echo "<script>alert('You have successfully logged in')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }else{
       // $messageToUser="Invalid credentials";
        //echo "<script>alert('Invalid credentials')</script>";
        //echo "<script>window.open('index.php','_self')</script>";
    }
    }else{
      // $messageToUser="Invalid credentials";
        echo "<script>alert('Invalid credentials')</script>";
        echo "<script>window.open('login.php','_self')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style3.css" />
  <title>loading</title>

  <style>
        #message {
    margin-left:300px;
    margin-top:-400px;
    position:fixed;
    background:whitesmoke;
    width:800px;
   display:none;
    height:300px; 
    box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);

    
  }
  #btn1{
    width:100px;
    height:40px;
    background:blue;
    position:absolute;
    margin-left:380px;
    margin-top:230px;
    border:0;
    color:white;
  }
  #pm{
    position:absolute;
    margin-top:100px;
    width:97%;
    text-align:justify;
    margin-left:10px;
    margin-right:10px;
  }
  .passicon{
    width:30px;height:30px;
    margin-left:330px;
    margin-top:-40px; 
    cursor:pointer;
  }
  @media (max-width: 768px) {
    .passicon{
    width:30px;height:30px;
    margin-left:260px;
    margin-top:-40px; 
    cursor:pointer;
  }
  }
 
  </style>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="" method="POST" class="sign-in-form">
          <h2 class="title">Sign in</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="userEmail" placeholder="Email Address" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Password" id="password"/>
            <img src="images/close.png" alt="" class="passicon" id="eyeIcon">
          </div>
          <div class="Forget-Pass">
          <a href="Forget.php" class="Forget" style="text-decoration:underline;">Forget Password ?</a></div>
          <input type="submit" name="submit" value="Login" class="btn solid" />
          
          
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>New at DOW?</h3>
          <p>
           Click Sign Up to register if you don't have  an account with us.
          </p>
          <br>
          <a href="SignUp.php" class="btn transparent" id="sign-in-btn" style="padding:10px 20px;text-decoration:none;
          background:white;color:blue;margin-top:10px;">
            Sign up
          </a>
        </div>
        <!--<img src="images/da.png" class="image" alt="" style="width:400px;height:440px;z-index:991;margin-top:30px;" />-->
      </div>
    </div>
  </div>
  
  <script>
    let eyeIcon = document.getElementById("eyeIcon");
    let password = document.getElementById("password");
    eyeIcon.onclick=function(){
      if(password.type=="password"){
        password.type = "text";
        eyeIcon.src="images/open.png";
      }else{
        password.type = "password";
        eyeIcon.src="images/close.png";
      }
    }
  </script>
  <script src="app.js"></script>
</body>

</html>