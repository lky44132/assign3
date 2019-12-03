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

$query = "SELECT * FROM patient";
$result = mysqli_query($connection,$query);

if (!$result) {
    echo '</form>';    die("databases query failed.");
}
$pass = "0";
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['ohipnumber'] == $onum){
        echo "Patient first name: ".$row['firstname']." ";
        echo "last name: ".$row['lastname']."<br>";
        echo "--------------------------------------<br>";
        echo "Patient's doctor info: <br>";
        $pass = "1";
    }
}
mysqli_free_result($result);
if ($pass == "0"){
    echo "Error: the ohip number you enter does not exit.";

}else{

    $query2 = "SELECT * from doctor,treats where treats.ohipnumber =".$onum." AND doctor.licencenumber = treats.licencenumber";
    $result2 = mysqli_query($connection,$query2);
    if (!$result2) {
        die("databases query failed.");
    }
    while ($row = mysqli_fetch_assoc($result2)) {
        echo "Doctor first name: ".$row['firstname']." ";
        echo "last name: ".$row['lastname']."<br>";
        echo "--------------------------------------<br>";
    }

    mysqli_free_result($result2);
}
    echo '<br>';
    echo '<a href="index2.html">Back to main</a>';

?>
</div>
</body>
</html>