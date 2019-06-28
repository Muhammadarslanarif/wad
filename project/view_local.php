<div class="row">
    <div class="col-sm-12">
        <h1>local tours</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">tour_id</th>
                <th scope="col">desert</th>
                <th scope="col">northern</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $get_local = "select * from local";
            $run_local = mysqli_query($con,$get_local);
            $count_local = mysqli_num_rows($run_local);
            if($count_local==0){
                echo "<h2> No Product found in selected criteria </h2>";
            }
            else {
                $i = 0;
                while ($row_local = mysqli_fetch_array($run_local)) {
                    $tour_id = $row_local['tour_id'];
                    $tour_desert = $row_local['desert'];
                    $tour_northern = $row_local['northern'];
                    ?>
                    <tr>
                        <th scope="row"><?php echo ++$i; ?></th>
                        <td><?php echo $tour_id; ?></td>
                        <td><?php echo $tour_desert; ?></td>
                        <td><?php echo $tour_northern; ?>/-</td>
                        <td><a href="index.php?edit_local=<?php echo $tour_id?>" class="btn btn-primary">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <a href="index.php?del_local=<?php echo $tour_id?>" class="btn btn-danger">
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