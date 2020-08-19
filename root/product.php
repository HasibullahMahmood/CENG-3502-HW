<?php
   session_start();
   include('auth.php');
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="/css/product.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
      <title>Product</title>
   </head>
   <body>
      <div id="productForm" class="modal">
         <div class="modal-content">
            <div class="container">
               <h3>Manage Product</h3>
               <label for="search"><b>Search Book</b></label>
               <div id= "searches-container">
                  <div id="search-basedon-id-contianer">
                     <input id="search-input" type="number" min="1" placeholder="Search based On ID, Enter Book ID" name="search">
                     <button id="search-button" onclick="getDataByID(document.getElementById('search-input').value);"><i class="fa fa-search"></i></button>
                  </div>
                  <div id="search-basedon-name">
                     <P><b>OR</b></P>
                     <?php   $errors = array();
                        $result = mysqli_query($db, "SELECT * from book");
                        echo "<form id='search-container'>";
                        echo "<select id='searchdd' name='selectedItem' onchange='getDataByName(this.value);'>";
                        echo "<option>-- SELECT BOOK NAME --</option>";
                        while($row = mysqli_fetch_array($result)){
                            echo "<option>$row[name]</option>";
                        }
                        echo "</select>";
                        echo "</form>";
                        mysqli_close($db);
                        include('errors.php');
                        ?>
                  </div>
               </div>
               <form action="product_action.php" method="post" enctype="multipart/form-data">
               <label for="bookid"><b>Book ID</b></label>
               <input type="number" name="bookid" id='bookid' placeholder="Read only" min="1" readonly><br>
               <label for="bookName"><b>Name</b></label><br>
               <input type="text" id='bookName' placeholder="Enter Book Name" name="bookName" required autofocus>
               <label for="bookPrice"><b>Price</b></label><br>
               <input type="number" placeholder="Enter Book price" name="bookPrice" id='bookPrice' min="1" required>
               <label for="bookImage"><b>Image</b></label><br>
               <input type="file" name="image">
               <label for="bookDesc"><b>Description</b></label><br>
               <textarea name="bookDesc" rows="3" id='bookDesc' style="width:100%;"></textarea>
               <?php   $errors = array();
                  include('connectdb.php');
                  $result = mysqli_query($db, "SELECT * from category");
                  echo "<div id='search-container'>";
                  echo "<select id='bookCategory' name='bookCategory' onchange='catSelected(this.value);' required>";
                  echo "<option>SELECT BOOK CATEGORY</option>";
                  while($row = mysqli_fetch_array($result)){
                      echo "<option value='$row[id]'>$row[name]</option>";
                  }
                  echo "</select>";
                  echo "</div>";
                  mysqli_close($db);
                  include('errors.php');
                  ?>
               <div class="buttons-container">
                  <button type="submit" name='add_book'>Add</button>
                  <button type="submit" name='update_book'>Update</button>
                  <button class="special" type="submit" name='delete_book'>Delete</button>
                  <button class="special" type="submit" onclick="document.location.href='index_admin.php'" class="cancelbtn">Cancel</button>
               </div>
               </from>
            </div>
         </div>
      </div>
      <script src="js/product.js"></script>
   </body>
</html>