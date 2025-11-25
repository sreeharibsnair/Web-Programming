
<html>
<body>
<h1>ELECTRICITY BILL</h1>
<form method="post" action="#">
Consumer ID:<input type="number" name="id"><br>
Name:<input type="text" name="name"><br>
Units Consumed:<input type="number" name="units"><br><br>
Billing From:<input type="date" name="from"><br>
Billing To:<input type="date" name="to"><br><br>
<input type="submit">
<input type="reset">
</form>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $id=$_POST["id"];
    $name=$_POST["name"];
    $units=$_POST["units"];
    $from=$_POST["from"];
    $to=$_POST["to"];

    echo "<h3>KSEB</h3>";
    echo "Consumer ID: $id<br>";
    echo "Consumer Name: $name<br>";
    echo "Units Consumed: $units<br>";
    echo "Billing Period: $from to $to<br><br>";

    if($units<100){
        $amt=$units*3.25;
    } elseif($units>100 && $units<=200){
        $amt=$units*4;
    } elseif($units>200 && $units<=300){
        $amt=$units*5;
    } else{
        $amt=$units*5;
    }

    echo "<h4>Total: Rs. $amt</h4>";
}
?>
</body>
</html>

