<?php 
include('header.php');

$sqluserprice = "SELECT * FROM `005_fuelprices_user_price` ORDER BY serial_number DESC";
$resuserprices = mysqli_query($conn,$sqluserprice);
$countuserprice = mysqli_num_rows($resuserprices);

$sql = "SELECT * FROM `005_fuelprices_users`";
$user_list = mysqli_query($conn, $sql);
$users = [];
while($row = mysqli_fetch_assoc($user_list)) {
    $users[] = $row;
}
$sql = "SELECT * FROM `005_fuelprices_stations`";
$station_list = mysqli_query($conn, $sql);
$stations = [];
while($row = mysqli_fetch_assoc($station_list)) {
    $stations[] = $row;
}
?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Prices List</h3>
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
                                    /*$countermp=0;
                                    if($countuserprice>0)
                                    {
                                        ?>
                                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Sl.</th>
                                                    <th>Name</th>
                                                    <th>Address</th>
                                                    <th>Phone</th>
                                                    <th>Before 6am Price</th>
                                                    <th>After 6am Price</th>
                                                    <th>Latitude</th>
                                                    <th>Longitude</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while($rowprices=mysqli_fetch_assoc($resuserprices))
                                                {
                                                    $countermp++;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $countermp; ?></td>
                                                        <td><?php echo $rowprices['name']; ?></td>
                                                        <td><?php echo $rowprices['address']; ?></td>
                                                        <td><?php echo $rowprices['phonenumber']; ?></td>
                                                        <td><?php echo $rowprices['before6amprice']; ?></td>
                                                        <td><?php echo $rowprices['after6amprice']; ?></td>
                                                        <td><?php echo $rowprices['latitude']; ?></td>
                                                        <td><?php echo $rowprices['longitude']; ?></td>
                                                        <td>
                                                            <?php 
                                                            if($rowprices['status']){
                                                                ?>
                                                                Approved
                                                                <?php 
                                                            }else{ ?>
                                                                <a href="#" class="approve btn btn-secondary" data-id="<?php echo $rowprices['id']; ?>">Approve</a>
                                                                <?php 
                                                            } ?>
                                                        </td>
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
                                    }*/

                                    $countermp = 0;
                                    if($countuserprice > 0){
                                        ?>
                                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Sl.</th>
                                                    <th>Entry Date</th>
                                                    <th>Entry Time</th>
                                                    <th>Purchase Date</th>
                                                    <th>Purchase Date</th>
                                                    <th>Littres</th>
                                                    <th>Amount</th>
                                                    <th>Phone</th>
                                                    <th>User</th>
                                                    <th>Station</th>
                                                    <th>Latitude</th>
                                                    <th>Longitude</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while($rowprices = mysqli_fetch_assoc($resuserprices))
                                                {
                                                    $countermp++;
                                                    $user_array = [];
                                                    $key = array_search($rowprices['user_id'], array_column($users, 'user_id'));
                                                    if($key !== false){
                                                        $user_array = $users[$key];
                                                    }
                                                    $station_array = [];
                                                    $key = array_search($rowprices['station_id'], array_column($stations, 'id'));
                                                    if($key !== false){
                                                        $station_array = $stations[$key];
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $countermp; ?></td>
                                                        <td><?php echo date("d, F Y", strtotime($rowprices['entry_date'])); ?></td>
                                                        <td><?php echo date("h:i A", strtotime($rowprices['entry_time'])); ?></td>
                                                        <td><?php echo date("d, F Y", strtotime($rowprices['purchase_date'])); ?></td>
                                                        <td><?php echo date("h:i A", strtotime($rowprices['purchase_time'])); ?></td>
                                                        <td><?php echo $rowprices['litres']; ?></td>
                                                        <td><?php echo $rowprices['amount']; ?></td>
                                                        <td><?php echo $rowprices['phone_number']; ?></td>
                                                        <td><?php echo (!empty($user_array)) ? $user_array['first_name'].' '.$user_array['last_name'] : ''; ?></td>
                                                        <td><?php echo (!empty($station_array)) ? $station_array['station_name'] : ""; ?></td>
                                                        <td><?php echo $rowprices['latitude']; ?></td>
                                                        <td><?php echo $rowprices['longitude']; ?></td>
                                                        <td>
                                                        <?php 
                                                            echo ($rowprices['status'] == 1) 
                                                                ? '<span class="badge badge-primary">Approved</span>' 
                                                                : (($rowprices['status'] == 0) 
                                                                    ? '<span class="badge badge-warning">Rejected</span>' 
                                                                    : '<span class="badge badge-info">Under Review</span>');
                                                        ?>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" data-toggle="modal" data-target=".bs-example-modal-lg<?php echo $rowprices['serial_number']; ?>">
                                                                <i class="fa fa-eye" aria-hidden="true" style="color:green"></i>
                                                            </a>
                                                            <a href="subfunctions/deleteuserprice.php?id=<?php echo $rowprices['serial_number']; ?>" onclick="return confirm('Are you sure you want to delete this item?');">
                                                                <i class="fa fa-window-close" aria-hidden="true" style="color:red"></i>
                                                            </a>
                                                        </td>
                                                        <!-- <td>
                                                            <?php 
                                                            if($rowprices['status']){
                                                                ?>
                                                                Approved
                                                                <?php 
                                                            }else{ ?>
                                                                <a href="#" class="approve btn btn-secondary" data-id="<?php echo $rowprices['id']; ?>">Approve</a>
                                                                <?php 
                                                            } ?>
                                                        </td> -->
                                                    </tr>
                                                    <div class="modal fade bs-example-modal-lg<?php echo $rowprices['serial_number']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl">
                                                            <div class="modal-content">
                                                
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel">User Price Detail</h4>
                                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row mb-4">
                                                                        <div class="col-lg-4">
                                                                            <h4>SI: <?php echo $countermp; ?></h4>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <h4>Entry Date: <?php echo date("d, F Y", strtotime($rowprices['entry_date'])); ?></h4>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <h4>Entry Time: <?php echo date("h:i A", strtotime($rowprices['entry_time'])); ?></h4>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-4">
                                                                        <div class="col-lg-6">
                                                                            <h4>Purchase Date: <?php echo date("d, F Y", strtotime($rowprices['purchase_date'])); ?></h4>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <h4>Purchase Time: <?php echo date("h:i A", strtotime($rowprices['purchase_time'])); ?></h4>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-4">
                                                                        <div class="col-lg-4">
                                                                            <h4>Littres: <?php echo $rowprices['litres']; ?></h4>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <h4>Amount: <?php echo $rowprices['amount']; ?></h4>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <h4>Phone: <?php echo $rowprices['phone_number']; ?></h4>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-4">
                                                                        <div class="col-lg-3">
                                                                            <h4>User: <?php echo (!empty($user_array)) ? $user_array['first_name'].' '.$user_array['last_name'] : ''; ?></h4>
                                                                        </div>
                                                                        <div class="col-lg-3">
                                                                            <h4>Station: <?php echo (!empty($station_array)) ? $station_array['station_name'] : ""; ?></h4>
                                                                        </div>
                                                                        <div class="col-lg-3">
                                                                            <h4>Latitude: <?php echo $rowprices['latitude']; ?></h4>
                                                                        </div>
                                                                        <div class="col-lg-3">
                                                                            <h4>Longitude: <?php echo $rowprices['longitude']; ?></h4>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <h4>Status: <?php echo ($rowprices['status'] == 1) ? '<span class="badge badge-primary">Approved</span>' : '<span class="badge badge-warning">Rejected</span>'; ?></h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                    <!-- <a href="" class="btn btn-info">Edit</a> -->
                                                                    <button type="button" class="btn btn-primary" onclick="approve(<?php echo $rowprices['serial_number']; ?>)">Approve</button>
                                                                    <button type="button" class="btn btn-warning" onclick="reject(<?php echo $rowprices['serial_number']; ?>)">Reject</button>
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

<script>
$(document).ready(function() {
    $('.approve').on('click', function(event) {
        event.preventDefault(); // Prevent the default link behavior
        if (confirm('Are you sure you want to approve this price?')) {
            const recordId = $(this).data('id'); // Get the record ID from the data-id attribute

            $.ajax({
                url: 'functions.php', // The URL to the PHP file that will handle the update
                type: 'POST',
                data: { id: recordId, status: 1, type: 'approve price' }, // Data to be sent to the server
                success: function(response) {
                    // Handle the response from the server
                    alert(response);
                    location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Handle any errors
                    alert('Error: ' + textStatus + ' - ' + errorThrown);
                }
            });
        }
    });
});
</script>
<?php
include('footer.php');
?>
<script>
  function approve(id) {
    $.ajax({
      url: 'prices.php',
      type: 'POST',
      data: { 
        userprice_id: id,
        type: 'approve_userprice' 
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
      url: 'prices.php',
      type: 'POST',
      data: { 
        userprice_id: id,
        type: 'reject_userprice' 
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