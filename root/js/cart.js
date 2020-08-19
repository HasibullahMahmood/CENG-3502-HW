"use strict"
/* add to cart*/
/* class Cart {
    constructor() {
        this.itemsID = [];
        this.totalPrice = 0;
    }
    addItemID(id) {
        this.itemsID.push(id);
        this.totalPrice += myBooks[id].price;
    }
    removeItemID(id) {
        let index = this.itemsID.indexOf(id);
        if (index > -1) {
            this.itemsID.splice(index, 1);
            this.totalPrice -= myBooks[id].price;
        }
    }
} */
//var myCart = new Cart();



function addToCart(data) {
    //let id = event.target.parentElement.children[0].innerText;
    //myCart.addItemID(id);
    let itemsInCartElement = document.querySelector(".itemsInCart");
    let sampleItem = document.querySelector(".itemsInCart #item");

    function apply(obj) {
        let newItem;
        newItem = sampleItem.cloneNode(true);
        newItem.style.display = "flex";
        newItem.children[0].id = obj.bookID;
        newItem.children[0].innerHTML = obj.name;
        newItem.children[1].value = obj.quantity;
        newItem.children[2].innerHTML = obj.price + "TL";
        newItem.children[3].innerHTML = (obj.price * newItem.children[1].value) + "TL";
        itemsInCartElement.appendChild(newItem);
    }
    data.forEach(apply);
    calcTotal();
}


function getUserCartData() {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let result = {};
            result = JSON.parse(this.responseText);
            console.log(result);
            addToCart(result);
        }
    };
    xmlhttp.open("POST", "cart_action.php", true);
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xmlhttp.send("getUserCartData=" + "yes");
}

getUserCartData();



function updateSubtotal(quantity, unit_price) {
    let obj = unit_price;
    let result;
    unit_price = unit_price.childNodes[5].innerText.replace("TL", "");
    result = quantity * unit_price;
    obj.childNodes[7].innerHTML = result + "TL";
    calcTotal();
}

// UPDATE BOOK QUANTITY
function updateDatabase(quantity, event) {
    let bookID = event.target.parentElement.children[0].id;

    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    };
    let arr = bookID + ", " + quantity;
    xmlhttp.open("POST", "cart_action.php", true);
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xmlhttp.send("updateQuantity=" + arr);
}




function calcTotal() {
    let total = 0;
    let itemsInCartElement = document.querySelector(".itemsInCart");
    let len = itemsInCartElement.childElementCount;
    let i;
    for (i = 1; i < len; i++) {
        total += parseInt(itemsInCartElement.children[i].childNodes[7].innerText.replace(" TL", ""));
    }
    document.querySelector('#total').innerText = total + "TL";
}


function deleteItem(event) {
    let parentElem = event.target.parentElement;
    /* the id of element that should be deleted*/
    let itemID = parentElem.children[0].id;
    let element = document.getElementById(itemID);
    element.parentElement.remove();

    calcTotal();
    delete_item_in_database(itemID);
}

function delete_item_in_database(itemID) {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
        }
    };
    xmlhttp.open("POST", "cart_action.php", true);
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xmlhttp.send("delete_item=" + itemID);
}