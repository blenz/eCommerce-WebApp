function validate() {

    var first_name = document.getElementById("first_name");
    var last_name = document.getElementById("last_name");
    var phone_number = document.getElementById("phone_number");
    var credit_card = document.getElementById("credit_card");
    var shipping_address = document.getElementById("shipping_address");
    var credit_card_name = document.getElementById("credit_card_name");
    var credit_card_expiration = document.getElementById("credit_card_expiration");
    var shipping_state = document.getElementById("shipping_state");
    var shipping_zip = document.getElementById("shipping_zip");
    var email = document.getElementById("email");
    var city = document.getElementById("shipping_city");

    var isValid = true;

    if (!isTextValid(first_name))
        isValid = false;
    if (!isTextValid(last_name))
        isValid = false;
    if (!isTextValid(phone_number))
        isValid = false;
    if (!isTextValid(credit_card))
        isValid = false;
    if (!isTextValid(shipping_address))
        isValid = false;
    if (!isTextValid(credit_card_name))
        isValid = false;
    if (!isTextValid(credit_card_expiration))
        isValid = false;
    if (!isTextValid(shipping_state))
        isValid = false;
    if (!isTextValid(shipping_zip))
        isValid = false;
    if (!isTextValid(email))
        isValid = false;
    if (!isTextValid(city))
        isValid = false;

    return isValid;
}


function isTextValid(textbox) {

    var regex, error_message;

    if (textbox.id === "phone_number") {
        regex = /^[0-9][0-9]{9}$/;
        error_message = "Must be 10 digits";
    }
    else if (textbox.id === "credit_card") {
        regex = /^[0-9][0-9]{15}$/;
        error_message = "Must be 16 numbers";
    }
    else if (textbox.id === "first_name"
        || textbox.id === "last_name"
        || textbox.id === "shipping_city") {
        regex = /^[a-zA-Z][a-zA-Z]*$/;
        error_message = "Must be all letters";
    }
    else if (textbox.id === "credit_card_name") {
        regex = /^[a-zA-Z][a-zA-Z]*\s[a-zA-Z][a-zA-Z]*$/;
        error_message = "Must be first and last name";
    }
    else if (textbox.id === "credit_card_expiration") {
        regex = /^(0[1-9]|1[0-2])\/[0-9]{4}$/;
        error_message = "MM/YYYY";
    }
    else if (textbox.id === "shipping_state") {
        regex = /^[A-Z]{2}$/;
        error_message = "Must be two capital letters";
    }
    else if (textbox.id === "shipping_zip") {
        regex = /^[0-9]{3,}$/;
        error_message = "Must be 3 digits or more";
    }
    else if (textbox.id === "email") {
        regex = /^[a-z][a-z]*@[a-z][a-z]*\.[a-z][a-z]*$/;
        error_message = "Must be name@email.com";
    }
    else if (textbox.id === "quantity") {
        regex = /^[0-9][0-9]*$/;
        error_message = "Must be all digits";
    }

    else {
        regex = /^..*?$/;
        error_message = "Must not leave blank";
    }


    if (!textbox.value.match(regex)) {
        console.log(textbox.id);
        errorPrompt(textbox, error_message);
        return false;
    }
    else {
        errorPrompt(textbox, "");
        return true;
    }
}

function errorPrompt(textbox, message) {
    document.getElementById(textbox.id.toString() + "_error").innerText = message;
}