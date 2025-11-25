<html>
<head>
<title>cricket</title>
</head>
<center>
<body>
<?php
$name=[" Virat kohli "," Rohit sharma "," Shikar dhawan "," Rishab pant "," Hardik pandya "," Dhoni "," Suresh Raina "," Yuvaraj Singh "," Rahul "," Siraj "];
echo "<h2><u>Cricket Team Players Name</u></h2>
<table border='1px'>
<tr> <th> Si No.</th> <th>Name</th></tr>";
for($i=0;$i<10;$i++)
{
$sl=$i+1;
echo "<tr> <td><center> $sl</center>  </td>   <th>$name[$i]</th></tr>";
}
echo"</table>";
?>
</body>
</html>
