<?php
    //connect to the database
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sdc310l_db";
    $conn = mysqli_connect($hostname, $username, $password, $dbname);

    $prodID = -1;
    $quant = 0;

    if (!isset($_COOKIE[1])) {
        setcookie(1,0, time() + 3600, '/');
        setcookie(2,0, time() + 3600, '/');
        setcookie(3,0, time() + 3600, '/');
        setcookie(4,0, time() + 3600, '/');
        setcookie(5,0, time() + 3600, '/');
    }

    if (isset($_POST['add'])) {
        $prodID = $_POST['prod_ID'];
        $quant = $_POST['quant'];
        setcookie($prodID, $_COOKIE[$prodID] + $quant, time() + 3600, '/');
        $quant = 0;
    }

    if (isset($_POST['remove'])) {
        $prodID = $_POST['prod_ID'];
        $quant = $_POST['quant'];
        setcookie($prodID,$_COOKIE[$prodID] - $quant, time() + 3600, '/');
        $quant = 0;
        if ($_COOKIE[$prodID] < 0) {
            setcookie($prodID, $_COOKIE[$prodID], time() + 3600, '/');
        }
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
                <th>Product Description</th>
                <th>Cost(in pennies)</th>
                <th>Quantity</th>
            </tr>
            <?php while($row = mysqli_fetch_array($result)):;?>
            <tr>
                <td><?php echo $row["ProductID"];?></td>
                <td><?php echo $row["Name"];?></td>
                <td><?php echo $row["Description"];?></td>
                <td><?php echo $row["Cost"];?></td>
            </tr>
            <?php endwhile;?>
        </table>
        <form method='POST'>
            <h3>Enter Product ID: <input type="number" min=1 max= 5 name="prod_ID"></h3>
            <h3>How many do you want to add/remove? <input type="number" min=0 value=<?php echo $quant;?> name="quant">
            <input type="submit" value="Add to Cart" name="add">
            <input type="submit" value="Remove from cart" name="remove">
        </form>
        <a href="cart.php">Check Cart</a>
    </body>
</html>