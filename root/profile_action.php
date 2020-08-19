<?php  
   session_start();  
     
   if(!isset($_SESSION['email']))  
   {  
       header("Location: index.php");  
   }else{
       include_once('connectdb.php');
   
       $email = $_SESSION['email'];
       $sql = "SELECT * FROM user WHERE email = '$email'";
       $result = mysqli_query($db, $sql);
       $row = mysqli_fetch_assoc($result);
       $id = $row['id'];
       $_SESSION['fullName'] = $row['fullName'];
       $password = $row['password'];
       $_SESSION['phoneNo'] = $row['phoneNo'];
       $_SESSION['birthDate'] = $row['birthDate'];
   
       echo '<pre>';
       var_dump($_SESSION);
       echo '</pre>';
       if(isset($_POST['update_data'])){
           
                   // receive all input values from the form
           $fullName = mysqli_real_escape_string($db, $_POST['fullName']);
           $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
           $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
           $phoneNo = mysqli_real_escape_string($db, $_POST['phoneNo']);
           $birthDate = mysqli_real_escape_string($db, $_POST['birthDate']);
   
             // form validation: ensure that the form is correctly filled ...
           // by adding (array_push()) corresponding error unto $errors array
   
          
           if (!empty($password_1)) {
               if ($password_1 == $password_2) {
                   $password = md5($password_1);//encrypt the password before saving in the database
               }else{
                   # print alert
                   echo '<script language="javascript">';
                   echo 'alert("The two passwords do not match")';
                   echo '</script>';
               }
           }
           $sql = "UPDATE `user` SET `fullName` = '$fullName', `password` = '$password', `phoneNo` = '$phoneNo', `birthDate` = '$birthDate' 
           WHERE `id` = $id";
           if (mysqli_query($db, $sql)) {
               $_SESSION['fullName'] = $fullName;
               $_SESSION['phoneNo'] = $phoneNo;
               $_SESSION['birthDate'] = $birthDate;
   
               header('location: profile.php');
               
               } else {
               echo "Error updating record: " . mysqli_error($db);
               }
               mysqli_close($db);
       }
   
   }  
   ?>