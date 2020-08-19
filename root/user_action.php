<?php
   include_once('connectdb.php');
   if(isset($_POST['selectedEmail'])){
       $selected_email = $_POST['selectedEmail'];
       $sql = mysqli_query($db, "SELECT * FROM user WHERE `email`= '$selected_email'");
       $selected_user = mysqli_fetch_array($sql);
       
       echo json_encode($selected_user);
   }
   
   function alertMsg($str) {
       print("<script>alert('$str')</script>");
   }
   
       // ADD USER
   if (isset($_POST['add_user'])) {
       echo "hi from add user";
       $errors = array();
       // receive all input values from the form
       $fullName = mysqli_real_escape_string($db, $_POST['userFullName']);
       $email = mysqli_real_escape_string($db, $_POST['userEmail']);
       $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
       $phoneNo = mysqli_real_escape_string($db, $_POST['userPhoneNo']);
       $accountStatus = mysqli_real_escape_string($db, $_POST['accountStatus']);
       $userType = mysqli_real_escape_string($db, $_POST['userType']);
       #$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
     
       // form validation: ensure that the form is correctly filled ...
       // by adding (array_push()) corresponding error unto $errors array
       if (empty($email)) { alertMsg("Email is required"); }
       if (empty($password_1)) { alertMsg("Password is required"); }
       /*     if ($password_1 != $password_2) {
         array_push($errors, "The two passwords do not match");
       } */
     
       // first check the database to make sure 
       // a user does not already exist with the same username and/or email
       $user_check_query = "SELECT * FROM user WHERE email='$email' LIMIT 1";
       $result = mysqli_query($db, $user_check_query);
       $user = mysqli_fetch_assoc($result);
       
       if ($user) { // if user exists
         if ($user['email'] === $email) {
           alertMsg("email already exists");
           exit;
         }
       }
     
       // Finally, register user if there are no errors in the form
       if (count($errors) == 0) {
           $password = md5($password_1);//encrypt the password before saving in the database
     
           $query = "INSERT INTO user (fullName, email, password, phoneNo, accountStatus, userType) 
                     VALUES('$fullName', '$email', '$password', '$phoneNo', '$accountStatus', '$userType')";
           mysqli_query($db, $query);
           $_SESSION['email'] = $email;
           alertMsg('New User is added Successfully.');
          
       }
     }
   
     # UPDATE USER
   if(isset($_POST['update_user'])){
       echo "hi from update user. ";
       // receive all input values from the form
       $fullName = mysqli_real_escape_string($db, $_POST['userFullName']);
       $email = mysqli_real_escape_string($db, $_POST['userEmail']);
       $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
       $phoneNo = mysqli_real_escape_string($db, $_POST['userPhoneNo']);
       $accountStatus = mysqli_real_escape_string($db, $_POST['accountStatus']);
       $userType = mysqli_real_escape_string($db, $_POST['userType']);
   
       // form validation: ensure that the form is correctly filled ...
       // by adding (array_push()) corresponding error unto $errors array
   
       $password = "";
       if (!empty($password_1)) {
         $password = md5($password_1);//encrypt the password before saving in the database
       }
       $sql = "UPDATE `user` SET `fullName` = '$fullName', `password` = '$password', `phoneNo` = '$phoneNo', `accountStatus` = '$accountStatus', `userType` = '$userType'
       WHERE `email` = '$email'";
       if (mysqli_query($db, $sql)) {
         alertMsg("Updation is done Successfully.");
       } else {
       echo "Error updating record: " . mysqli_error($db);
       }
   
   }
   
   // DELETE USER
   if (isset($_POST['delete_user'])) {
     echo "hi from delete user";
     $errors = array();
     // receive all input values from the form
     $email = mysqli_real_escape_string($db, $_POST['userEmail']);
   
     // form validation: ensure that the form is correctly filled ...
     // by adding (array_push()) corresponding error unto $errors array
     if (empty($email)) { alertMsg("Email is required"); }
   
     // first check the database to make sure 
     // a user does not already exist with the same username and/or email
     $user_check_query = "SELECT * FROM user WHERE email='$email' LIMIT 1";
     $result = mysqli_query($db, $user_check_query);
     $user = mysqli_fetch_assoc($result);
     
     if (!$user) { // if user exists
       alertMsg("The User doesn't exist.");
       exit;
     }
   
     // Finally, delete user if there are no errors in the form
     if (count($errors) == 0) {
         $query = "DELETE FROM `user` WHERE `email`='$email'";
         if(mysqli_query($db, $query)){
           alertMsg('Delete is done Successfully.');
         }
        
     }
   }
   
   mysqli_close($db); 
   header("Refresh: 3; url=user.php"); 
   
   ?>