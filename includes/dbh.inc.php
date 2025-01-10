<?php

$host = "localhost";
$dbname = "myfirstdatabase";
$dbusername = "myuser";
$dbpassword = "mypassword";

// try catch block for connecting to the database
try {
    // PDO(PHP DATA OBJECT) instance to connect to the database.
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    //throw exceptions if an error occurs.
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage()); //Display error message

}