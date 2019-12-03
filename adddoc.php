<!DOCTYPE html>
<!--
    Author: Kaiyang Lin
-->


<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="all.css">
    </head>
<body>
    <div id="show">
<?php
$dbhost = "localhost";
$dbuser= "root";
$dbpass = "cs3319";
$dbname = "klin88assign2db";
$connection = mysqli_connect($dbhost, $dbuser,$dbpass,$dbname);
if (mysqli_connect_errno()) {
     die("database connection failed :" .
     mysqli_connect_error() .
     "(" . mysqli_connect_errno() . ")"
         );
    }
?>


<?php

echo '<form action="handleadd.php" method="post">';
echo 'first name:<input type="text" maxlength="20" name="fname"><br>';
echo 'last name:<input type="text" maxlength="20" name="lname"><br>';
echo 'license number:<input type="text" maxlength="4" name="lnum"><br>';
echo 'specialty:<input type="text" maxlength="30" name="specialty"><br>';
echo 'licensed date:<input type="date" name="ldate"><br>';

$query2 = "SELECT * from hospital";
$result2 = mysqli_query($connection,$query2);
if (!$result2) {
    die("databases query failed.");
}
echo "<ol>";
$pass = "0";
while ($row = mysqli_fetch_assoc($result2)) {
    
    echo '<input type="radio" name="hoscode" checked value="';
    echo $row["hospitalcode"];
    echo '">' . $row["hospitalcode"] . "<br>";
    
}

echo '<input type="submit">';
echo '</form>';

?>
</div>
</body>
</html>
