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
   echo "connected"; 
}
$sql = "SELECT * FROM `users2` WHERE `name` = 'Aadarsh'";
$result = mysqli_query($conn, $sql);

$num  = mysqli_num_rows($result);
echo $num;
echo "records found in the Database<br>";
if($num > 0){
    while($row  = mysqli_fetch_assoc($result)){
    echo $row['sno'].". Hello". $row['name'] ."Welcome to ". $row['dest']);
    echo "<br>";
    }
}


?>