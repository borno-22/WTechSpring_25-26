<?php
session_start(); // Resumes the session so we can see the UserName and Filepath
// If UserName isn't in the session, default to "Guest" (Null Coalescing)
$username = $_SESSION["UserName"] ?? "Guest"; 
// If Filepath isn't in the session, default to empty string
$filepath = $_SESSION["filepath"] ?? ""; 
?>
<!DOCTYPE html>
<html>
<body>
    <?php echo "Hello Mr. $username, welcome to dashboard."; ?><br>
    <a href="../Controller/Logout.php">Logout</a><br> <?php if (!empty($filepath)): ?>
        <img src="<?php echo $filepath; ?>" height="200px" width="200px" alt="User Profile"/>
    <?php else: ?>
        <p>No image uploaded</p> <?php endif; ?>
</body>
</html>