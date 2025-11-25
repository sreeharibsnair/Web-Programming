<!DOCTYPE html>
<html>
<head>
    <title>Student Array Sorting</title>
</head>
<body>
<?php

$students=array("Nihad","Sreehari","Jobin","Ihsan","Sidhu");

echo "<h2>Original Array:</h2>";
echo "<pre>";
print_r($students);
echo "</pre>";

asort($students);
echo "<h2>Array sorted in Ascending order:</h2>";
echo "<pre>";
print_r($students);
echo "</pre>";

arsort($students);
echo "<h2>Array sorted in Descending order:</h2>";
echo "<pre>";
print_r($students);
echo "</pre>";
?>
</body>
</html>
