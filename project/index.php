<?php
session_start();
if(!isset($_SESSION['user_email'])){
    header('location: login.php?not_admin=You are not Admin!');
}
require_once "db_connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bangers|Old+Standard+TT">
    <title>Travelling & Touring App Admin Panel</title>
    <style>
        * {
            font-family: 'Old Standard TT', serif;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3><img src="../media/logo.png"> Admin Panel</h3>
        </div>
        <ul class="list-unstyled components">
            <li>
                <a href="index.php?insert_tour">
                    <i class="fas fa-plus"></i> Insert New Tour
                </a>
            </li>
            <li>
                <a href="index.php?view_tour">
                    <i class="fas fa-sitemap"></i> View All Tours
                </a>
            </li>
            <li>
                <a href="index.php?insert_international">
                    <i class="fas fa-plus"></i> Insert New Tour
                </a>
            </li>
            <li>
                <a href="index.php?view_international">
                    <i class="fas fa-band-aid"></i> View All Tours
                </a>
            </li>
            <li>
                <a href="index.php?insert_local">
                    <i class="fas fa-plus"></i> Insert New Tour
                </a>
            </li>
            <li>
                <a href="index.php?view_local">
                    <i class="fas fa-toolbox"></i> View All Brands</a>
            </li>
            <li>
                <a href="logout.php">
                    <i class="fa fa-sign-out-alt"></i> Admin logout</a>
            </li>
        </ul>
    </nav>
    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </nav>
        <div class="container">
            <h2 class="text-center text-primary"><?php echo @$_GET['logged_in']?></h2>
            <?php
            if(isset($_GET['insert_tour'])){
                include ('insert_tour.php');
            }
            else if(isset($_GET['view_tour'])){
                include ('view_tour.php');
            }
            else if(isset($_GET['edit_tour'])){
                include ('edit_tour.php');
            }
            else if(isset($_GET['del_tour'])){
                include ('del_tour.php');
            }
            else if(isset($_GET['view_international'])){
                include ('view_international.php');
            }
            else if(isset($_GET['insert_international'])){
                include ('insert_international.php');
            }
            else if(isset($_GET['edit_international'])){
                include ('edit_international.php');
            }
            else if(isset($_GET['del_international'])){
                include ('del_international.php');
            }
            else if(isset($_GET['view_local'])) {
                include('view_local.php');
            }
            else if(isset($_GET['insert_local'])) {
                include('insert_local.php');
            }
            else if(isset($_GET['edit_local'])) {
                include('edit_local.php');
            }
            else if(isset($_GET['del_local'])) {
                include('del_local.php');
            }
            ?>
        </div>
    </div>
</div>
<script src="../js/jquery-3.3.1.js"></script>
<script src="../js/bootstrap.bundle.js"></script>
<script>
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });

    });
</script>
</body>
</html>