<?php
// We start the session to check if the student is already logged in
session_start();

// If the session "loggedIn" is true, the student shouldn't see the login page
// We automatically send them to the Dashboard instead
if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true) {
    Header("Location: Dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Login</title>
</head>
<body>
    <form method='post' action="../Controller/LoginController.php">
        
        <h1 style='color: red'>Student LogIn Page</h1>
        
        <table>
            <tr>
                <td>User Name:</td>
                <td><input type="text" name="name" required></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Login">
                </td>
            </tr>
        </table>
        
        <p>Don't have an account? <a href="Registration.php">Register here</a></p>
        
    </form>
</body>
</html>