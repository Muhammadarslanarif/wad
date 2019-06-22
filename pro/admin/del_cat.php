<?php
if(isset($_GET['del_cat'])){
    $del_id = $_GET['del_cat'];
    $del_title = "delete from categories where cat_title='$del_title'";
    $run_del = mysqli_query($con,$del_cat);
    if($run_del){
        header('location: index.php?view_categories');
    }
}