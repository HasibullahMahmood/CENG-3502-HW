<!DOCTYPE html>
<html>
   <head>
      <title>BookShop</title>
      <!--font-awesome is used for icons-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="/css/index.css">
   </head>
   <body>
      <nav>
         <a class="buttons" href="#home"></i>Home</a>
         <div class="dropdown">
            <button class="dropbtn" onclick='document.getElementById("myDropdown").classList.toggle("show");'>Categories
            <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content" id="myDropdown">
               <a href="#" onclick="getAllProductsData()">All</a>
               <?php  
               $errors = array();
               include('connectdb.php'); 
               $result = mysqli_query($db, "SELECT * from category");
               while($row = mysqli_fetch_array($result)){
                   echo "<a href='#' onclick='showCategoryProduct($row[id]);'>$row[name]</a>";
               }
               mysqli_close($db);
               include('errors.php');
               ?>
            </div>
         </div> 
         <a class="buttons" href="account.php"> Account</a>
         <a class="buttons" href="cart.php">Cart</a>
         <a class="buttons" href="database.php" id="databaseButton">Create Database</a>
         <div class="search-container">
            <form action="">
               <input class="search-input" type="text" placeholder="Search.." name="search">
               <button type="submit"><i class="fa fa-search"></i></button>
            </form>
         </div>
      </nav>
      <hr>
      <div class="products">
         <ul>
            <li id="myProduct">
               <div class="product">
                  <a href="#" class="id">id</a>
                  <a href="#" class="image"><img src="images/img-1.jpg" alt="Book Image Here"></a>
                  <a href="#" class="name">name here</a>
                  <div class="price">price here</div>
                  <a href="#" onclick="addToCart(event)" class="cart">add to cart</a>
               </div>
            </li>
         </ul>
      </div>
      <script src="js/index.js"></script>
   </body>
</html>