<div class="row">
    <div class="col-sm-12">
        <h1>Categories</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $get_cat = "select * from categories";
            $run_cat = mysqli_query($con,$get_cat);
            $count_cat = mysqli_num_rows($run_cat);
            if($count_cat==0){
                echo "<h2> No Product found in selected criteria </h2>";
            }
            else {
                $i = 0;
                while ($row_cat = mysqli_fetch_array($run_cat)) {
                    $cat_title = $row_cat['cat_title'];
                    ?>
                    <tr>
                        <th scope="row"><?php echo ++$i; ?></th>
                        <td><?php echo $cat_title; ?></td>
                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>