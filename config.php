<?php 
/**
 * Configure database connection
 * 
 */

$host = "localhost";
$usename = "root";
$password = "root";
$dbname = 'test';
$dsn = "mysql:host=$host;dbname=$dbname";
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
)

?>