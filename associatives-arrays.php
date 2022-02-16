<?php

echo "Welcom to associatives array";
$arr = array('this', 'that', 'what'); //numberic array
$favCol = array(
   'shubham' =>'red',
   'rohan'=> 'green',
   'harry' => 'red',
   8=> 'this');
foreach ($favCol as $key => $value){
   echo "<br>Favorite color of $key is $value";
}
echo $favCol['harry'];
echo "<br>";
echo $favCol['rohan'];
echo "<br>";
echo $favCol[8];

?>