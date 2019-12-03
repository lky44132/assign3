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
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$lnum = $_POST['lnum'];
$specialty = $_POST['specialty'];
$ldate = $_POST['ldate'];
$hoscode = $_POST['hoscode'];

$query = "SELECT * FROM doctor";
$result = mysqli_query($connection,$query);
if (!$result) {
    die("databases query failed.");
}

while ($row = mysqli_fetch_assoc($result)) {
    if ($row['licencenumber']==$lnum){
        echo "Can not add doctor due to ";
        die("invalid licence number");
    }
}

$query = 'INSERT INTO doctor values("' . $fname . '","' . $lname . '","' . $lnum . '","' . $ldate . '","'. $specialty . '","'. $hoscode . '")';
if (!mysqli_query($connection, $query)) {
     die("Error: insert failed due to " . mysqli_error($connection));
 }
echo "The doctor was added!";

echo '<br>';
echo '<a href="index2.html">Back to main</a>';

mysqli_close($connection);

?>
</div>
</body>
</html>
