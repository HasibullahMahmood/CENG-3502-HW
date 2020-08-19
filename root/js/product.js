$('#searchdd').chosen();
$(".chosen-container").each(function() { $(this).attr("style", "width: 95%"); });


function getDataByID(id) {
    if (!isNaN(id)) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText.includes("alert")) {
                    eval(this.responseText);
                } else {
                    var bookData = JSON.parse(this.responseText);
                    console.log(bookData);
                    fillInput(bookData);
                }
            }
        };
        xmlhttp.open("POST", "product_action.php", true);
        xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xmlhttp.send("enteredID=" + id);
    }
}

function getDataByName(name) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            if (this.responseText.includes("alert")) {
                eval(this.responseText);
            } else {
                var bookData = JSON.parse(this.responseText);
                console.log(bookData);
                fillInput(bookData);
            }
        }
    };
    xmlhttp.open("POST", "product_action.php", true);
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xmlhttp.send("selectedName=" + name);

}

function fillInput(bookData) {
    if (bookData['id'] != "") {
        document.getElementById("bookid").value = bookData['id'];
    } else {
        document.getElementById("bookid").value = "";
    }
    if (bookData['name'] != null) {
        document.getElementById("bookName").value = bookData['name'];
    } else {
        document.getElementById("bookName").value = "";
    }
    if (bookData['price'] != null) {
        document.getElementById("bookPrice").value = bookData['price'];
    } else {
        document.getElementById("bookPrice").value = "";
    }
    if (bookData['description'] != null) {
        document.getElementById("bookDesc").value = bookData['description'];
    } else {
        document.getElementById("bookDesc").value = "";
    }
    if (bookData['categoryID'] != null) {
        document.getElementById("bookCategory").value = bookData['categoryID'];
    } else {
        document.getElementById("bookCategory").value = "xx";
    }

}