<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="wrapper">

    <?php

    include "partial_views/_header.php";

    require_once "pdo.php";

    $query = "SELECT * FROM customer_order co
              JOIN customers c ON c.cid=co.cid
              JOIN products p ON p.pid=co.pid
              WHERE oid=:oid";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':oid', $_POST["oid"]);
    $stmt->execute();

    $row = $stmt->fetch();
    $pdo = null;

    ?>

    <div class="confirmation">

        <h1>Order Confirmation</h1>

        <table>
            <thead><h3>Order Summary</h3></thead>
            <tr>
                <td>Name:</td>
                <td><?=$row['first_name']?> <?=$row['last_name']?></td>
            </tr>
            <tr>
                <td>Phone Number:</td>
                <td><?=$row['phone_number']?></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><?=$row['email']?></td>
            </tr>
            <tr>
                <td>Shipping Address:</td>
                <td><?=$row['address']?><br><?=$row['city']?>, <?=$row['state']?></td>
            </tr>
            <tr>
                <td>Shipping Type:</td>
                <td><?=$row['shipping_type']?></td>
            </tr>

            <tr>
                <td>Product:</td>
                <td><?=$row['name']?></td>
            </tr>
            <tr>
                <td>Quantity:</td>
                <td><?=$row['qty']?></td>
            </tr>
            <tr>
                <td>Total:</td>
                <td>$<?=$row['total']?></td>
            </tr>


        </table>


        <h1 style="padding-top: 100px">Thanks for your order</h1>

    </div>

</div>
</body>
</html>