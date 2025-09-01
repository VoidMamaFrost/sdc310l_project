<?php
    require_once('database.php');

    //Get all the entries for the product table
    function get_all_products()
    {
        //Query for all products
        $conn = get_db_conn();
        $query = "SELECT * FROM products";
        $result = mysqli_query($conn, $query);
        return $result;
    }
?>