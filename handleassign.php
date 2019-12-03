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
$lnum = $_POST['lnum'];
session_start() ;
$_SESSION["lnum"] = $lnum;
echo '<form action="deleteassign.php" method="post">';
$findname = "SELECT * FROM doctor where licencenumber = '".$lnum."'";
$doctor = mysqli_query($connection,$findname);

if (!$doctor) {
    echo '</form>';    die("databases query failed.");
}

while ($row = mysqli_fetch_assoc($doctor)) {
    echo "The doctor ";
    echo $row["firstname"];
    echo " ";
    echo $row["lastname"];
    echo "is treating patients below:<br>----------------------------<br>";
}
$findpatient = "SELECT firstname,lastname,treats.ohipnumber AS onumber FROM treats,patient where treats.ohipnumber = patient.ohipnumber AND licencenumber = '".$lnum."'";
$patient = mysqli_query($connection,$findpatient);
if (!$doctor) {
    echo '</form>';    die("databases query failed.");
}

while ($row = mysqli_fetch_assoc($patient)) {
    echo "Patient: ";
    echo $row["firstname"];
    echo " ";
    echo $row["lastname"];
    echo '<input type="radio" name="onum" checked value="';
    echo $row["onumber"];
    echo '">';
    $items[] = $row['onumber'];
    echo "<br>----------------------------<br>";
}
echo '<input type="submit" value="delete selected patient">';
echo '</form>';

echo '<form action="addassign.php" method="post">';
echo '<input type="submit" value="assign patient">';
echo '</form>';

?>
</div>
</body>
</html>