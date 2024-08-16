<?php 
include('header.php');

$sql = "SELECT * FROM `005_fuelprices_users`";
$results = mysqli_query($conn, $sql);
$count = mysqli_num_rows($results);

$sql = "SELECT * FROM `005_fuelprices_user_title`";
$user_titles = mysqli_query($conn, $sql);
$titles = [];
while($row = mysqli_fetch_assoc($user_titles)) {
    $titles[] = $row;
}

$sql = "SELECT * FROM `005_fuelprices_user_role`";
$user_roles = mysqli_query($conn, $sql);
$roles = [];
while($row1 = mysqli_fetch_assoc($user_roles)) {
    $roles[] = $row1;
}
?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Users List</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                 
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <?php
                                    $countermp = 0;
                                    if($count > 0)
                                    {
                                        ?>
                                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Sl.</th>
                                                    <!-- <th>Photo</th> -->
                                                    <th>Name</th>
                                                    <th>Role</th>
                                                    <!-- <th>DOB</th> -->
                                                    <!-- <th>Address</th>
                                                    <th>Phone</th> -->
                                                    <th>Email</th>
                                                    <!-- <th>Make</th>
                                                    <th>Model</th>
                                                    <th>Year</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while($result = mysqli_fetch_assoc($results))
                                                { 
                                                    $countermp++;
                                                    $title_array = [];
                                                    $key = array_search($result['title_id'], array_column($titles, 'id'));
                                                    if($key !== null){
                                                        $title_array = $titles[$key];
                                                    }
                                                    $role_array = [];
                                                    $key = array_search($result['role_id'], array_column($roles, 'role_id'));
                                                    if($key !== null){
                                                        $role_array = $roles[$key];
                                                    }
                                                    $full_name = $title_array['title'].' '.$result['first_name'].' '.$result['middle_name'].' '.$result['last_name'];
                                                    $address = $result['street_address'].' '.$result['street_address2'].' '.$result['city'].' '.$result['state'].' '.$result['zip'].' '.$result['country'];
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $countermp; ?></td>
                                                        <!-- <td><?php echo $result['photo']; ?></td> -->
                                                        <td><?php echo $full_name; ?></td>
                                                        <td><?php echo $role_array['role']; ?></td>
                                                        <!-- <td><?php echo $result['dob']; ?></td> -->
                                                        <!-- <td><?php echo $address; ?></td>
                                                        <td><?php echo $result['phone1']; ?> <?php echo $result['phone2']; ?></td> -->
                                                        <td><?php echo $result['email']; ?></td>
                                                        <!-- <td><?php echo $result['make']; ?></td>
                                                        <td><?php echo $result['model']; ?></td>
                                                        <td><?php echo $result['year']; ?></td> -->
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <?php
                                    }
                                    else
                                    {
                                        echo '<p>No Items to Display</p>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </div>
</div>
<!-- /page content -->
<?php
include('footer.php');
?>