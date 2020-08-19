<?php include_once("account_action.php"); ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="/css/signup.css">
      <title>Sign Up</title>
   </head>
   <body>
      <div id="id01" class="modal">
         <form class="modal-content" method="post" action="signup.php">
            <div class="container">
               <h1>Sign Up</h1>
               <p>Please fill in this form to create an account.</p>
               <?php include_once("errors.php"); ?>
               <hr>
               <label for="email"><b>Email</b></label>
               <input type="email" placeholder="Enter Email" name="email" value>
               <label for="psw"><b>Password</b></label>
               <input type="password" placeholder="Enter Password" name="password_1">
               <label for="psw-repeat"><b>Repeat Password</b></label>
               <input type="password" placeholder="Repeat Password" name="password_2">
               <label>
               <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
               </label>
               <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
               <div class="clearfix">
                  <button type="button" onclick="document.location.href='account.php'" class="cancelbtn">Cancel</button>
                  <button type="submit" class="signupbtn" name="signup_user">Sign Up</button>
               </div>
            </div>
         </form>
      </div>
   </body>
</html>