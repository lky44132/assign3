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
echo "Below is the doctor who is treating no patients:<br>";
$query="SELECT firstname,lastname FROM doctor WHERE licencenumber IN (SELECT distinct doctor.licencenumber FROM doctor WHERE doctor.licencenumber not in (select licencenumber From treats))";
$result = mysqli_query($connection,$query);
if (!$result) {
    die("databases query failed.");
}
echo "<ol>";
while ($row = mysqli_fetch_assoc($result)) {
    echo '<li>';
    echo "first name: ".$row['firstname']." ";
    echo "last name: ".$row['lastname']."<br>";
    echo "--------------------------<br>";
    echo '</li>';
}
mysqli_free_result($result);
echo "</ol>";

?>
</div>
</body>
</html>