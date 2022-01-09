<?php 
include 'config.php';
 session_start();


$insulin_id = $_GET["id"];

$sql = "DELETE FROM insulin WHERE insulin_id = '$insulin_id'";
$result = mysqli_query($conn, $sql);

if ($result){
    header("Location: insulin.php");
}
else{
    echo "<p>Unable to delete element.</p>";
}


?>