<?php
// 1. Start the session and bring in the Model
session_start();
include "../Model/db.php";

// 2. Act as the Gatekeeper (Only allow POST requests)
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 3. Catch the text data
    $name = $_POST["name"];
    $password = $_POST["password"];

    // 4. Catch the file data
    $file = $_FILES["file"];
    $filepath = ""; // We will store the final destination here

    // 5. Basic Validation (Make sure they aren't empty)    
    if (!empty($name) && strlen($name) >= 5 && strlen($password) >= 6) {

        // 6. Handle the File Upload
        if ($file) {
            $targetDictionary = "../File/";

            // Combine the directory with the actual name of the file (e.g., ../File/profile.jpg)
            $filepath = $targetDictionary . basename($file["name"]);

            // Move the file from PHP's temporary memory to your actual folder
            move_uploaded_file($file["tmp_name"], $filepath);
        }

        $database = new db();
        $connection = $database->connection();

        $result = $database->signup($connection, "users", $name, $password, $filepath);

        // 8. Redirect the user
        if ($result) {
            Header("Location: ../View/Login.php");
            exit();
        } else {
            echo "Failed to register user in the database.";
        }
    } else {

        echo "Validation Failed: Username must be at least 5 characters and password 6 characters.";
    }
}
