<?php
if(!isset($_SESSION['user_email'])){
    header('location: login.php?not_admin=You are not Admin!');
}
if(isset($_GET['del_international'])){
    $del_id = $_GET['del_international'];
    $del_international = "delete from international where tour_id='$del_id'";
    $run_del = mysqli_query($con,$del_international);
    if($run_del){
        header('location: index.php?view_international');
    }
}