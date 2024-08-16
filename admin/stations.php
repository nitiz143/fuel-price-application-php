<?php 
include('header.php');

$sqlquery = "SELECT * FROM `005_fuelprices_stations`";
$results = mysqli_query($conn, $sqlquery);
$resultcount = mysqli_num_rows($results);

$sql = "SELECT * FROM `005_fuelprices_users`";
$user_list = mysqli_query($conn, $sql);
$users = [];
while($row = mysqli_fetch_assoc($user_list)) {
    $users[] = $row;
}
?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Station List</h3>
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
                                    if($resultcount > 0){
                                        ?>
                                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Sl.</th>
                                                    <th>Station Name</th>
                                                    <th>Station Manager</th>
                                                    <th>Station Phone</th>
                                                    <th>Address</th>
                                                    <th>Opening Time</th>
                                                    <th>Closing Time</th>
                                                    <th>Comments</th>
                                                    <th>Latitude</th>
                                                    <th>Longitude</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while($result = mysqli_fetch_assoc($results))
                                                {
                                                    $countermp++;
                                                    $address = $result['street_address'].' '.$result['street_address_2'].' '.$result['city'].' '.$result['state'].' '.$result['zipcode'].' '.$result['country'];
                                                    $user_array = [];
                                                    $key = array_search($result['station_manager'], array_column($users, 'user_id'));
                                                    if($key !== null){
                                                        $user_array = $users[$key];
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $countermp; ?></td>
                                                        <td><?php echo $result['station_name']; ?></td>
                                                        <td><?php echo $user_array['first_name'].' '.$user_array['last_name']; ?></td>
                                                        <td><?php echo $result['station_phone']; ?></td>
                                                        <td><?php echo $address; ?></td>
                                                        <td><?php echo $result['opening_time']; ?></td>
                                                        <td><?php echo $result['closing_time']; ?></td>
                                                        <td><?php echo $result['comments']; ?></td>
                                                        <td><?php echo $result['latitude']; ?></td>
                                                        <td><?php echo $result['longitude']; ?></td>
                                                        <td>
                                                            <?php echo ($result['status'] == 1) ? '<span class="badge badge-primary">Approved</span>' : '<span class="badge badge-warning">Rejected</span>'; ?>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" data-toggle="modal" data-target=".bs-example-modal-lg<?php echo $result['id']; ?>">
                                                                <i class="fa fa-eye" aria-hidden="true" style="color:green"></i>
                                                            </a>
                                                            <a href="subfunctions/deletestation.php?id=<?php echo $result['id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');">
                                                                <i class="fa fa-window-close" aria-hidden="true" style="color:red"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade bs-example-modal-lg<?php echo $result['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl">
                                                            <div class="modal-content">
                                                
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel">Station Detail</h4>
                                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row mb-4">
                                                                        <div class="col-lg-3">
                                                                            <h4>SI: <?php echo $countermp; ?></h4>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-4">
                                                                        <div class="col-lg-4">
                                                                            <h4>Station Name: <?php echo $result['station_name']; ?></h4>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <h4>Station Manager: <?php echo $user_array['first_name'].' '.$user_array['last_name']; ?></h4>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <h4>Station Phone: <?php echo $result['station_phone']; ?></h4>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-4">
                                                                        <div class="col-lg-6">
                                                                            <h4>Opening Time: <?php echo $result['opening_time']; ?></h4>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <h4>Closing Time: <?php echo $result['closing_time']; ?></h4>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-4">
                                                                        <div class="col-lg-12">
                                                                            <h4>Comments: <?php echo $result['comments']; ?></h4>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-4">
                                                                        <div class="col-lg-6">
                                                                            <h4>Latitude: <?php echo $result['latitude']; ?></h4>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <h4>Longitude: <?php echo $result['longitude']; ?></h4>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <h4>Status: <?php echo ($result['status'] == 1) ? '<span class="badge badge-primary">Approved</span>' : '<span class="badge badge-warning">Rejected</span>'; ?></h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                    <!-- <a href="" class="btn btn-info">Edit</a> -->
                                                                    <button type="button" class="btn btn-primary" onclick="approve(<?php echo $result['id']; ?>)">Approve</button>
                                                                    <button type="button" class="btn btn-warning" onclick="reject(<?php echo $result['id']; ?>)">Reject</button>
                                                                </div>
                                                
                                                            </div>
                                                        </div>
                                                    </div>
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
<script>
  function approve(id) {
    $.ajax({
      url: 'stations.php',
      type: 'POST',
      data: { 
        station_id: id,
        type: 'approve_station' 
      },
      success: function(response) {
          location.reload();
      },
      error: function(jqXHR, textStatus, errorThrown) {
          alert('Error: ' + textStatus + ' - ' + errorThrown);
      }
    });
  }
  function reject(id) {
    $.ajax({
      url: 'stations.php',
      type: 'POST',
      data: { 
        station_id: id,
        type: 'reject_station' 
      },
      success: function(response) {
          location.reload();
      },
      error: function(jqXHR, textStatus, errorThrown) {
          alert('Error: ' + textStatus + ' - ' + errorThrown);
      }
    });
  }
</script>