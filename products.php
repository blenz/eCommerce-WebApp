<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Products</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="wrapper">

    <?php include "partial_views/_header.php" ?>

    <div class="content">
        <h1>Products</h1>

        <h3>List of products</h3>

        <table><tr>
            <?php
            $i = 0;
            require_once "pdo.php";

            $query = 'SELECT * FROM products';
            $stmt = $pdo->query($query);

            while ($row = $stmt->fetch()):
                if ($i++ % 3 == 0)
                    echo "</tr><tr>\n";
                include "partial_views/_product_cell.php";
            endwhile;
            $pdo = null; ?>
        </table>

    </div>

</div>

<script type="text/javascript" src="js/script.js"></script>
</body>

</html>
