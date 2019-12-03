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
$oldnameID = $_SESSION['hcode'];
$newname = $_POST['newname'];

$sql = "UPDATE hospital SET hospitalname = '" . $newname . "' WHERE hospitalcode='" . $oldnameID . "'";
if (mysqli_query($connection, $sql)) {
    echo "Record update successfully";
} else {
    echo "Error update record: " . mysqli_error($connection);
}
echo '<br>';
echo '<a href="index2.html">Back to main</a>';

?>
</div>
</body>
</html>