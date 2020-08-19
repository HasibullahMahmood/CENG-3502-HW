<?php
   include_once('profile_action.php'); 
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="/css/profile.css">
      <title>My Profile</title>
   </head>
   <body>
      <div id="profile" class="modal">
         <form class="modal-content" action="profile_action.php" method="post">
            <div class="container">
               <h3 style="text-align: center ;">My Profile</h3>
               <label for="fullName"><b>Full Name</b></label><br>
               <input type="text" placeholder="Enter User Full Name" name="fullName" required value=<?php echo $_SESSION['fullName']?> >
               <label for="email"><b>Email</b></label><br>
               <input type="email" placeholder="Enter Email" name="email" readonly value=<?php echo $_SESSION['email']?>>
               <label for="password_1"><b>New Password</b></label><br>
               <input type="password" name="password_1" placeholder="Enter Password" autocomplete="new-password" >
               <label for="password_2"><b>Repeat Password</b></label><br>
               <input type="password" name="password_2" placeholder="Enter Password">
               <label for="phoneNo"><b>Phone No</b></label><br>
               <input type="tel" name="phoneNo" placeholder="Enter Phone Number" value=<?php echo $_SESSION['phoneNo']?>>
               <label for="birthDate"><b>Birth Date</b></label><br>
               <input type="date" name="birthDate" placeholder="Enter Birth Date" value=<?php echo $_SESSION['birthDate']?>>
               <div>
                  <button id="update-button" type="submit" name="update_data">Update</button>
                  <a href="logout.php">Logout</a> 
                  <button class="special-button" type="button" onclick="document.location.href='index_admin.php'" class="cancelbtn">Cancel</button>
               </div>
            </div>
         </form>
      </div>
   </body>
</html>