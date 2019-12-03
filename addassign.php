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
$lnum =$_SESSION['lnum'];
$findpatient = "SELECT firstname,lastname,ohipnumber FROM patient";
$patient = mysqli_query($connection,$findpatient);
echo '<form action="finallassign.php" method="post">';
if (!$patient) {
    die("databases query failed.");
}
echo "Select patient to assign for the doctor:<br><ol>";
while ($row = mysqli_fetch_assoc($patient)) {
    echo "first name: ".$row['firstname']." ";
    echo "last name: ".$row['lastname']." ";
    echo '<input type="radio" name="onum" checked value="';
    echo $row["ohipnumber"];
    echo '"><br>';
    echo "--------------------------<br>";
}
echo '<input type="submit">';
echo '</form>';
mysqli_free_result($patient);
echo "</ol>";
echo '<br>';
echo '<a href="index2.html">Back to main</a>';
?>
</div>
</body>
</html>