<?php
    session_start();
    include_once('connectdb.php');

    if(isset($_SESSION['email'])){
        $email = $_SESSION['email'];
                // GET USER ID
            $q = "SELECT id FROM user WHERE email='$email' LIMIT 1";
            $result = mysqli_query($db, $q);
            $user = mysqli_fetch_assoc($result);
            $userID = $user['id'];
            $_SESSION['id'] = $userID;
    }
    
    if(isset($_POST['selectedItemID'])){
        if(isset($_SESSION['email'])){
            $email = $_SESSION['email'];
            $itemID = $_POST['selectedItemID'];

            // GET USER ID
            $userID = $_SESSION['id'];
            echo "The selected item id is $itemID and user email is $email and user id is $userID";

            # NOW LET'S STORE ITEM ID TO DATABASE
            $sql = "INSERT INTO cart (userID, bookID, quantity) 
            VALUES('$userID', '$itemID', '1')";
            if (mysqli_query($db, $sql)) {
                 echo("\nItem is added Successfully.");
            } else if(strpos(mysqli_error($db), "Duplicate entry")!== false){
                echo "\nThe selected book is already in your cart!";
            } else {
                echo "Error updating record: " . mysqli_error($db);
            } 
        }else{
            echo "sendToAccountPage";
        }
    }

    if(isset($_POST['getUserCartData'])){
        if(isset($_SESSION['id'])){
            $id = $_SESSION['id'];
            $sql = "SELECT bookID, name, quantity, price FROM cart JOIN book ON bookID = id WHERE userID = '$id'";
            if($result = mysqli_query($db, $sql)){
                $result = mysqli_fetch_all($result, MYSQLI_BOTH);
                $result = json_encode($result);
                echo $result;
            }else{
                echo "Error loading data from database: " . mysqli_error($db);
            }
           
        }
    }

    if(isset($_POST['delete_item'])){
        $itemID = $_POST['delete_item'];
        $userID = $_SESSION['id'];

        $query = "DELETE FROM `cart` WHERE `userID`='$userID' AND `bookID`='$itemID'";
         if(mysqli_query($db, $query)){
           echo('Delete is done Successfully.');
         }

    }

    if(isset($_POST['updateQuantity'])){
        $arr = $_POST['updateQuantity'];
        # split string by comma
        $arr = explode(", ", $arr);
        $bookID = $arr[0];
        $quantity = $arr[1];
        $userID = $_SESSION['id'];

        $q = "UPDATE `cart` SET `quantity` = '$quantity' WHERE `userID`= '$userID' AND `bookID` = '$bookID'";
        if(mysqli_query($db, $q)){
            echo "bookID: ".$bookID." quantity: ".$quantity." Successfully updated.";
        }else{
            echo mysqli_error($db);
        }

        
    }

?>