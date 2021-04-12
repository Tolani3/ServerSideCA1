/*JavaScript For Name validation in add player */
function username_validation() {
    'use strict';
    var username_name = document.getElementById("username");
    var username_value = document.getElementById("username").value;
    var username_length = username_value.length;
    var letters = /^[0-9a-zA-Z]+$/;
    if (username_length < 4 || !username_value.match(letters)) {
        document.getElementById('name_err').innerHTML = 'Username must be 4 chracters long and alphanuric chracters only.';
        username_name.focus();
        document.getElementById('name_err').style.color = "#FF0000";
    }
    else {
        document.getElementById('name_err').innerHTML = 'Valid username';
        document.getElementById('name_err').style.color = "#00AF33";
    }
}

/*JavaScript For buying a player */
findTotal = (shippingPrice, productPrice) => {
    document.getElementById("totalPrice").innerHTML = "€" + (productPrice + parseFloat(shippingPrice));
    document.getElementById("passedValuePrice").value = "€" + (productPrice + parseFloat(shippingPrice));
}

const checkMark = "✔"
var valid_name = false;
var valid_phone = false;
var valid_postcode = false;

validateAll = () => {
    const bt = document.getElementById("submit");
    if (valid_name && valid_phone && valid_postcode) {
        bt.disabled = false;
    }
}

validate_name = () => {
    const value = document.getElementById("fullName").value;
    const bt = document.getElementById("submit");
    const pattern = /^([\w]{3,})+\s+([\w\s]{3,})+$/i;
    if (pattern.test(value)) {
        document.getElementById("label_checkMark").innerHTML = "Full Name: " + checkMark
        valid_name = true;
        validateAll();
    }
    else {
        document.getElementById("label_checkMark").innerHTML = "Full Name: "
        bt.disabled = true;
    }
}

validate_phone = () => {
    const value = document.getElementById("phoneNo").value;
    const bt = document.getElementById("submit");
    const pattern = /^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/;
    if (pattern.test(value)) {
        document.getElementById("label_checkMark2").innerHTML = "Phone No: " + checkMark
        valid_phone = true;
        validateAll();
    }
    else {
        document.getElementById("label_checkMark2").innerHTML = "Phone No: "
        bt.disabled = true;
    }
}

validate_postcode = () => {
    const value = document.getElementById("postCode").value;
    const bt = document.getElementById("submit");
    var pattern =
        '\\b(?:(' +
        'a(4[125s]|6[37]|7[5s]|[8b][1-6s]|9[12468b])|' +
        'c1[5s]|' +
        'd([0o][1-9sb]|1[0-8osb]|2[024o]|6w)|' +
        'e(2[15s]|3[24]|4[15s]|[5s]3|91)|' +
        'f(12|2[368b]|3[15s]|4[25s]|[5s][26]|9[1-4])|' +
        'h(1[2468b]|23|[5s][34]|6[25s]|[79]1)|' +
        'k(3[246]|4[5s]|[5s]6|67|7[8b])|' +
        'n(3[79]|[49]1)|' +
        'p(1[247]|2[45s]|3[126]|4[37]|[5s][16]|6[17]|7[25s]|[8b][15s])|' +
        'r(14|21|3[25s]|4[25s]|[5s][16]|9[35s])|' +
        't(12|23|34|4[5s]|[5s]6)|' +
        'v(1[45s]|23|3[15s]|42|9[2-5s])|' +
        'w(12|23|34|91)|' +
        'x(3[5s]|42|91)|' +
        'y(14|2[15s]|3[45s])' +
        ')\\s?[abcdefhknoprtsvwxy\\d]{4})\\b';
    var reg = new RegExp(pattern, 'i');
    //return the first Eircode
    var i = String(value).search(reg);
    if (i != -1) {
        document.getElementById("label_checkMark4").innerHTML = "Post Code: " + checkMark
        valid_postcode = true;
        validateAll();
    }

    else {
        document.getElementById("label_checkMark4").innerHTML = "Post Code: "
        bt.disabled = true;
    }
}

