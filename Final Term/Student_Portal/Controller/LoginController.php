<?php
include "../Model/db.php"; // Connects to the database class
session_start(); // Resumes or starts a session to track the login state

$name = ""; $password = ""; // Sets default empty strings for the form fields

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Only runs if the login form is submitted
    $name = $_POST["name"]; // Captures the username from POST
    $password = $_POST["password"]; // Captures the password from POST

    $database = new db(); // Creates the database object
    $connection = $database->connection(); // Opens the connection
    $result = $database->signin($connection, "users", $name, $password); // Asks DB for a match

    // If result exists and we found exactly 1 matching user
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Unpacks the database row into an associative array
        $_SESSION["loggedIn"] = true; // Sets a session flag that the user is officially logged in
        $_SESSION["UserName"] = $name; // Stores the name in the session for the Dashboard
        if (isset($row["filepath"])) { // If the user has a profile picture path in the DB
            $_SESSION["filepath"] = $row["filepath"]; // Store that path in the session too
        }
        setcookie("UserName", $name, time() + 3600, "/"); // Creates a 1-hour cookie in the browser
        Header("Location:../View/Dashboard.php"); // Sends the user to their private dashboard
    } else {
        echo "Invalid Username or Password"; // Error message if no match found
    }
}
?>