$('#searchdd').chosen();
$(".chosen-container").each(function() { $(this).attr("style", "width: 100%"); });

function getUserData(str) {
    if (str != "") {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var userData = JSON.parse(this.responseText);
                console.log(userData['fullName']);
                if (userData['fullName'] != null) {
                    document.getElementById("userFullName").value = userData['fullName'];
                } else {
                    document.getElementById("userFullName").value = "";
                }
                if (userData['email'] != null) {
                    document.getElementById("userEmail").value = userData['email'];
                } else {
                    document.getElementById("userEmail").value = "";
                }
                if (userData['phoneNo'] != null) {
                    document.getElementById("userPhoneNo").value = userData['phoneNo'];
                } else {
                    document.getElementById("userPhoneNo").value = "";
                }
                if (userData['accountStatus'] != null) {
                    if (userData['accountStatus'] == "active") {
                        document.getElementById("accountStatusActive").checked = true;
                        document.getElementById("accountStatusInactive").checked = false;
                    } else {
                        document.getElementById("accountStatusInactive").checked = true;
                        document.getElementById("accountStatusActive").checked = false;
                    }

                }
                if (userData['userType'] != null) {
                    if (userData['userType'] == "customer") {
                        document.getElementById("userTypeCustomer").checked = true;
                        document.getElementById("userTypeAdmin").checked = false;
                    } else {
                        document.getElementById("userTypeAdmin").checked = true;
                        document.getElementById("userTypeCustomer").checked = false;
                    }

                }

            }
        };

        xmlhttp.open("POST", "user_action.php", true);
        xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xmlhttp.send("selectedEmail=" + str);
    }
}