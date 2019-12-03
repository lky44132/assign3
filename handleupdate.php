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
session_start() ;
$hcode = $_POST['hcode'];
$_SESSION['hcode'] = $hcode;
echo "Enter the new name for this hospital";
echo '<form action="finallupdate.php" method="post">';
echo 'New name: <input type="text" name="newname" maxlength="20" checked value="type here"><br>';
echo '<input type="submit">';
echo '</form>';


echo '<br>';
echo '<a href="index2.html">Back to main</a>';

?>
</div>
</body>
</html>