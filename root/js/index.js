"use strict"
class Book {
    constructor(id, name, price, image, info) {
        this.id = id;
        this.name = name;
        this.price = price;
        this.image = image;
        this.info = info;
    }
}
/* var myBooks = {
    1: new Book(1, "Chain of Gold", 102, "img-1.jpg"),
    2: new Book(2, "The Plague", 78, "img-2.jpg"),
    3: new Book(3, "Our House Is on Fire", 96, "img-3.jpg"),
    4: new Book(4, "Damascus", 56, "img-4.jpg"),
    5: new Book(5, "The Guardians", 100, "img-5.jpg"),
    6: new Book(6, "Hatchet", 120, "img-6.jpg"),
    7: new Book(7, "Alaska Home", 200, "img-7.jpg"),
    8: new Book(8, "Blue Gold", 125, "img-8.jpg")
};
 */


function displayProducts(myBooks, imagesPath) {
    let productsUl = document.querySelector(".products ul");
    let sampleProduct = document.querySelector("#myProduct");
    productsUl.innerHTML = "";
    sampleProduct.style.display = "none"
    let newProduct;
    let i = 1;
    for (i in myBooks) {
        newProduct = sampleProduct.cloneNode(true);
        newProduct.style.display = "block";
        newProduct.children[0].children[0].innerHTML = myBooks[i].id;
        newProduct.children[0].children[1].firstChild.src = imagesPath + myBooks[i].image;
        newProduct.children[0].children[2].innerHTML = myBooks[i].name;
        newProduct.children[0].children[3].innerHTML = myBooks[i].price + " TL";
        productsUl.appendChild(newProduct);
    }
}
var imagesPath = "images/";
//displayProducts(myBooks, imagesPath);
var books = {};

function getAllProductsData() {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let data = this.responseText;
            // delete last comma
            data = data.substring(0, data.length - 1);
            data = "[" + data + "]";
            data = JSON.parse(data);
            // console.log(data);
            displayProducts(data, imagesPath);

        }
    };
    xmlhttp.open("POST", "index_action.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("getAllProductsData=yes");
}

getAllProductsData();

///////////////////////////////////////////// Cart functions

function addToCart(event) {
    // item id
    let id = event.target.parentElement.children[0].innerText;
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText == "sendToAccountPage") {
                document.location.href = 'account.php';
                alert("Please login first...");
            } else {

                alert("" + this.responseText);
            }


        }
    };
    xmlhttp.open("POST", "cart_action.php", true);
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xmlhttp.send("selectedItemID=" + id);

}

///////////////////////////////////////////// CATEGORY BUTTON /////////////////////////////////
// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
    if (!e.target.matches('.dropbtn')) {
        var myDropdown = document.getElementById("myDropdown");
        if (myDropdown.classList.contains('show')) {
            myDropdown.classList.remove('show');
        }
    }
}

function showCategoryProduct(id) {
    if (!isNaN(id)) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                let data = this.responseText;
                // delete last comma
                data = data.substring(0, data.length - 1);
                data = "[" + data + "]";
                console.log(data);
                data = JSON.parse(data);
                displayProducts(data, imagesPath);
            }
        };
        xmlhttp.open("POST", "index_action.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("showCategoryProduct=" + id);
    }
}