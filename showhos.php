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

$query = "SELECT hospitalname,firstname,lastname,headstartdate FROM hospital,doctor WHERE headID = licencenumber ORDER BY hospitalname";
$result = mysqli_query($connection,$query);

if (!$result) {
    echo '</form>';    die("databases query failed.");
}
echo "<ol>";
while ($row = mysqli_fetch_assoc($result)) {
    echo " Hospital name: ".$row['hospitalname']."   ";
    echo " Head first name: ".$row['firstname']."   ";
    echo " Head last name: ".$row['lastname']."   ";
    echo " Start date: ".$row['headstartdate']."<br>";
    echo "--------------------------------------------<br>";
}

echo '<br>';
echo '<a href="index2.html">Back to main</a>';

mysqli_free_result($result);
?>
</div>
</body>
</html>