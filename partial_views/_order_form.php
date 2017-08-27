<form action="form_process.php" onsubmit="return validate()" onkeyup="isTextValid(document.activeElement);autoCompleteAddress(document.activeElement)" method="POST">


    <input type="hidden" name="product_name" value="<?= $row['name'] ?>">
    <input type="hidden" name="pid" value="<?= $row['pid'] ?>">


    <table>


        <!-- CONTACT -->
        <tr>
            <td><h4>Contact</h4></td>
        </tr>
        <tr>
            <td>First Name:</td>
            <td><input id="first_name" class="text-box" type="text" name="first_name"/><label
                        id="first_name_error"></label></td>
        </tr>
        <tr>
            <td>Last Name:</td>
            <td><input id="last_name" class="text-box" type="text" name="last_name"/><label
                        id="last_name_error"></label></td>
        </tr>
        <tr>
            <td>Phone Number:</td>
            <td><input id="phone_number" class="text-box" type="text" name="phone_number"/><label
                        id="phone_number_error"></label></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input id="email" class="text-box" type="text" name="email"/><label
                        id="email_error"></label></td>
        </tr>


        <!-- ORDER -->
        <tr>
            <td><h4>Order</h4></td>
        </tr>
        <tr>
            <td>Quantity:</td>
            <td><select id="quantity" onchange="updatePrice(<?= $row['price'] ?>)" name="quantity">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select></td>
        </tr>
        <tr>
            <td>Name on Credit Card:</td>
            <td><input id="credit_card_name" class="text-box" type="text" name="credit_card_name"/><label
                        id="credit_card_name_error"></label></td>
        </tr>
        <tr>
            <td>Credit Card Number:</td>
            <td><input id="credit_card" class="text-box" type="text" name="credit_card_number"/><label
                        id="credit_card_error"></label></td>
        </tr>
        <tr>
            <td>Expiration:</td>
            <td><input id="credit_card_expiration" class="text-box" maxlength="7" type="text"
                       name="credit_card_expiration"/><label
                        id="credit_card_expiration_error"></label></td>
        </tr>


        <!-- SHIPPING -->
        <tr>
            <td><h4>Shipping</h4></td>
        </tr>
        <tr>
            <td>Address:</td>
            <td><input id="shipping_address" class="text-box" type="text" name="shipping_address"/><label
                        id="shipping_address_error"></label></td>
        </tr>
        <tr>
            <td>City:</td>
            <td><input id="shipping_city" class="text-box" type="text" list="city_list" onblur="isTextValid(this)"
                       name="shipping_city"/><label
                        id="shipping_city_error"></label></td>
            <datalist id="city_list"></datalist>
        </tr>

        <tr>
            <td>State:</td>
            <td><input id="shipping_state" class="text-box" type="text" onblur="isTextValid(this)" list="state_list"
                       maxlength="2"
                       name="shipping_state"/><label
                        id="shipping_state_error"></label></td>
            <datalist id="state_list"></datalist>
        </tr>
        <tr>
            <td>Zip:</td>
            <td><input id="shipping_zip" list="zip_list" onblur="updatePrice(<?= $row['price'] ?>);isTextValid(this)"
                       class="text-box"
                       type="text" maxlength="5" name="shipping_zip"/><label
                        id="shipping_zip_error"></label></td>
            <datalist id="zip_list"></datalist>
        </tr>
        <tr>
            <td>Shipping Type:</td>
            <td>
                <input type="radio" name="shipping_type" onchange="updatePrice(<?= $row['price'] ?>);"
                       value="Overnight"/>Overnight
                ($10)<br>
                <input type="radio" name="shipping_type" onchange="updatePrice(<?= $row['price'] ?>)" value="2-day"
                       checked/>2-Day Expedited ($7)<br>
                <input type="radio" name="shipping_type" onchange="updatePrice(<?= $row['price'] ?>)" value="6-day"/>6-Day
                Ground ($3)<br>
            </td>
        </tr>
        <tr style="text-align: center">
            <td><h4>Total (Shipping + Tax):</h4></td>
            <td>
                <h4 id="total_cost" style="color: red">Please fill out zip</h4>
                <input id="post_total_cost" type='hidden' name="total_cost"/>
            </td>
        </tr>
        <tr style="text-align: center">
            <td><input id="submit-btn" type="submit" name="submit" value="Place Order"/></td>
            <td><input id="reset-btn" type="reset" value="Reset"/></td>
        </tr>
    </table>
</form>
<script type="text/javascript" src="../js/script.js"></script>
<script type="text/javascript" src="../js/ajax.js"></script>
