<?php
ob_start();
require_once "pdo.php";


// CUSTOMER TABLE
$query = "INSERT INTO customers (first_name, last_name, email, phone_number, address,city, state, zip)
            VALUES (:first_name,:last_name, :email, :phone_number,:address,:city,:state,:zip)";

$stmt = $pdo->prepare($query);

$stmt->bindParam(':first_name', $_POST["first_name"]);
$stmt->bindParam(':last_name', $_POST["last_name"]);
$stmt->bindParam(':email', $_POST["email"]);
$stmt->bindParam(':phone_number', $_POST['phone_number']);
$stmt->bindParam(':address', $_POST['shipping_address']);
$stmt->bindParam(':city', $_POST['shipping_city']);
$stmt->bindParam(':state', $_POST["shipping_state"]);
$stmt->bindParam(':zip', $_POST["shipping_zip"]);

$stmt->execute();
$cid = $pdo->lastInsertId();

if ($cid == 0) {

    $query = 'SELECT cid FROM customers
              WHERE first_name=:first_name && last_name=:last_name && phone_number=:phone_number';

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(':first_name', $_POST["first_name"]);
    $stmt->bindParam(':last_name', $_POST["last_name"]);
    $stmt->bindParam(':phone_number', $_POST["phone_number"]);

    $stmt->execute();

    $row = $stmt->fetch();

    $cid = $row['cid'];
}


// ORDER TABLE
$query = "INSERT INTO customer_order (pid, cid, qty, order_date, shipping_type, total)
            VALUES (:pid,:cid, :qty, CURRENT_TIMESTAMP, :shipping_type, :total)";

$stmt = $pdo->prepare($query);

$stmt->bindParam(':pid', $_POST["pid"]);
$stmt->bindParam(':cid', $cid);
$stmt->bindParam(':qty', $_POST["quantity"]);
$stmt->bindParam(':shipping_type', $_POST["shipping_type"]);
$stmt->bindParam(':total', $_POST["total_cost"]);

$stmt->execute();
$oid = $pdo->lastInsertId();

// CREDIT CARD TABLE
$query = "INSERT INTO creditcards (name_on_card, card_number, exp_date, customer_id)
            VALUES (:name_on_card,:card_number,:exp_date, :customer_id)";

$stmt = $pdo->prepare($query);

$stmt->bindParam(':name_on_card', $_POST["credit_card_name"]);
$stmt->bindParam(':card_number', $_POST["credit_card_number"]);
$stmt->bindParam(':exp_date', $_POST["credit_card_expiration"]);
$stmt->bindParam(':customer_id', $cid);

$stmt->execute();

$pdo = null;

$url = 'http://andromeda-52.ics.uci.edu:5052/confirmation.php';
$fields = array(
    'oid'=>urlencode($oid)
);

//url-ify the data for the POST
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string,'&');

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//execute post
$result = curl_exec($ch);

//close connection
curl_close($ch);

//header("Location: confirmation.php");

?>