<?php
//connect to the database
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "sdc310l_db";
$conn = mysqli_connect($hostname, $username, $password, $dbname);

$subtotal = 0;
$totalItems = 0;

if (isset($_POST['clear'])) {
    setcookie(1,0, time() + 3600, '/');
    setcookie(2,0, time() + 3600, '/');
    setcookie(3,0, time() + 3600, '/');
    setcookie(4,0, time() + 3600, '/');
    setcookie(5,0, time() + 3600, '/');
}

//query the catalog
$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);
?>
<html>
    <head>
        <title>SDC310L Project - BenLev2833</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <h2>Products on offer:</h2>
        <table>
            <tr style="font-size:large;">
                <th>Product #</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Cost(in pennies)</th>
                <th>Total Product Cost</th>

            </tr>
            <?php while($row = mysqli_fetch_array($result)):;
                if ($_COOKIE[$row["ProductID"]] > 0):?>
                    <?php $totalItems += $_COOKIE[$row["ProductID"]];?>
                    <tr>    
                        <td><?php echo $row["ProductID"];?></td>
                        <td><?php echo $row["Name"];?></td>
                        <td><?php echo $_COOKIE[$row["ProductID"]];?></td>
                        <td><?php echo $row["Cost"];?></td>
                        <td><?php echo $row["Cost"] * $_COOKIE[$row["ProductID"]];?></td>
                        <?php $subtotal += $row["Cost"] * $_COOKIE[$row["ProductID"]];?>
                    </tr>
                <?php endif;?>
            <?php endwhile;?>
        </table>
        <?php   
                $shipping = $subtotal * .1;
                $tax = $subtotal * .05;
        ?>
        <form method='POST'>
            <h3>Total items: <?php echo $totalItems;?></h3>
            <h3>Shipping and handling fee: <?php echo $shipping;?></h3>
            <h3>Tax: <?php echo $tax;?></h3>
            <h3>Total Cost: <?php echo $subtotal + $tax + $shipping?></h3>
            <input type="submit" value="Clear Cart (refresh after)" name="clear">
        </form>
        <a href="catalog.php">Back to Catalog</a>
    </body>
</html>