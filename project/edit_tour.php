<?php
if(!isset($_SESSION['user_email'])){
    header('location: login.php?not_admin=You are not Admin!');
}
if(isset($_GET['edit_tour'])){
    $get_id = $_GET['edit_tour'];
    $get_tour = "select * from tours where tour_id='$get_id'";
    $run_tour = mysqli_query($con, $get_tour);
    $row_tour = mysqli_fetch_array($run_tour);

    $tour_id = $row_tour['tour_id'];
    $tour_international = $row_tour['International'];
    $tour_local = $row_tour['local'];
/*    $pro_brand = $row_pro['pro_brand'];
    $pro_title = $row_pro['pro_title'];
    $pro_price = $row_pro['pro_price'];
    $pro_image = $row_pro['pro_image'];
    $pro_desc = $row_pro['pro_desc'];
    $pro_keywords = $row_pro['pro_keywords'];*/

    $get_international = "select * from international where cat_id = '$tour_international'";
    $run_international = mysqli_query($con,$get_international);
    $row_international = mysqli_fetch_array($run_international);
    $tour_id = $row_international['tour_id'];

    $get_local = "select * from local where tour_id = '$tour_local'";
    $run_local = mysqli_query($con,$get_local);
    $row_local = mysqli_fetch_array($run_local);
    $tour_id = $row_local['tour_id'];
}
if(isset($_POST['update_tour'])){
    //getting text data from the fields
    $tour_id = $_POST['tour_id'];
    $tour_international = $_POST['International'];
    $tour_local = $_POST['local'];

    //getting image from the field
    $tour_image = $_FILES['tour_image']['name'];
    $tour_image_tmp = $_FILES['tour_image']['tmp_name'];

    move_uploaded_file($tour_image_tmp,"tour_images/$tour_image");

    $update_tour = "update tours set tour_international = '$tour_international', 
                                        tour_local = '$tour_local',
                                        tour_id = '$tour_id' , 
                                        where tour_id='$tour_id'";

    $update_tour = mysqli_query($con, $update_tour);
    if($update_tour){
        header("location: index.php?view_tour");
    }
}
?>
<div class="row">
    <div class="offset-md-2 col-md-8">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <h2 class="offset-lg-3 offset-md-2 offset-1 "> Edit & Update Tour </h2>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-4 col-lg-3 d-none d-sm-block" for="pro_title">Tour Id</label>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" id="tour_id" name="tour_id" placeholder="Id"
                           value="<?php echo $tour_id;?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-4 col-lg-3 d-none d-sm-block" for="tour_international">Tour International</label>
                <div class="col-12 col-sm-8 col-lg-9">
                    <select name="tour_international" id="tour_international" required class="form-control">
                        <option><?php echo $tour_id;?></option>
                        <?php
                        $get_internationals = "select * from international";
                        $run_internationals = mysqli_query($con, $get_internationals);
                        while ($row_internationals= mysqli_fetch_array($run_internationals)){
                            $tour_id = $row_internationals['tour_id'];
                            $country_name = $row_internationals['country_name'];
                            echo "<option value='$cat_id'>$country_name </option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-4 col-lg-3  d-none d-sm-block" for="pro_brand">Tour Local</label>
                <div class="col-12 col-sm-8 col-lg-9">
                    <select name="tour_local" id="tour_local" required class="form-control">
                        <option><?php echo $tour_id;?></option>
                        <?php
                        $get_locals = "select * from local";
                        $run_locals = mysqli_query($con, $get_locals);
                        while ($row_locals= mysqli_fetch_array($run_locals)){
                            $local_id = $row_locals['tour_id'];
                            $local_desert = $row_locals['desert'];
                            $local_northern = $row_locals['northern'];
                            echo "<option value='$local_id'>$local_desert </option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="offset-sm-3 col-12 col-sm-6">
                    <input class="btn btn-block btn-primary btn-lg" type="submit" id="update_tour" name="update_tour"
                           value="Update Tour Now">
                </div>
            </div>
        </form>
    </div>
</div>
