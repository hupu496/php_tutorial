<?php 

$name ="Aadarsh";
echo $name;
echo "<br>";
echo "this string" . "length is ".strlen($name);//dot is concat the string
echo "<br>";
echo str_word_count($name);
echo "<br>";
echo strrev($name);
echo "<br>";
echo strpos($name, "s");
echo "<br>";
echo str_replace("Aadarsh", "Harry" , $name );
echo "<br>";
echo str_repeat($name, 13);
echo "<br>";
echo rtrim("<pre> this is a good boy </pre>" );// remove space in right
echo "<br>";
echo  ltrim("<pre> this is good boy </pre>");//remove space in left;
echo "<br>";


?>