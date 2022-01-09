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
<link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/plugins/charts-c3/plugin.css" />
<link rel="stylesheet" href="../assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css"/>
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
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Personal Information
                </h2>
            </div>
            
        </div>
    </div>
    <div class="container-fluid">
        <!-- Basic Examples -->
    
        <!-- #END# Basic Examples --> 
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                   
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover dataTable">
                        <thead>                     
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Contact</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Contact</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                <tr>
                                <?php 
                                $name = $_SESSION['username'];
                                $sql = "SELECT * FROM login WHERE login_user_name = '$name'";
                                $rows = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($rows);
                                $login_id = $row["login_id"];

                                $sql = "SELECT * FROM user WHERE user_login_id = '$login_id'";
                                $rows = mysqli_query($conn, $sql);
                                ?>
                                <?php   while($row = mysqli_fetch_assoc($rows)):?>
                                    <td><?php echo $row["user_full_name"]?></td>
                                    <td><?php echo $row["user_contact"]?></td>
                                </tr>
                                <?php  endwhile; ?>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table --> 
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

<?php
?>