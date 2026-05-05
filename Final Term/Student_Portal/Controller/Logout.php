<?php
session_start(); // Must start the session to be able to identify it
session_destroy(); // Deletes all session data on the server (the digital pass is burned)
Header("Location: ../View/Login.php"); // Sends the user back to the public login page
?>