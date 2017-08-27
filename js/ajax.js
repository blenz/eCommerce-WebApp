function autoCompleteAddress(obj) {

    if (event.shiftKey)
        return;

    var list;

    if (obj.id === "shipping_zip")
        list = "zip_list";
    else if (obj.id === "shipping_city")
        list = "city_list";
    else if (obj.id === "shipping_state")
        list = "state_list";
    else
        return;

    document.getElementById(list).innerHTML = "";

    if (obj.value !== '') {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                console.log(this.responseText);
                var json = JSON.parse(this.responseText);

                for (i = 0; i < 9 && i < json.length; i++) {
                    var option = document.createElement("option");

                    option.value = json[i];
                    var type = list.split('_')[0];
                    option.innerHTML = type[0].toUpperCase() + type.slice(1);

                    document.getElementById(list).appendChild(option);
                }
            }
        };
        xmlhttp.open("GET", "js/autoCompleteLocation.php?q=" + obj.value + "&type=" + list + "&city=" + document.getElementById("shipping_city").value);
        xmlhttp.send();
    }
    else {
        document.getElementById(list).innerHTML = "";
    }
}


function updatePrice(price) {

    var qty = parseFloat(document.getElementById("quantity").value);

    var zip = document.getElementById("shipping_zip").value;
    var item_cost = parseFloat(price) * qty;
    var shipping_cost = document.querySelector('input[name="shipping_type"]:checked').value;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {

            var response = JSON.parse(this.responseText);
            var tax_cost;
            var shipping_cost = parseFloat(response[0]);

            if (response.length === 2) {
                tax_cost = parseFloat(response[1]);
            }
            else
                tax_cost = 0;

            item_cost += (tax_cost * item_cost) + shipping_cost;

            document.getElementById("total_cost").innerHTML = "$" + item_cost.toFixed(2);
            document.getElementById("post_total_cost").value = document.getElementById("total_cost").innerHTML.slice(1);
        }
    };
    xmlhttp.open("GET", "/js/updatePrice.php?zip=" + zip + "&shipping=" + shipping_cost);
    xmlhttp.send();
}