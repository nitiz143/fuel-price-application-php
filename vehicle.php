<?php
include("header.php"); 
if(!isset($_SESSION['user_id'])){
  header('Location: '.FRONT_URL);
  die();
}
$sql = "SELECT * FROM 005_fuelprices_vehicle where user_id = ".$_SESSION['user_id'];
$results = mysqli_query($conn, $sql);
$count = mysqli_num_rows($results);

$sql = "SELECT * FROM `005_fuelprices_users`";
$users = mysqli_query($conn, $sql);
?>
<section id="features" class="features" style="margin-top: 20px;padding-bottom: 0px !important;">
  <div class="container">
    <div class="row">
      <div class="mt-5 w-100 d-flex justify-content-between">
        <h1 class="pb-3" style="font-size:24px;">Vehicle List</h1>
        <a class="btn btn-primary" href="add_vehicle.php">Add Vehicle</a>
      </div>
      <div class="col-md-12 col-sm-12">
        <div class="x_panel">
          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive" style="min-height: 450px;">
                  <?php
                  $countermp = 0;
                  if($count > 0)
                  {
                    ?>
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Sl.</th>
                          <th>Photo</th>
                          <th>User</th>
                          <th>DOB</th>
                          <th>Address</th>
                          <th>Phone</th>
                          <th>Make</th>
                          <th>Model</th>
                          <th>Year</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        while($result = mysqli_fetch_assoc($results))
                        {
                          $countermp++;
                          // $status = [];
                          // while($row = mysqli_fetch_assoc($status_list)) {
                          //   if ($row['id'] == $result['id']) {
                          //     $status = $row;
                          //     break;
                          //   }
                          // }
                          ?>
                          <tr>
                            <td><?php echo $countermp; ?></td>
                            <td><img src="<?php echo ($result['photo'] != '') ? FRONT_URL.$result['photo'] : ''; ?>" width="100px" /></td>
                            <td><?php echo $result['user_id']; ?></td>
                            <td><?php echo $result['dob']; ?></td>
                            <td><?php echo $result['street_address']; ?></td>
                            <td><?php echo $result['phone1']; ?></td>
                            <td><?php echo $result['make']; ?></td>
                            <td><?php echo $result['model']; ?></td>
                            <td><?php echo $result['year']; ?></td>
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
                    echo '<p class="text-center">No vehicle to Display</p>';
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
</section>
<?php
include("footer.php"); 
?>