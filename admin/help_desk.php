<?php 
include('header.php');

$sql = "SELECT * FROM `005_fuelprices_helpdesk`";
$results = mysqli_query($conn, $sql);
$count = mysqli_num_rows($results);

$sql = "SELECT * FROM 005_fuelprices_feedback_status";
$status_list = mysqli_query($conn, $sql);
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
                                    $countermp = 0;
                                    if($count > 0)
                                    {
                                        ?>
                                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                <th>Sl.</th>
                                                    <th>Station Name</th>
                                                    <th>User</th>
                                                    <th>Title</th>
                                                    <th>Comment</th>
                                                    <!-- <th>Status</th> -->
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
                                                    $status = [];
                                                    while($row = mysqli_fetch_assoc($status_list)) {
                                                        if ($row['id'] == $result['id']) {
                                                            $status = $row;
                                                            break;
                                                        }
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $countermp; ?></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><?php echo $result['title']; ?></td>
                                                        <td><?php echo $result['comment']; ?></td>
                                                        <!-- <td><?php echo $status['title']; ?></td> -->
                                                        <td><img src="<?php echo ($result['attachment'] != '') ? FRONT_URL.$result['attachment'] : ''; ?>" width="100px" /></td>
                                                        <td><?php echo DATE("d-m-Y", strtotime($result['created_date'])); ?></td>
                                                        <td><?php echo DATE("h:i:sa", strtotime($result['created_date'])); ?></td>
                                                        <td>
                                                            <?php echo ($result['status'] == 1) ? '<span class="badge badge-primary">Approved</span>' : '<span class="badge badge-warning">Rejected</span>'; ?>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" data-toggle="modal" data-target=".bs-example-modal-lg<?php echo $result['id']; ?>">
                                                                <i class="fa fa-eye" aria-hidden="true" style="color:green"></i>
                                                            </a>
                                                            <a href="subfunctions/deletehelpdesk.php?id=<?php echo $result['id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');">
                                                                <i class="fa fa-window-close" aria-hidden="true" style="color:red"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade bs-example-modal-lg<?php echo $result['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel">Help Desk Detail</h4>
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
                                                                            <h4>Station Name: </h4>
                                                                        </div>
                                                                        <div class="col-lg-3">
                                                                            <h4>User: </h4>
                                                                        </div>
                                                                        <div class="col-lg-3">
                                                                            <h4>Title: <?php echo $result['title']; ?></h4>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-4">
                                                                        <div class="col-lg-8">
                                                                            <h4>Comment: <?php echo $result['comment']; ?></h4>
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
      url: 'help_desk.php',
      type: 'POST',
      data: { 
        helpdesk_id: id,
        type: 'approve_helpdesk' 
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
    console.log(id);
    $.ajax({
      url: 'help_desk.php',
      type: 'POST',
      data: { 
        helpdesk_id: id,
        type: 'reject_helpdesk' 
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