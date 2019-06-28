<div class="row">
    <div class="col-sm-12">
        <h1>tours</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">tour_id</th>
                <th scope="col">country_name</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $get_international = "select * from international";
            $run_international = mysqli_query($con,$get_international);
            $count_international = mysqli_num_rows($run_international);
            if($count_international==0){
                echo "<h2> No tour found in selected criteria </h2>";
            }
            else {
                $i = 0;
                while ($row_international = mysqli_fetch_array($run_international)) {
                    $tour_id = $row_international['tour_id'];
                    $tour_country_name = $row_international['country_name'];
                    ?>
                    <tr>
                        <th scope="row"><?php echo ++$i; ?></th>
                        <td><?php echo $tour_id; ?></td>
                        <td><?php echo $tour_country_name; ?>/-</td>
                        <td><a href="index.php?edit_international=<?php echo $tour_id?>" class="btn btn-primary">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <a href="index.php?del_international=<?php echo $tour_id?>" class="btn btn-danger">
                                <i class="fa fa-trash-alt"></i> Delete
                            </a>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>