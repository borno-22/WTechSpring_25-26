<?php
// 1. Start the session (Crucial for remembering the user)
session_start();
include "../Model/db.php";

// 2. Act as the Gatekeeper (Only allow POST requests)
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 3. Catch the text data sent from Login.php
    $name = $_POST["name"];
    $password = $_POST["password"];

    // 4. Basic Validation
    if (!empty($name) && !empty($password)) {

        // 5. Talk to the Model (Database)
        $database = new db();
        $connection = $database->connection();

        // Call the signin function
        $result = $database->signin($connection, "users", $name, $password);

        // 6. Check the results
        // If num_rows is exactly 1, it means we found the user!
        if ($result->num_rows == 1) {
            // Loop through the result to grab their specific data
            while ($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $username = $row["username"];
                $filepath = $row["filepath"];

                // 7. Create the VIP Wristband (Session Variables)
                $_SESSION["username"] = $username;
                $_SESSION["filepath"] = $filepath;
                $_SESSION["id"] = $id;
                $_SESSION["loggedIn"] = true; // This is the master key!

                // 8. Send them to the Dashboard
                Header("Location: ../View/Dashboard.php");
                exit();
            }
        } else {
            // No match found
            echo "Login failed! Incorrect username or password.";
            echo "<br><a href='../View/Login.php'>Try Again</a>";
        }
    } else {
        echo "Please fill in all fields.";
    }
}
