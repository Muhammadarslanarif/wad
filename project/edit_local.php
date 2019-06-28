<?php
if(!isset($_SESSION['user_email'])){
    header('location: login.php?not_admin=You are not Admin!');
}
if(isset($_GET['edit_local'])){
    $get_id = $_GET['edit_tour'];
    $get_tour = "select * from tours where tour_id='$get_id'";
    $run_tour = mysqli_query($con, $get_tour);
    $row_tour = mysqli_fetch_array($run_tour);

    $tour_id = $row_tour['tour_id'];
    $tour_international = $row_tour['International'];
    $tour_local = $row_tour['local'];


    $get_local = "select * from local where tour_id = '$tour_local'";
    $run_local = mysqli_query($con,$get_local);
    $row_local = mysqli_fetch_array($run_local);
    $tour_id = $row_local['tour_id'];
    $tour_local1 = $row_local['desert'];
    $tour_local2 = $row_local['northern'];
}

if(isset($_POST['update_local'])){
    //getting text data from the fields
    $tour_id = $_POST['tour_id'];
    $tour_local1 = $_POST['desert'];
    $tour_local2 = $_POST['northern'];

    //getting image from the field
    $local_image = $_FILES['local_image']['name'];
    $local_image_tmp = $_FILES['local_image']['tmp_name'];

    move_uploaded_file($local_image_tmp,"local_images/$local_image");

    $update_local = "update local set tour_local1 = '$tour_local1', 
                                        tour_id = '$tour_id' , 
                                        where tour_id='$tour_id'";

    $update_local = mysqli_query($con, $update_local);
    if($update_local){
        header("location: index.php?view_local");
    }
}
?>
<div class="row">
    <div class="offset-md-2 col-md-8">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <h2 class="offset-lg-3 offset-md-2 offset-1 "> Edit & Update local </h2>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-4 col-lg-3 d-none d-sm-block" for="tour_id">Tour Id</label>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" id="tour_id" name="tour_id" placeholder="Id"
                           value="<?php echo $tour_id;?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-4 col-lg-3 d-none d-sm-block" for="tour_local">Tour local</label>
                <div class="col-12 col-sm-8 col-lg-9">
                    <select name="tour_local" id="tour_local" required class="form-control">
                        <option><?php echo $tour_id;?></option>
                        <?php
                        $get_locals = "select * from local";
                        $run_locals = mysqli_query($con, $get_locals);
                        while ($row_locals= mysqli_fetch_array($run_locals)){
                            $tour_id = $row_locals['tour_id'];
                            $desert = $row_locals['desert'];
                            $northern = $row_locals['northern'];
                            echo "<option value='$tour_id'>'$desert'>$northern </option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="offset-sm-3 col-12 col-sm-6">
                    <input class="btn btn-block btn-primary btn-lg" type="submit" id="update_local" name="update_local"
                           value="Update local Tour Now">
                </div>
            </div>
        </form>
    </div>
</div>
