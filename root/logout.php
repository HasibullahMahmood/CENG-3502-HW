<?php  
   session_start();//session is a way to store information (in variables) to be used across multiple pages.
   include_once('connectdb.php');
   if($_SESSION['email']){
       $email = $_SESSION['email'];
       $sql = "UPDATE `user` SET `loginStatus` = 'offline' WHERE `email` = '$email'";
       if (mysqli_query($db, $sql)) {
           
       }
       session_destroy();  
       header("Location: index_admin.php");//use for the redirection to some page 
   }
   
   ?>