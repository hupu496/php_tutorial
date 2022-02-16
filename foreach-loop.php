<?php  echo "Welcome to the world of each loop";

$arr = array("bananas", "apples","Harpic", "Bread");

//for($i=0; $i < $count($arr); $i++){
//    echo $arr[i];
//    echo "<br>";
//}

foreach ($arr as $value) {
    echo "$value <br>";
}

?>