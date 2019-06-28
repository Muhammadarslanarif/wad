<?php
if(!isset($_SESSION['user_email'])){
    header('location: login.php?not_admin=You are not Admin!');
}
if(isset($_GET['edit_international'])){
    $get_international = "select * from international where cat_id = '$tour_international'";
    $run_international = mysqli_query($con,$get_international);
    $row_international = mysqli_fetch_array($run_international);
    $tour_id = $row_international['tour_id'];
    $tour_international = $row_international['country_name'];

}
if(isset($_POST['update_international'])){
    //getting text data from the fields
    $tour_id = $_POST['tour_id'];
    $tour_international = $_POST['country_name'];

    //getting image from the field
    $international_image = $_FILES['international_image']['name'];
    $international_image_tmp = $_FILES['international_image']['tmp_name'];

    move_uploaded_file($international_image_tmp,"international_images/$international_image");

    $update_international = "update international set tour_international = '$tour_international', 
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
                <h2 class="offset-lg-3 offset-md-2 offset-1 "> Edit & Update international </h2>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-4 col-lg-3 d-none d-sm-block" for="tour_id">Tour Id</label>
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
                <div class="offset-sm-3 col-12 col-sm-6">
                    <input class="btn btn-block btn-primary btn-lg" type="submit" id="update_international" name="update_international"
                           value="Update international Tour Now">
                </div>
            </div>
        </form>
    </div>
</div>
