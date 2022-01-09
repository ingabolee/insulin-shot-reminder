<?php

include 'config.php';


session_start();



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
                <h2>Add Audio File
                </h2>
            </div>            
            
        </div>
    </div>
    <div class="container-fluid">
    <form class="form" method="POST" action="upload.php" enctype="multipart/form-data">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <div class="row clearfix">
                        <div class="col-lg-5 col-md-5 col-sm-12">
                            <h2>Add Audio File 
                            </h2>
                        </div>
                        <small><h6>(mp3 files only)</h6></small>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="file" class="form-control" placeholder="Audio File" name="file_name" id="file_name">
                                </div>
                            </div>
                            
                            
                            <div class="col-sm-12">
                                <button type="submit" name="submit" class="btn btn-primary btn-round">Add Audio File</button>
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