<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "eccomerce";

$conn = mysqli_connect($servername, $username,$password, $database);
if (!$conn){
    die("sorry we failed". mysqli_connect_error());
}
else{
    $sql="SELECT * FROM `users2`"; 
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    echo $num;
}


?>