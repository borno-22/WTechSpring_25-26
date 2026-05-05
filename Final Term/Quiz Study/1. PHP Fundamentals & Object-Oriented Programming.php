<?php
  // Enforces strict data types
  declare(strict_types=1); // tells php not auto-convert

  //////////////////Variables & Data Types///////////////////
  
  $firstName = "John"; // String
  $age = 25;           // Integer
  $isStudent = true;   // Boolean[cite: 14, 15]
  
  // Associative Array (key-value pairs)
  $car = array("brand"=>"Ford", "model"=>"Mustang", "year"=>1964);
  
  var_dump($car); 
?>

<hr>

<?php
/////////////////////////////Control Structures & Loops///////////////

  $colors = array("red", "green", "blue");

  foreach ($colors as $value) {
    if ($value == "green") {
        echo "Green means GO!<br>";
    } else {
        echo "The color is $value<br>";
    }
  }
?>

<hr>

<?php 
////////////////////Functions & Strict Typing///////////////////

  // Function with parameter types and a return type declaration
  function addNumbers(float $a, float $b) : int {
    return (int)($a + $b);
  }

  echo addNumbers(1.2, 5.4);
?>

<hr>

<?php
//////////////Object-Oriented Programming (OOP)/////////////

  class Fruit {
    // Properties
    //A property of the class. private means it can only be accessed from inside the class
    private $name;
    
    // Constructor
    //A magic method that fires automatically when you create a new object
    public function __construct($name) {
      //The $this keyword refers to the current object. It accesses the object's property
      $this->name = $name;
    }
    
    // Methods
    public function get_name() {
      return $this->name;
    }
  }

  // Create an object (an instance of the class)
  $fruit_name = new Fruit("Apple");
  
  echo "I am eating an " . $fruit_name->get_name();
?>