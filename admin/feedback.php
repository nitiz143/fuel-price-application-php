<?php 
include('header.php');

$sqlquery = "SELECT * FROM `005_fuelprices_feedback`";
$results = mysqli_query($conn, $sqlquery);
$resultcount = mysqli_num_rows($results);

$sql = "SELECT * FROM 005_fuelprices_stations";
$station_list = mysqli_query($conn, $sql);
$stations = [];
while($row = mysqli_fetch_assoc($station_list)) {
    $stations[] = $row;
}

$sql = "SELECT * FROM 005_fuelprices_users";
$user_list = mysqli_query($conn, $sql);
$users = [];
while($row = mysqli_fetch_assoc($user_list)) {
    $users[] = $row;
}

$sql = "SELECT * FROM 005_fuelprices_rating";
$rating_list = mysqli_query($conn, $sql);
$ratings = [];
while($row = mysqli_fetch_assoc($rating_list)) {
    $ratings[] = $row;
}
?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Feedback List</h3>
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
                                    $countermp=0;
                                    if($resultcount > 0){
                                        ?>
                                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Sl.</th>
                                                    <th>Station Name</th>
                                                    <th>User</th>
                                                    <th>Title</th>
                                                    <th>Comment</th>
                                                    <th>Rating</th>
                                                    <th>Attachment</th>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while($result = mysqli_fetch_assoc($results))
                                                {
                                                    $countermp++;
                                                    $user_array = [];
                                                    $key = array_search($result['user_id'], array_column($users, 'user_id'));
                                                    if($key !== null){
                                                        $user_array = $users[$key];
                                                    }
                                                    $station_array = [];
                                                    $key = array_search($result['station_id'], array_column($stations, 'id'));
                                                    if($key !== null){
                                                        $station_array = $stations[$key];
                                                    }
                                                    $rating_status = [];
                                                    $key = array_search($result['user_rating'], array_column($ratings, 'id'));
                                                    if($key !== null){
                                                        $rating_status = $ratings[$key];
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $countermp; ?></td>
                                                        <td><?php echo $station_array['station_name']; ?></td>
                                                        <td><?php echo $user_array['first_name'].' '.$user_array['last_name']; ?></td>
                                                        <td><?php echo $result['title']; ?></td>
                                                        <td><?php echo $result['comment']; ?></td>
                                                        <td><?php echo $rating_status['title']; ?></td>
                                                        <td><img src="<?php echo ($result['attachment'] != "") ? FRONT_URL.$result['attachment'] : ''; ?>" width="100px" /></td>
                                                        <td><?php echo DATE("d-m-Y", strtotime($result['created_date'])); ?></td>
                                                        <td><?php echo DATE("h:i:sa", strtotime($result['created_date'])); ?></td>
                                                        <td>
                                                            <?php echo ($result['status'] == 1) ? '<span class="badge badge-primary">Approved</span>' : '<span class="badge badge-warning">Rejected</span>'; ?>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" data-toggle="modal" data-target=".bs-example-modal-lg<?php echo $result['id']; ?>">
                                                                <i class="fa fa-eye" aria-hidden="true" style="color:green"></i>
                                                            </a>
                                                            <a href="subfunctions/deletefeedback.php?id=<?php echo $result['id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');">
                                                                <i class="fa fa-window-close" aria-hidden="true" style="color:red"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade bs-example-modal-lg<?php echo $result['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel">Feedback Detail</h4>
                                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row mb-4">
                                                                        <div class="col-lg-12">
                                                                            <img src="<?php echo ($result['attachment'] != "") ? FRONT_URL.$result['attachment'] : ''; ?>" width="100%" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-4">
                                                                        <div class="col-lg-2">
                                                                            <h4>SI: <?php echo $countermp; ?></h4>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <h4>Station Name: <?php echo $station_array['station_name']; ?></h4>
                                                                        </div>
                                                                        <div class="col-lg-3">
                                                                            <h4>User: <?php echo $user_array['first_name'].' '.$user_array['last_name']; ?></h4>
                                                                        </div>
                                                                        <div class="col-lg-3">
                                                                            <h4>Title: <?php echo $result['title']; ?></h4>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-4">
                                                                        <div class="col-lg-8">
                                                                            <h4>Comment: <?php echo $result['comment']; ?></h4>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <h4>Rating: <?php echo $rating_status['title']; ?></h4>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-4">
                                                                        <div class="col-lg-4">
                                                                            <h4>Date: <?php echo DATE("d-m-Y", strtotime($result['created_date'])); ?></h4>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <h4>Time: <?php echo DATE("h:i:sa", strtotime($result['created_date'])); ?></h4>
                                                                        </div>
                                                                        <div class="col-lg-4"></div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
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
      url: 'feedback.php',
      type: 'POST',
      data: { 
        feedback_id: id,
        type: 'approve_feedback' 
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
      url: 'feedback.php',
      type: 'POST',
      data: { 
        feedback_id: id,
        type: 'reject_feedback' 
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