<?php
if(!isset($_SESSION['user_email'])){
    header('location: login.php?not_admin=You are not Admin!');
}
if(isset($_GET['del_tour'])){
    $del_id = $_GET['del_tour'];
    $del_tour = "delete from tours where tour_id='$del_id'";
    $run_del = mysqli_query($con,$del_tour);
    if($run_del){
        header('location: index.php?view_tour');
    }
}