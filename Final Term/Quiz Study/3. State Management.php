<!--//////////////////COOKIES//////////////////-->

<?php
  // 1. Setting a Cookie
  $cookie_name = "user";
  $cookie_value = "Alex Porter";
  
  // Set to expire in 30 days (86400 seconds = 1 day)
  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

  // 3. Deleting a Cookie (Uncomment the line below to delete)
   setcookie("user", "", time() - 3600); // Sets expiration to one hour ago
?>
<!DOCTYPE html>
<html>
<body>
  <?php
    // 2. Reading a Cookie
    if(!isset($_COOKIE[$cookie_name])) {
        echo "Cookie named '" . $cookie_name . "' is not set!";
    } else {
        echo "Cookie '" . $cookie_name . "' is set!<br>";
        // Access the cookie value using the $_COOKIE superglobal
        echo "Value is: " . $_COOKIE[$cookie_name];
    }
  ?>
</body>
</html>


<!--//////////////////SESSIONS//////////////////-->
<?php
  // 1. Start the session
  session_start();

  // 2. Set session variables
  $_SESSION["username"] = "Bob";
  $_SESSION["role"] = "Admin";
  
  // Example of changing a session variable (overwriting it)
  $_SESSION["favcolor"] = "yellow";
?>
<!DOCTYPE html>
<html>
<body>
  <?php
    // 3. Accessing session variables
    echo "Welcome back, " . $_SESSION["username"] . "!<br>";

    // Handy trick: Print all current session variables for debugging
    echo "Current Session Data:<br>";
    print_r($_SESSION);

    // 4. Destroying a session (e.g., when a user clicks 'Logout')
    // session_unset();  // Removes all session variables
    // session_destroy();    // Destroys the session entirely
  ?>
</body>
</html>