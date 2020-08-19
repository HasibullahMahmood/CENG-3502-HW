<?php
include('connectdb.php');
if(isset($_POST["getAllProductsData"]))
{  
   $query = "SELECT * FROM book";
   $result = mysqli_query($db, $query);
   while($row = mysqli_fetch_assoc($result)){
      echo json_encode($row).",";
   } 
} 

if(isset($_POST["showCategoryProduct"]))
{  
   $catID = $_POST["showCategoryProduct"];
   $query = "SELECT * FROM `book` WHERE categoryID = '$catID'";
   $result = mysqli_query($db, $query);
   while($row = mysqli_fetch_assoc($result)){
      echo json_encode($row).",";
   } 
} 

?>