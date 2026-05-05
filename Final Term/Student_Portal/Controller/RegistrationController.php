<?php
include "../Model/db.php"; // Includes the database class so we can talk to MySQL
session_start(); // Starts the session to keep track of the user

$name = ""; // Initializes an empty variable for the username
$password = ""; // Initializes an empty variable for the password
$datafile = "../data.json"; // Sets the path for our JSON backup file

// Checks if the user clicked the "Submit" button
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"]; // Grabs the typed name from the form
    $password = $_POST["password"]; // Grabs the typed password from the form
    $file = $_FILES["file"]; // Grabs the uploaded file information

    // Validates that fields aren't empty and meet length requirements
    if (!empty($name) && strlen($name) >= 5 && strlen($password) >= 4) {
        
        // --- JSON Backup Section ---
        $formdata = array("name" => $name, "password" => $password); // Packages inputs into an array
        if (file_exists($datafile)) { // Checks if the JSON file already exists
            $existdata = file_get_contents($datafile); // Reads the existing text from the file
            $tempdata = json_decode($existdata, true); // Converts JSON text into a PHP array
        } else {
            $tempdata = array(); // If no file exists, start with a fresh empty array
        }
        if (!is_array($tempdata)) { $tempdata = array(); } // Ensures we have a valid array
        $tempdata[] = $formdata; // Adds the new user data to the end of the array
        $jsondata = json_encode($tempdata, JSON_PRETTY_PRINT); // Converts array back to pretty JSON text
        file_put_contents($datafile, $jsondata); // Saves that text back into data.json

        // --- File Upload Section ---
        if ($file) { // Checks if a file was actually uploaded
            $targetdirectory = "../File/"; // Defines where the file will live permanently
            $path = $targetdirectory . basename($file["name"]); // Creates the full final path
            move_uploaded_file($file["tmp_name"], $path); // Moves file from temporary storage to /File/
        } else { $path = ""; } // If no file, keep the path empty

        // --- Database Section ---
        $database = new db(); // Creates an instance of our DB class
        $connection = $database->connection(); // Gets the active database connection
        $result = $database->signup($connection, "users", $name, $password, $path); // Saves to MySQL
        
        if ($result) { // If the database successfully saved the data
            Header("Location:../View/Login.php"); // Redirect the user to the login page
        }
    } else {
        echo "Please use appropriate validation (Name >=5, Pass >=4)"; // Error for short inputs
    }
}
?>