<?php
   include_once('connectdb.php');
   
   if (isset($_POST['delete_book'])) {
       $id = mysqli_real_escape_string($db, $_POST['bookid']);
   
       $query = "DELETE FROM `book` WHERE `id`=$id";
       if(mysqli_query($db, $query)){
       echo('<p>The book is deleted Successfully.');
       header("Refresh: 2; url=product.php");
       }else{
       echo "<p>Error deleting book: " . mysqli_error($db);
       } 
   }
   
   
   
   ########################################## Update book ####################################
   
   if (isset($_POST['update_book'])) {
       echo "Hi from update book";
       $errors = array();
       // receive all input values from the form
       $id = mysqli_real_escape_string($db, $_POST['bookid']);
       $name = mysqli_real_escape_string($db, $_POST['bookName']);
       $price = mysqli_real_escape_string($db, $_POST['bookPrice']);
       $description = mysqli_real_escape_string($db, $_POST['bookDesc']);
       $category = mysqli_real_escape_string($db, $_POST['bookCategory']);
   
       if($category == "SELECT BOOK CATEGORY"){
           echo "<p>Please select book category";
           exit;
       }
   
       # BOOK IMAGE
       if(!$_FILES['image']['error'] > UPLOAD_ERR_OK){
           $target_dir = "images/";
           $target_file = $target_dir . basename($_FILES["image"]["name"]);
           $image_name = $_FILES["image"]["name"];
           $uploadOk = 1;
           $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
           
           // Check if image file is a actual image or fake image
             $check = getimagesize($_FILES["image"]["tmp_name"]);
             if($check !== false) {
               #echo "<p>File is an image - " . $check["mime"] . ".";
               $uploadOk = 1;
             } else {
               echo "File is not an image.";
               $uploadOk = 0;
             }   
           
           // Check if file already exists
           if (file_exists($target_file)) {
             echo "<p>Sorry, image already exists. Please rename the image and upload it again";
             $uploadOk = 0;
             exit;
           }
           
           // Check file size
           if ($_FILES["image"]["size"] > 5*1024*1024) {
             echo "<p>Sorry, your file is too large.";
             $uploadOk = 0;
           }
           
           // Allow certain file formats
           if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
           && $imageFileType != "gif" ) {
             echo "<p>Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
             $uploadOk = 0;
           }
           
           // Check if $uploadOk is set to 0 by an error
           if ($uploadOk == 0) {
             echo "<p>Sorry, your file was not uploaded.";
           // if everything is ok, try to upload file
           } else {
             if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
               echo "<p>The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
             } else {
               echo "<p>Sorry, there was an error uploading your file.";
             }
           }
           // Finally, register book if there are no errors in the form
           if (count($errors) == 0) {
               $query = "UPDATE  book SET `name` = '$name', `price` = '$price',
                        `image` = '$image', `description` = '$description',
                        `categoryID` = '$category'
                        WHERE `id` = $id";
           
               if(mysqli_query($db, $query)){
                   echo('<p>The book is updated Successfully in the database.');
               }else{
                   echo('<p>The book could not be updated in the database!');
               }   
           }
   
       }else{
     
           // Finally, register book if there are no errors in the form
           if (count($errors) == 0) {
               $query = "UPDATE  book SET `name` = '$name', `price` = '$price',
                        `description` = '$description',
                        `categoryID` = '$category'
                        WHERE `id` = $id";
           
               if(mysqli_query($db, $query)){
                   echo('<p>The book is updated Successfully in the database.');
               }else{
                   echo('<p>The book could not be updated in the database!');
               }   
           }
       }     
   }
   
   
   ########################### End of updating book  ###################################
   
   if(isset($_POST['enteredID'])){
       $enteredID = $_POST['enteredID'];
       $enteredID = (int)$enteredID;
       $sql = mysqli_query($db, "SELECT * FROM book WHERE `id`= $enteredID");
       $bookData = mysqli_fetch_array($sql);
       if (!$bookData) { // if book exists
             alertMsg("The ID $enteredID does not exist.");
             exit; 
       }else{
           echo json_encode($bookData);
       } 
       
   }
   
   if(isset($_POST['selectedName'])){
       $selectedName = $_POST['selectedName'];
       $sql = mysqli_query($db, "SELECT * FROM book WHERE `name`= '$selectedName'");
       $bookData = mysqli_fetch_array($sql);
       if (!$bookData) { // if book exists
             alertMsg("$selectedName does not exist.");
             exit; 
       }else{
           echo json_encode($bookData);
       } 
       
   }
   
   
   ####################################################        ADD BOOK
   if (isset($_POST['add_book'])) {
           echo "Hi from add book";
           $errors = array();
           // receive all input values from the form
           $name = mysqli_real_escape_string($db, $_POST['bookName']);
           $price = mysqli_real_escape_string($db, $_POST['bookPrice']);
           $description = mysqli_real_escape_string($db, $_POST['bookDesc']);
           $category = mysqli_real_escape_string($db, $_POST['bookCategory']);
   
           if($category == "SELECT BOOK CATEGORY"){
               echo "<p>Please select book category";
               exit;
           }
   
           # BOOK IMAGE
           if(!$_FILES['image']['error'] > UPLOAD_ERR_OK){
               $target_dir = "images/";
               $target_file = $target_dir . basename($_FILES["image"]["name"]);
               $image_name = $_FILES["image"]["name"];
               $uploadOk = 1;
               $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
               
               // Check if image file is a actual image or fake image
                 $check = getimagesize($_FILES["image"]["tmp_name"]);
                 if($check !== false) {
                   #echo "<p>File is an image - " . $check["mime"] . ".";
                   $uploadOk = 1;
                 } else {
                   echo "File is not an image.";
                   $uploadOk = 0;
                 }
               
               
               // Check if file already exists
               if (file_exists($target_file)) {
                   echo "<p>Sorry, image already exists. Please rename the image and upload it again";
                 $uploadOk = 0;
                 exit;
               }
               
               
               // Check file size
               if ($_FILES["image"]["size"] > 5*1024*1024) {
                 echo "<p>Sorry, your image is too large.";
                 $uploadOk = 0;
                 exit;
               }
               
               // Allow certain file formats
               if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
               && $imageFileType != "gif" ) {
                 echo "<p>Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                 $uploadOk = 0;
                 exit;
               }
               
               // Check if $uploadOk is set to 0 by an error
               if ($uploadOk == 0) {
                 echo "<p>Sorry, your image was not uploaded.";
               // if everything is ok, try to upload file
               } else {
                 if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                   echo "<p>The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
                 } else {
                   echo "<p>Sorry, there was an error uploading your file.";
                 }
               }
   
           }else{
               echo "<p>Please upload book image<p>";
               exit;
           }
               
           // first check the database to make sure 
           // same image name does not already exist
           $user_check_query = "SELECT * FROM book WHERE `name`='$name' LIMIT 1";
           $result = mysqli_query($db, $user_check_query);
           $book = mysqli_fetch_assoc($result);
           
           if ($book) { // if book exists
             if ($book['name'] === $name) {
               echo("<p>This book already exists");
               exit;
             }
           }
         
           // Finally, register book if there are no errors in the form
           if (count($errors) == 0) {
               $query = "INSERT INTO book (name, price, image, description, categoryID) 
                         VALUES('$name', '$price', '$image_name', '$description', '$category')";
               if(mysqli_query($db, $query)){
                   echo('<p>New book is added Successfully to the database.');
               }else{
                   echo "<p>Error adding new book: " . mysqli_error($db);
               } 
           }
   }
   
   
   function alertMsg($str) {
       print("alert('$str')");
   }
   
   mysqli_close($db);  
   header("Refresh: 3; url=product.php");
   
   ?>