<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student Registration</title>
</head>
<body>
    <h2>Student Portal - Registration</h2>
    <form method="POST" action="../Controller/RegistrationController.php" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label for="name">Student name: </label></td>
                <td><input type="text" id="name" name="name" required></td>
            </tr>
            <tr>
                <td><label for="pass">Password: </label></td>
                <td><input type="password" id="pass" name="password" required></td>
            </tr>
            <tr>
                <td><label for="file">Profile picture: </label></td>
                <td><input type="file" id="file" name="file" required></td>
            </tr>
            <tr>
                <td><button type="submit" name="submit">Register</button></td>
            </tr>
        </table>
    </form>

    <br>
    <a href="./Login.php">Already have an account? Login here.</a>
</body>
</html>