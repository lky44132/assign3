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

$name = $_POST["orderName"];
$way = $_POST["orderWay"];

echo "order by $name name in $way order<br>";

if ($name == "last" && $way == "asc"){
$query = "SELECT * FROM doctor ORDER BY lastname ASC";
}else if ($name == "last" && $way == "dec"){
$query = "SELECT * FROM doctor ORDER BY lastname DESC";
}else if ($name == "first" && $way == "asc"){
$query = "SELECT * FROM doctor order by firstname ASC";
}else{
$query = "SELECT * FROM doctor order by firstname DESC";
}

$result = mysqli_query($connection,$query);
if (!$result) {
     die("databases query failed.");
}
echo "firstname lastname<br>";
echo "<ol>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<li><a href='displaydoc.php?param1=".$row['firstname']."&param2=".$row['lastname']."'>".$row["firstname"]." ".$row["lastname"]."</a>";
}
mysqli_free_result($result);
echo "</ol>";

echo '<br>';
echo '<a href="index2.html">Back to main</a>';


?>
</div>
</body>
</html>

