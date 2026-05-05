<?php include "../Controller/RegistrationController.php"; ?> <!DOCTYPE html>
<html>
<body>
    <h1>Registration Page</h1> <form method="post" action="" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label for="name">User Name:</label></td> <td><input type="text" id="name" name="name"> <?php echo $name; ?></td>
            </tr>
            <tr>
                <td><label for="password">Password:</label></td> <td><input type="password" id="pass" name="password"> <?php echo $password; ?></td>
            </tr>
            <tr>
                <td>File Upload:</td> <td><input type="file" name="file"></td> </tr>
            <tr>
                <td><input type="submit" name="submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>