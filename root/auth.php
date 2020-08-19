<?php  
   session_start();
   
   if(isset($_SESSION['email']))  
   {  
       include_once('connectdb.php');
       $email = $_SESSION['email'];
       $sql = "SELECT * FROM user WHERE email = '$email'";
       $result = mysqli_query($db, $sql);
       $row = mysqli_fetch_assoc($result);
       $userType = $row['userType'];
       $_SESSION['user'] = $row;
       
       if($userType != 'admin' or $row['accountStatus'] == "inactive"){
           header("Location: index.php");
       }
         
   }else{
       header("Location: index.php");
   }
   ?>