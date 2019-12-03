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
$onum = $_POST['onum'];
session_start() ;
$lnum =$_SESSION['lnum'];
$query = 'INSERT INTO treats values("' . $onum . '","' . $lnum . '")';
if (!mysqli_query($connection, $query)) {
     die("Error: insert failed due to " . mysqli_error($connection));
 }
echo "The patient was assigned!";
echo '<br>';
echo '<a href="index2.html">Back to main</a>';
?>
</div>
</body>
</html>