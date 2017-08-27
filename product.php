<!DOCTYPE html>
<html lang="en">

<?php

    require_once "pdo.php";

    $query = "SELECT * FROM products WHERE pid=:pid";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':pid', $_GET["pid"]);
    $stmt->execute();

    $row = $stmt->fetch();
    $pdo = null;

?>

<head>
    <meta charset="UTF-8">
    <title><?= $row['name'] ?></title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="wrapper">

    <?php include "partial_views/_header.php"; ?>

    <div class="product">

        <h1><?= $row["name"] ?></h1>
        <h3>Price: <span id="price">$<?= $row['price'] ?></span></h3>

        <img src="img/<?= $row['img_name'] ?>.png" height="200" width="200">

        <h2>Description</h2>
        <p><?= $row['description'] ?></p>

        <h2>Features</h2>
        <ul style="margin-left: 20px">
            <?php $features = explode("\n", $row['features']);
            foreach ($features as $feature){
                echo '<li>'.$feature.'</li>';
            } ?>
        </ul>


        <h2>Order</h2>
        <?php include "partial_views/_order_form.php"?>
    </div>

</div>
</body>

</html>
