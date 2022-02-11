<?php 
$name = "Harry";
$income = 200;
/*php data types
string
integer
float
boolean
object
array
Null

*/

//string sequence of characters
$name = "aadarsh";
$friend = "Rohan";
echo "$name ka friend $friend";
//integer non decima number
$income = 455;
$debts = -655;
echo  $income;
echo $debts;

//float - decimal point numbers

$income = 344.5;
$debts = -45.5;
echo $income;
echo "<br>";
echo $debts;
//Boolean can be  either true of false; 
$x = true;
$is_friend =false;
echo $x;
echo "<br>";
echo var_dump($is_friend);
//object = Instance of classes
//Employeee is class --> aadsrsh can be one object
echo "<br>";
//array -used to store multiple values in  a single variable
$friends  = array("rohan","shubham","skillf","Larry");
echo var_dump($friends);
//null
$name = NULL;

echo $name;
echo var_dump($name);

?>