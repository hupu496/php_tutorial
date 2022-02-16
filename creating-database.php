<?php
echo "Welcome to the stage where we are ready   to get connect tot database";
//Ways to connect to a  mysql database;
/*1.MySQLi extension
2.PDO*/

$servername = "localhost";
$username = "root";
$password = "";
//create a connection object

$conn = mysqli_connect($servername, $username, $password);
if(!$conn){
    die("sorry we failed to connect:". mysqli_connect_error());
}
echo "connection was successful";
?>