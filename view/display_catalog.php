<?php
    require_once("../model/prodinfo_db.php");
    require_once("../controller/prodinfo_controller.php");

    $prodID = -1;
    $quant = 0;

   cookie_check();

    if (isset($_POST['add'])) {
        add_quantity($_POST['prod_ID'], $_POST['quant']);
        $quant = 0;
    }

    if (isset($_POST['remove'])) {
        remove_quantity($_POST['prod_ID'], $_POST['quant']);
        $quant = 0;
    }

    $result = get_all_products();
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
        <a href="display_cart.php">Check Cart</a>
    </body>
</html>