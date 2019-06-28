<div class="row">
    <div class="col-sm-12">
        <h1>tours</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">tour_id</th>
                <th scope="col">International</th>
                <th scope="col">local</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $get_tour = "select * from tours";
            $run_tour = mysqli_query($con,$get_tour);
            $count_tour = mysqli_num_rows($run_tour);
            if($count_tour==0){
                echo "<h2> No Product found in selected criteria </h2>";
            }
            else {
                $i = 0;
                while ($row_tour = mysqli_fetch_array($run_tour)) {
                    $tour_id = $row_tour['tour_id'];
                    $tour_International = $row_tour['International'];
                    $tour_local = $row_tour['local'];
                    ?>
                    <tr>
                        <th scope="row"><?php echo ++$i; ?></th>
                        <td><?php echo $tour_id; ?></td>
                        <td><?php echo $tour_local; ?></td>
                        <td><?php echo $tour_International; ?>/-</td>
                        <td><a href="index.php?edit_tour=<?php echo $tour_id?>" class="btn btn-primary">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <a href="index.php?del_tour=<?php echo $tour_id?>" class="btn btn-danger">
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