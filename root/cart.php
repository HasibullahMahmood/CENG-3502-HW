<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="/css/cart.css">
      <title>My Cart</title>
   </head>
   <body>
   <!-- Cart start-->
      <div class="row">
         <div class="col-35">
            <div class="container">
               <h4><span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> </span>Cart </h4>

               <div class="itemsInCart">

                  <p id="item" style="display: none;">
                     <a href="#" class="bookName" id="">product 1</a>
                     <input type="number" onchange="updateSubtotal(this.value, this.parentElement); updateDatabase(this.value, event);"; min="1" value="1">
                     <span class="price">0 TL</span>
                     <span class="subtotal">0 TL</span>
                     <span onclick="deleteItem(event)" title="delete" class="delete">&times;</span>
                  </p>

               </div>

               <hr>
               <p>Total <span class="price" style="color:black"><b id="total">0 TL</b></span></p>
            </div>
         </div>
   <!-- Cart finish-->
         <div class="col-65">
            <div class="container">
               <form action="">
                  <div class="row">
                     <div class="col-50">
                        <h3>Billing Address</h3>
                        <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                        <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
                        <label for="email"><i class="fa fa-envelope"></i> Email</label>
                        <input type="text" id="email" name="email" placeholder="john@example.com">
                        <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                        <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
                        <label for="city"><i class="fa fa-institution"></i> City</label>
                        <input type="text" id="city" name="city" placeholder="New York">
                        <div class="row">
                           <div class="col-50">
                              <label for="state">State</label>
                              <input type="text" id="state" name="state" placeholder="NY">
                           </div>
                           <div class="col-50">
                              <label for="zip">Zip</label>
                              <input type="text" id="zip" name="zip" placeholder="10001">
                           </div>
                        </div>
                     </div>
                     <div class="col-50">
                        <h3>Payment</h3>
                        <label for="fname">Accepted Cards</label>
                        <div class="icon-container">
                           <i class="fa fa-cc-visa" style="color:navy;"></i>
                           <i class="fa fa-cc-amex" style="color:blue;"></i>
                           <i class="fa fa-cc-mastercard" style="color:red;"></i>
                           <i class="fa fa-cc-discover" style="color:orange;"></i>
                        </div>
                        <label for="cname">Name on Card</label>
                        <input type="text" id="cname" name="cardname" placeholder="John More Doe">
                        <label for="ccnum">Credit card number</label>
                        <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                        <label for="expmonth">Exp Month</label>
                        <input type="text" id="expmonth" name="expmonth" placeholder="September">
                        <div class="row">
                           <div class="col-50">
                              <label for="expyear">Exp Year</label>
                              <input type="text" id="expyear" name="expyear" placeholder="2018">
                           </div>
                           <div class="col-50">
                              <label for="cvv">CVV</label>
                              <input type="text" id="cvv" name="cvv" placeholder="352">
                           </div>
                        </div>
                     </div>
                  </div>
                  <label>
                  <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                  </label>
                  <input type="submit" value="Continue to checkout" class="btn">
               </form>
            </div>
         </div>
      </div>
      <script src="js/cart.js"></script>
   </body>
</html>