<?php 
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername,$username,$password);

if(!$conn){
    die("sorry we failed to connect". mysqli_connect_error());
    
}
else{
    echo "connection was successful";
}


$sql = "CREATE DATABASE employee";
$result=mysqli_query($conn, $sql);

if($result){
    echo "the db was created successfully<br>";
}
else{
    echo "the db was not created successfully because of this errror --->".mysqli_error($conn);
}



?>