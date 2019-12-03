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
$date = $_POST['mydate'];
if (empty($date)){
    echo "fail to covert it to date";
}else{
    $query = "SELECT * FROM doctor where licenseddate<'$date'";
    $result = mysqli_query($connection,$query);

    if (!$result) {
        die("databases query failed.");
    }
    echo "<ol>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "first name: ".$row['firstname']."<br>";
        echo "last name: ".$row['lastname']."<br>";
        echo "specialty: ".$row['specialty']."<br>";
        echo "licensed date: ".$row['licenseddate']."<br>";
        echo "--------------------------<br>";
    }
    mysqli_free_result($result);
    echo "</ol>";
}

echo '<br>';
echo '<a href="index2.html">Back to main</a>';

?>
</div>
</body>
</html>
