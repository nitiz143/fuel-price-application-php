<?php 
include('header.php');
?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Prices List</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    
                  
                      <a href="addprice.php" class="btn btn-success" type="button">Add Price</a>
                      <a href="bulkupload.php" class="btn btn-success" type="button">Bulk Upload</a>
                   
                  </div>
                </div>
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
                  if($countprices1>0)
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
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>


                        <tbody>
                          <?php
                          while($rowprices=mysqli_fetch_assoc($resprices1))
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
                                    <?php echo ($rowprices['status'] == 1) ? '<span class="badge badge-primary">Approved</span>' : '<span class="badge badge-warning">Rejected</span>'; ?>
                                </td>

                                
                                <td>
                                  <a href="javascript:void(0);" data-toggle="modal" data-target=".bs-example-modal-lg<?php echo $rowprices['id']; ?>">
                                    <i class="fa fa-eye" aria-hidden="true" style="color:green"></i>
                                  </a>
                                  <!-- <a href="addprice.php?priceid=<?php echo $rowprices['id']; ?>" >
                                    <i class="fa fa-edit" aria-hidden="true" style="color:green"></i>
                                  </a> -->
                                  <a href="subfunctions/deleteprices.php?id=<?php echo $rowprices['id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');">
                                    <i class="fa fa-window-close" aria-hidden="true" style="color:red"></i>
                                  </a>
                                </td>
                              </tr>

                              <div class="modal fade bs-example-modal-lg<?php echo $rowprices['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                  <div class="modal-content">
                      
                                    <div class="modal-header">
                                      <h4 class="modal-title" id="myModalLabel">Price Detail</h4>
                                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="row mb-4">
                                        <div class="col-lg-2">
                                          <h4>SI: <?php echo $countermp; ?></h4>
                                        </div>
                                        <div class="col-lg-6">
                                          <h4>Name: <?php echo $rowprices['name']; ?></h4>
                                        </div>
                                        <div class="col-lg-4">
                                          <h4>Phone: <?php echo $rowprices['phonenumber']; ?></h4>
                                        </div>
                                      </div>
                                      <div class="row mb-4">
                                        <div class="col-lg-12">
                                          <h4>Address: <?php echo $rowprices['address']; ?></h4>
                                        </div>
                                      </div>
                                      <div class="row mb-4">
                                        <div class="col-lg-6">
                                          <h4>Before 6am Price: <?php echo $rowprices['before6amprice']; ?></h4>
                                        </div>
                                        <div class="col-lg-6">
                                          <h4>After 6am Price: <?php echo $rowprices['after6amprice']; ?></h4>
                                        </div>
                                      </div>
                                      <div class="row mb-4">
                                        <div class="col-lg-6">
                                          <h4>Latitude: <?php echo $rowprices['latitude']; ?></h4>
                                        </div>
                                        <div class="col-lg-6">
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
                                      <a href="addprice.php?priceid=<?php echo $rowprices['id']; ?>" class="btn btn-info">Edit</a>
                                      <button type="button" class="btn btn-primary" onclick="approve(<?php echo $rowprices['id']; ?>)">Approve</button>
                                      <button type="button" class="btn btn-warning" onclick="reject(<?php echo $rowprices['id']; ?>)">Reject</button>
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
      url: 'prices.php',
      type: 'POST',
      data: { 
        price_id: id,
        type: 'approve_price' 
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
        price_id: id,
        type: 'reject_price' 
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