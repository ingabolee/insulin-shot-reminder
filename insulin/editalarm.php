<?php

include 'config.php';


session_start();

$alarm_id = $_GET["id"];

$sql = "SELECT * FROM alarm WHERE alarm_id = '$alarm_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if(isset($_POST['submit'])){
    $alarm_name = $_POST['alarm_name'];
    $alarm_desc = $_POST['alarm_desc'];
    $alert_file_id = $_POST['alert_file_id'];
    $alert_insulin_id = $_POST['alert_insulin_id']; 

    $time_alarm_time = $_POST['time_alarm_time'];

    $sql = "UPDATE alarm SET alarm_name='$alarm_name',alarm_desc='$alarm_desc', alert_file_id='$alert_file_id', alert_insulin_id='$alert_insulin_id' WHERE alarm_id='$alarm_id'";
    $result = mysqli_query($conn, $sql);
    if ($result){
        $sql = "SELECT * FROM alarm WHERE alarm_name = '$alarm_name' AND alarm_desc = '$alarm_desc'AND alert_file_id = '$alert_file_id'AND alert_insulin_id = '$alert_insulin_id'";
        $rows = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($rows);
        $time_alarm_id = $row["alarm_id"];

        $sql = "SELECT * FROM alarm_times WHERE time_alarm_id = '$time_alarm_id'";
        $rows = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($rows);
        $time_id = $row["time_id"];

        $sql = "UPDATE alarm_times SET time_alarm_time='$time_alarm_time'";

        $result = mysqli_query($conn, $sql);
        if ($result){
            header ("Location: alarm.php");
        }        
    else {
        echo "eroor";
    }
}
}

?>
<!doctype html>
<html lang="en">

<!-- Mirrored from thememakker.com/templates/oreo/realestate/html/light/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Jul 2021 09:15:10 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="RealEstate Admin Dashboard template, UI kit, Bootstrap 4x">
<meta name="author" content="Thememakker">

<title>Insulin Reminder</title>
<link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->

<!-- Custom Css -->
<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/color_skins.css">
</head>
<body class="theme-green">

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Top Bar -->
<nav class="navbar p-l-5 p-r-5">
    <ul class="nav navbar-nav navbar-left">
        <li>
             <h1 style="font-family:courier,arial,helvetica;">
                <strong style="color:white;">Insulin Shot Reminder</strong>
            </h1>
        </li>
    </ul>
</nav>

<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    
    <div class="tab-content">
        <div class="tab-pane stretchRight active" id="dashboard">
            <div class="menu">
                <ul class="list">
                    
                    <li class="active open"><a href="dashboard.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>                    
                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city"></i><span>Insulin</span></a>
                        <ul class="ml-menu">
                            <li><a href="addinsulin.php">Add Insulin</a></li>
                            <li><a href="insulin.php">View Insulin</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city"></i><span>Alarm</span></a>
                        <ul class="ml-menu">
                            <li><a href="addalarm.php">Add Alarm</a></li>
                            <li><a href="alarm.php">View Alarm</a></li>
                        </ul>
                    </li>
                    
                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city"></i><span>Audio</span></a>
                        <ul class="ml-menu">
                            <li><a href="addaudio.php">Add Audio File</a></li>
                            <li><a href="audio.php">View Audio Files</a></li>
                        </ul>
                    </li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </div>
        </div>
        
    </div>    
</aside>

<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>Edit Alarm
                </h2>
            </div>            
            
        </div>
    </div>
    <div class="container-fluid">
    <form class="form" method="POST">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <div class="row clearfix">
                        <div class="col-lg-5 col-md-5 col-sm-12">
                            <h2>Edit Alarm
                            </h2>
                        </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Alarm Name" name="alarm_name" value="<?php echo $row['alarm_name'];?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <textarea name="alarm_desc" id="description" cols="30" rows="5" class="form-control" placeholder="Alarm Description" value="<?php echo $row['alarm_desc'];?>"></textarea>
                                </div>
                            </div>
                            <?php
                            $sql = "SELECT * FROM audio_files";

                            $rows = mysqli_query($conn, $sql);
                            ?>
                            <br>
                            <div class="input-group">
                                <div class="list-group">
                                    <h5><strong>Choose Audio File</strong></h5>
                                        <?php   while($row = mysqli_fetch_assoc($rows)):?>
                                            <li class="list-group-item">
                                                <input class="form-check-input" type="radio" id="<?php echo $row['file_id']; ?>" name="alert_file_id" value="<?php echo $row['file_id']; ?>">
                                                <label class="form-check-label" for="<?php echo $row['file_id']; ?>"><?php echo $row['file_name']; ?></label>
                                            </li>
                                        <?php  endwhile; ?>
                                        </div>    
                            </div>
                            <?php
                            $sql = "SELECT * FROM insulin";

                            $rows = mysqli_query($conn, $sql);
                            ?>
                            <br>
                            <div class="input-group">
                                <div class="list-group">
                                    <h5><strong>Select Insulin</strong></h5>
                                        <?php   while($row = mysqli_fetch_assoc($rows)):?>
                                            <li class="list-group-item">
                                                <input class="form-check-input" type="radio" id="<?php echo $row['insulin_id']; ?>" name="alert_insulin_id" value="<?php echo $row['insulin_id']; ?>">
                                                <label class="form-check-label" for="<?php echo $row['insulin_id']; ?>"><?php echo $row['insulin_name']; ?></label>
                                            </li>
                                        <?php  endwhile; ?>
                                </div>    
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Alarm Time</label>
                                    <input type="time" class="form-control" placeholder="Alarm Time" name="time_alarm_time" value="<?php echo $row['time_alarm_time'];?>">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                    <button type="submit" name="submit" class="btn btn-primary btn-round">Edit Alarm</button>
                                    <a href="alarm.php" class="btn btn-warning btn-round ">Cancel</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</section>                        








<!-- Right Sidebar -->
<style>
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: cyan;
   color: black;
   text-align: center;
}
</style>
<div class="footer">
  <strong>2021. All Rights Reserved</strong>
</div>

<script src="https://thememakker.com/templates/oreo/realestate/html/light/assets/bundles/libscripts.bundle.js"></script>
<script src="https://thememakker.com/templates/oreo/realestate/html/light/assets/bundles/vendorscripts.bundle.js"></script>

<script src="https://thememakker.com/templates/oreo/realestate/html/light/assets/bundles/c3.bundle.js"></script>
<script src="https://thememakker.com/templates/oreo/realestate/html/light/assets/bundles/jvectormap.bundle.js"></script>
<script src="https://thememakker.com/templates/oreo/realestate/html/light/assets/bundles/knob.bundle.js"></script>

<script src="https://thememakker.com/templates/oreo/realestate/html/light/assets/bundles/mainscripts.bundle.js"></script>
<script src="https://thememakker.com/templates/oreo/realestate/html/light/assets/js/pages/index.js"></script>
</body>


<!-- Mirrored from thememakker.com/templates/oreo/realestate/html/light/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Jul 2021 09:36:38 GMT -->
</html>