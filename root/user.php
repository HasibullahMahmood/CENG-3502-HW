<?php
   session_start();
   include('auth.php');
   $errors = array();
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="/css/user.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
      <title>User</title>
   </head>
   <body>
      <div id="userForm" class="modal">
         <div class="modal-content" >
            <h3 style="text-align: center ;">Manage User</h3>
            <?php   
               $result = mysqli_query($db, "SELECT * from user");
               echo "<form id='search-container'>";
               echo "<select id='searchdd' name='selectedItem' onchange='getUserData(this.value);'>";
               echo "<option>-- SELECT USER --</option>";
               while($row = mysqli_fetch_array($result)){
                   echo "<option>$row[email]</option>";
               }
               echo "</select>";
               echo "</form>";
               mysqli_close($db);
               include('errors.php');
               ?>
            <form action="user_action.php" method="post">
               <div >
                  <label for="userFullName"><b>Full Name</b></label><br>
                  <input type="text" placeholder="Enter User Full Name" name="userFullName" id='userFullName'>
               </div>
               <label for="userEmail"><b>Email</b></label><br>
               <input type="email" placeholder="Enter Email" name="userEmail" id='userEmail' required>
               <label for="password_1"><b>Password</b></label><br>
               <input type="password" name="password_1" placeholder="Enter Password">
               <label for="userPhoneNo"><b>Phone Number</b></label><br>
               <input type="tel" name="userPhoneNo" placeholder="Enter Phone Number" id='userPhoneNo'>
               <dev>
                  <label for="accountStatus"><b>Select Account Status</b></label><br>
                  <input type="radio" name="accountStatus" value="active" checked id='accountStatusActive'> Active<br>
                  <input type="radio" name="accountStatus" value="inactive" id='accountStatusInactive'> Inactive<br>
               </dev>
               <label for="userType"><b>Select User Type</b></label><br>
               <input type="radio" name="userType" value="customer" checked id="userTypeCustomer"> Customer<br>
               <input type="radio" name="userType" value="admin" id="userTypeAdmin"> Admin<br>    
               <div class="container">
                  <button type="submit" name="add_user">Add</button>
                  <button type="submit" name='update_user'>Update</button>
                  <button class="special" type="submit" name="delete_user">Delete</button>
                  <button class="special" type="button" onclick="document.location.href='index_admin.php'">Cancel</button>
               </div>
            </form>
         </div>
      </div>
      <script src="js/user.js"></script>
   </body>
</html>