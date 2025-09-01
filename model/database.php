<?php
    function get_db_conn()
    {
        //Connect to the database
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sdc310l_db";
        return mysqli_connect($hostname, $username, $password, $dbname);
    }
?>