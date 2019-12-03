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

$query = "SELECT * FROM doctor,treats where treats.licencenumber = doctor.licencenumber";
$result = mysqli_query($connection,$query);
if (!$result) {
    die("databases query failed.");
}
$pass = "0";
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['licencenumber']==$lnum){
        $pass = "1";
        
    }
}
if ($pass == "0"){
    $sql = "DELETE FROM doctor WHERE licencenumber='".$lnum."'";
    if (mysqli_query($connection, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($connection);
    }
    echo '<a href="index2.html">Back to main</a>';

}else{
    echo "This doctor is treating patients, are you sure to delete the doctor";
    echo '<form action="finalldelete.php" method="post">';
    echo 'No<input type="radio" name="choice" checked value="NO"><br>';
    echo 'Yes<input type="radio" name="choice" checked value='.$lnum.'><br>';
    echo '<input type="submit">';
    echo '</form>';
}

?>
</div>
</body>
</html>