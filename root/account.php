<?php 
   session_start(); 
   
   if (!isset($_SESSION['email'])) {
   	include('account_action.php');
   }else{
     header("location: profile.php");
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Account</title>
      <link rel="stylesheet" href="/css/account.css">
   </head>
   <body>
      <!--signin-->
      <div id="id01" class="modal">
         <form class="modal-content" action="account.php" method="post">
            <div class="imgcontainer">
               <img src="/images/img_avatar2.png" alt="Avatar" class="avatar">
            </div>
            <div class="container">
               <label for="email"><b>Email</b></label>
               <input type="email" placeholder="Enter Email" name="email" required>
               <label for="psw"><b>Password</b></label>
               <input type="password" placeholder="Enter Password" name="password" required>
               <?php include('errors.php'); ?>
               <button type="submit" name="login_user">Login</button>
               <button type="button" onclick="document.location.href='signup.php';" style="width:100%;">Sign Up</button>
               <input type="checkbox" checked="checked" name="remember">
               <label for="remember"> Remember me</label>
            </div>
            <div class="container" style="background-color:#f1f1f1">
               <button type="button" onclick=" document.location.href='/';" class="cancelbtn">Cancel</button>
               <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
         </form>
      </div>
   </body>
</html>