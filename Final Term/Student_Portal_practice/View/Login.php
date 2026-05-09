<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Login</title>
</head>
<body>
    <h2>Student Portal - Login</h2>

    <form method="POST" action="../Controller/loginvalidation.php">
        <table>
            <tr>
                <td><label for="name">Student Name:</label></td>
                <td><input type="text" id="name" name="name" required></td>
            </tr>
            <tr>
                <td><label for="pass">Password:</label></td>
                <td><input type="password" id="pass" name="password" required></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="submit">Login</button></td>
            </tr>
        </table>
    </form>

    <br>
    <a href="Registration.php">Don't have an account? Register here.</a>
</body>
</html>