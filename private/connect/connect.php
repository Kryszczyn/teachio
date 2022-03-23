<?php

$host = 'localhost';
$db = 'teachio';
$user = 'root';
$password = '';

try 
{
    $dbh = new PDO('mysql:host=' . $host . ';dbname=' . $db, $user, $password);
    echo 'connected';
} 
catch (PDOException $e) 
{
    echo "Error!: " . $e->getMessage() . "<br/>";
    die();
}


?>