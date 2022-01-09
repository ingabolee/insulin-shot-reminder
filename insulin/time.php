<?php
include 'config.php';

$audio_path = "";
$time_alarm_time = "";

$sql = "SELECT * FROM alarm_times";
$rows = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($rows)){
    $time_alarm_time = $row["time_alarm_time"];
}   

$sql = "SELECT * FROM audio_files";
$rows = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($rows)){
    $audio_path = $row["file_audio_file"];
}


?>