<?php 
include 'config.php';
 session_start();


$alarm_id = $_GET["id"];

$sql = "DELETE FROM alarm WHERE alarm_id = '$alarm_id'";
$result = mysqli_query($conn, $sql);

if ($result){
    header("Location: alarm.php");
}
else{
    echo "<p>Unable to delete element.</p>";
}


?>