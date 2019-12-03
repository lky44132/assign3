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


$fname = $_GET['param1'];
$lname = $_GET['param2'];

$query = "SELECT firstname,lastname,licencenumber,licenseddate,specialty,doctor.hospitalcode AS hcode,hospitalname FROM doctor,hospital WHERE doctor.hospitalcode = hospital.hospitalcode";
$result = mysqli_query($connection,$query);

if (!$result) {
    die("databases query failed.");
}

while ($row = mysqli_fetch_assoc($result)) {
    if ($row['firstname']==$fname && $row['lastname']==$lname){
        echo "first name: ".$row['firstname']."<br>";
        echo "last name: ".$row['lastname']."<br>";
        echo "license number: ".$row['licencenumber']."<br>";
        echo "licensed date: ".$row['licenseddate']."<br>";
        echo "specialty: ".$row['specialty']."<br>";
        echo "hospital code: ".$row['hcode']."<br>";
        echo "work at: ".$row['hospitalname']."<br>";
    }
   

}

echo '<br>';
echo '<a href="index2.html">Back to main</a>';


?>

</div>
</body>
</html>
