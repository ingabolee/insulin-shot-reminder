<?php

include 'config.php';


 session_start();


if(isset($_POST['submit'])){
    $insulin_name = $_POST['insulin_name'];
    $insulin_desc = $_POST['insulin_desc'];
    $insulin_purchase_date = $_POST['insulin_purchase_date'];
    $insulin_injection_start_date = $_POST['insulin_injection_start_date'];
    $insulin_injection_end_date = $_POST['insulin_injection_end_date'];
    $units_amount = $_POST['units_amount'];
    $units_dosage_desc = $_POST['units_dosage_desc'];

    $name = $_SESSION['username'];
    $sql = "SELECT * FROM login WHERE login_user_name = '$name'";
    $rows = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($rows);
    $login_id = $row["login_id"];
    $sql = "SELECT * FROM user WHERE user_login_id = '$login_id'";
    $rows = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($rows);
    $user_id = $row["user_id"];

    $sql = "INSERT INTO insulin (insulin_name, insulin_desc, insulin_purchase_date, insulin_injection_start_date, insulin_injection_end_date, insulin_user_id) 
                VALUES ('$insulin_name', '$insulin_desc', '$insulin_purchase_date', '$insulin_injection_start_date', '$insulin_injection_end_date', '$user_id')";

    $result = mysqli_query($conn, $sql);
    if ($result){
        $sql = "SELECT * FROM insulin WHERE insulin_name = '$insulin_name' AND insulin_desc = '$insulin_desc'AND insulin_purchase_date = '$insulin_purchase_date'AND insulin_injection_start_date = '$insulin_injection_start_date'AND insulin_injection_end_date = '$insulin_injection_end_date'";
        $rows = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($rows);
        $insulin_id = $row["insulin_id"];

        $sql = "INSERT INTO units (units_amount, units_dosage_desc, units_insulin_id) 
                VALUES ('$units_amount', '$units_dosage_desc', '$insulin_id')";
        $result = mysqli_query($conn, $sql);
        if ($result){
            header ("Location: insulin.php");
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
                <h2>Add Insulin
                </h2>
            </div>            
            
        </div>
    </div>
    <div class="container-fluid">
    <form class="form" method="POST" action="#">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <div class="row clearfix">
                        <div class="col-lg-5 col-md-5 col-sm-12">
                            <h2>Add Insulin
                            </h2>
                        </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Insulin Name" name="insulin_name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <textarea name="insulin_desc" id="description" cols="30" rows="5" class="form-control" placeholder="Insulin Description"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Purchase Date</label>
                                    <input type="date" class="form-control" placeholder="Purchase Date" name="insulin_purchase_date">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Injection Start Date</label>
                                    <input type="date" class="form-control" placeholder="Injection Start Date" name="insulin_injection_start_date">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Injection End Date</label>
                                    <input type="date" class="form-control" placeholder="Injection End Date" name="insulin_injection_end_date">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Units Amount" name="units_amount">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <textarea name="units_dosage_desc" id="description" cols="30" rows="5" class="form-control" placeholder="Units Dosage Description"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                    <button type="submit" name="submit" class="btn btn-primary btn-round">Add Insulin</button>
                                    <a href="dashboard.php" class="btn btn-warning btn-round ">Cancel</a>
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