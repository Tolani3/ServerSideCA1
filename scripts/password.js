function hidePassword() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

var password = document.getElementById("myInput")
    , confirm_password = document.getElementById("myInput2");

function validatePassword() {
    if (password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
    } else {
        confirm_password.setCustomValidity('');
    }
}
password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;


// function validateForm() {
//     //collect form data in JavaScript variables
//     var pw1 = document.getElementById("myInput").value;
//     var pw2 = document.getElementById("myInput2").value;

//     //check empty password field
//     if (pw1 == "") {
//         document.getElementById("message1").innerHTML = "**Fill the password please!";
//         return false;
//     }

//     //check empty confirm password field
//     if (pw2 == "") {
//         document.getElementById("message2").innerHTML = "**Enter the password please!";
//         return false;
//     }

//     //minimum password length validation
//     if (pw1.length < 8) {
//         document.getElementById("message1").innerHTML = "**Password length must be atleast 8 characters";
//         return false;
//     }

//     //maximum length of password validation
//     if (pw1.length > 15) {
//         document.getElementById("message1").innerHTML = "**Password length must not exceed 15 characters";
//         return false;
//     }

//     if (pw1 != pw2) {
//         document.getElementById("message2").innerHTML = "**Passwords are not same";
//         return false;
//     } else {
//         alert("Your password created successfully");
//         document.write("JavaScript form has been submitted successfully");
//     }
// }