<?php
class db
{
    function connection()
    {
        $db_host = "localhost";
        $db_user = "root";
        $db_password = "";
        $db_name = "student_portal";

        $connection = new mysqli($db_host, $db_user, $db_password, $db_name);

        if ($connection->connect_error) {
            die("Could not Connect to Database: " . $connection->connect_error);
        }
        return $connection;
    }
}
