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

echo '<form action="handledelete.php" method="post">';

$query = "SELECT * FROM doctor";
$result = mysqli_query($connection,$query);

if (!$result) {
    echo '</form>';    die("databases query failed.");
}
echo "<ol>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "first name: ".$row['firstname']." ";
    echo "last name: ".$row['lastname']." ";
    echo '<input type="radio" name="lnum" checked value="';
    echo $row["licencenumber"];
    echo '">' . $row["licencenumber"] . "<br>";
    echo "---------------------------------<br>";
}


echo '<input type="submit">';

mysqli_free_result($result);


?>
</div>
</body>
</html>