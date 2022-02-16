<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "employee";

$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn){
    die("Sorry we failed to connect: ".mysqli_connect_error());
}
else{
    echo "Connection was successful<br>";
}

$sql = "INSERT INTO `user` (`name`, `role`) VALUES ('Aadarsh', 'Bihar' )";
$result = mysqli_query($conn, $sql);
if($result){
    echo "entery insert successfully<br>";
}
else{
    echo "the db  was not insert successfully because of this errror --->".mysqli_error($conn);
}
?>