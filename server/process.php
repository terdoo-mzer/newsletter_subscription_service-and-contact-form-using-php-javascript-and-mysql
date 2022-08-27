<?php

echo "<h1>"."Hello World"."</h1>";

"<br>";

// Retreieve form values
$name = $_POST["name"];
$email = $_POST["email"];


// Set database credentials
$servername = "localhost";
$username = "root";
$password = "";


// Connect to database
try {
  $conn = new PDO("mysql:host=$servername;dbname=known_newsletter", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  echo "<br>";
  echo '<a href="http://localhost/html_php_practice/templatemo_516_known/">Go Home</a>';
}


//Insert data into database
$subscriber = [
    'name' => isset($name)? $name:NULL,
    'email' => isset($email)? $email:NULL
];


// Insert data into database
$sql = 'insert into newsletter(name, email) values (:name,:email)';
$conn->prepare($sql
)->execute($subscriber);



