<?php 
   session_start();
   
   // initializing variables
   $email = "";
   $errors = array(); 
   
   include_once('connectdb.php');
   
   function alertMsg($str) {
     print("<script>alert('$str')</script>");
   }
   
   // REGISTER USER
   if (isset($_POST['signup_user'])) {
     // receive all input values from the form
     $email = mysqli_real_escape_string($db, $_POST['email']);
     $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
     $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
   
     // form validation: ensure that the form is correctly filled ...
     // by adding (array_push()) corresponding error unto $errors array
     if (empty($email)) { array_push($errors, "Email is required"); }
     if (empty($password_1)) { array_push($errors, "Password is required"); }
     if ($password_1 != $password_2) {
   	array_push($errors, "The two passwords do not match");
     }
   
     // first check the database to make sure 
     // a user does not already exist with the same username and/or email
     $user_check_query = "SELECT * FROM user WHERE email='$email' LIMIT 1";
     $result = mysqli_query($db, $user_check_query);
     $user = mysqli_fetch_assoc($result);
     
     if ($user) { // if user exists
       if ($user['email'] === $email) {
         array_push($errors, "email already exists");
       }
     }
   
     // Finally, register user if there are no errors in the form
     if (count($errors) == 0) {
     	$password = md5($password_1);//encrypt the password before saving in the database
   
     	$query = "INSERT INTO user (email, password, loginStatus, accountStatus, userType) 
     			  VALUES('$email', '$password', 'online', 'active', 'customer')";
     	mysqli_query($db, $query);
     	$_SESSION['email'] = $email;
     	header('location: index.php');
     }
   }
   
    // LOGIN USER
   if (isset($_POST['login_user'])) {
       $email = mysqli_real_escape_string($db, $_POST['email']);
       $password = mysqli_real_escape_string($db, $_POST['password']);
     
       if (empty($email)) {
           array_push($errors, "Username is required");
       }
       if (empty($password)) {
           array_push($errors, "Password is required");
       }
       echo "hi ";
       if (count($errors) == 0) {
           $password = md5($password);
           $query = "SELECT * FROM user WHERE email='$email' AND password='$password'";
           $results = mysqli_query($db, $query);
           if (mysqli_num_rows($results) == 1) {
             $row = mysqli_fetch_assoc($results);
             echo $row['accountStatus']."xyz";
             if($row['accountStatus'] == "inactive"){
               array_push($errors, "Your account is blocked!");
             }else{
               $_SESSION['email'] = $email;
               mysqli_query($db, "UPDATE `user` SET `loginStatus` = 'online' WHERE `email` = '$email'");    
               if($row['userType'] == 'admin'){
                 $_SESSION['userType'] = 'admin';
                 header('location: index_admin.php');
               }else{
                 header('location: index.php');
   			      }  
             }
           }else {
               array_push($errors, "Wrong email/password combination");
           }
       }
   }
   
     echo '<pre>';
     var_dump($_SESSION);
     echo '</pre>';
     ?>