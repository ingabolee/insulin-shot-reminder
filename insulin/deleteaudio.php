<?php 
include 'config.php';
 session_start();


$audio_id = $_GET["id"];

$sql = "DELETE FROM audio_files WHERE file_id = '$audio_id'";
$result = mysqli_query($conn, $sql);

if ($result){
    header("Location: audio.php");
}
else{
    echo "<p>Unable to delete element.</p>";
}


?>