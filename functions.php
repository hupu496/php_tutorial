<?php 
function processMarks($marksArr){
    $sum = 0;
    foreach ($marksArr as $value){
        $sum += $value;
    }
    return $value;
}
$rohanDas = [34,98,45,12,98,93];

$sumMarks = processMarks($rohanDas);
echo "Total marks scored  by rohan out of $sumMarks"



//average number
function avgMarks($marksArr){
    $sum = 0;
    $i = 1;
    foreach ($marksArr as $value){
        $sum += $value;
        $i++;
    }
    return $sum/$i;
}
?>