<!--//////////Form Handling, Security, & Validation.php/////////////-->
<!-- index.html -->
<form action="welcome.php" method="post">
  Name: <input type="text" name="username"><br>
  E-mail: <input type="text" name="email"><br>
  <input type="submit" value="Submit">
</form>

<!-- welcome.php -->
<?php
  // We access the data using the 'name' attributes from the HTML form
  $name = $_POST["username"];
  $email = $_POST["email"];

  echo "Welcome, " . $name . "! Your email is: " . $email;
?>

<hr>

<?php
/////////////////////A Secure, Stateful Form///////////////

  // 1. Initialize variables to hold errors and values
  $nameErr = $emailErr = "";
  $name = $email = "";

  // 2. Check if the form was submitted via POST
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 3. Validate Name
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } else {
      // Clean the input to prevent XSS attacks
      $name = htmlspecialchars($_POST["name"]);
      // Enforce rules using regular expressions
      if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $nameErr = "Only letters and white space allowed";
      }
    }

    // 4. Validate Email
    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = htmlspecialchars($_POST["email"]);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    }
  }
?>

<!-- HTML FORM -->
<!-- Action points back to this exact page securely -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  
  Name: 
  <!-- The 'value' attribute echoes back what the user typed to keep it stateful -->
  <input type="text" name="name" value="<?php echo $name;?>">
  <span style="color:red;"><?php echo $nameErr;?></span><br>
  
  E-mail: 
  <input type="text" name="email" value="<?php echo $email;?>">
  <span style="color:red;"><?php echo $emailErr;?></span><br>
  
  <input type="submit" value="Submit">
</form>

<!--
Step-by-Step Breakdown:

Initialization: We create empty strings to hold any potential error messages and the user's input.  

$_SERVER["REQUEST_METHOD"]: This ensures our validation logic only runs after the user hits the submit button.  

Validation Logic: We check if fields are empty(). If they aren't, we clean them with htmlspecialchars() and test them using preg_match() or filter_var().  

Form Action: The action is set to $_SERVER["PHP_SELF"] wrapped inside htmlspecialchars(). Wrapping it prevents hackers from manipulating the URL structure.  

Retaining Data: The value="<?php echo $name;?>" snippet pre-fills the input box with whatever the user previously typed, so they don't have to start over if they make a mistake.
-->