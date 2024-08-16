<?php
include("header.php"); 
$sql = "SELECT * FROM 005_fuelprices_stations";
$stations = mysqli_query($conn, $sql);
?>
<section id="features" class="features" style="    margin-top: 20px;padding-bottom: 0px !important;">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 mb-3 mb-lg-0" data-aos="fade-right" style=""></div>
      <div class="col-lg-6 mb-6 mb-lg-0" data-aos="fade-right" style="">
        <input type="text" class="form-control" id="searchadd" placeholder="Search By Address">
      </div>
      <div class="col-lg-3 mb-3 mb-lg-0" data-aos="fade-right" style="">
        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#fuelPriceModal">Add Fuel Price</button>
      </div>
    </div>
  </div>
</section>
    
<script>
$(document).ready(function(){
  $.ajax({
    type: "POST",
    url: "subfunctions/showresults.php",
    async:true,
    data: {action:'alertquerydplans'},
    success: function (result) {
      if($.trim(result)!=""){
        $('#showresults').html(result);          
      }
    }
  });

  $("#searchadd").keyup(function(){
    var searchadd=$("#searchadd").val();
    $.ajax({
      type: "POST",
      url: "subfunctions/showresults.php",
      data: {searchadd:searchadd,action:'alertquerydplans'},
      success: function (result) {
        if($.trim(result)!=""){
          $('#showresults').html(result);
        }
      }
    });
  });
});
</script>

<div id="showresults"></div>

<!-- Modal -->
<div class="modal fade" id="fuelPriceModal" tabindex="-1" role="dialog" aria-labelledby="fuelPriceModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="fuelPriceModalLabel">Add Fuel Price</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" enctype="multipart/form-data" id="addFuelPrice" class="form-horizontal form-label-left">
        <div class="modal-body">

        
          <!-- <div class="item form-group">
            <label class="col-form-label label-align" for="first-name">Date <span class="required">*</span></label>
            <input type="date" name="dateofprice" required="required" class="form-control " value="" placeholder="Enter Date">
          </div>

          <div class="item form-group">
            <label for="first-name">Name <span class="required">*</span></label>
            <input type="text" name="name" required="required" class="form-control " placeholder="Enter Name" value="">
          </div>

          <div class="item form-group">
            <label for="first-name">Address <span class="required">*</span></label>
            <input type="text" name="address" id="search_google" required="required" class="form-control " placeholder="Enter Address" value="">
          </div>

          <div class="item form-group">
            <label for="first-name">Phone Number <span class="required">*</span>
            </label>
            <input type="tel" name="phonenumber" required="required" class="form-control " placeholder="Enter Phone Number" value="">
          </div>

          <div class="item form-group">
            <label for="first-name">Before 6am Price <span class="required">*</span>
            </label>
            <input type="number" step="any" name="before6amprice" required="required" class="form-control " placeholder="Enter Before 6am Price" value="">
          </div>

          <div class="item form-group">
            <label for="first-name">After 6am Price <span class="required">*</span>
            </label>
            <input type="number" step="any" name="after6amprice" required="required" class="form-control " placeholder="Enter After 6am Price" value="<?php echo $rowgetprice['after6amprice']; ?>">
          </div> -->

        
        
        
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="purchase_date">Purchase Date</label>
              <input type="date" class="form-control" name="purchase_date" id="purchase_date" placeholder="Purchase Date">
              <small id="purchaseDateError" class="form-text text-danger"></small>
            </div>
            <div class="form-group col-md-6">
              <label for="purchase_time">Purchase Time</label>
              <input type="time" class="form-control" name="purchase_time" id="purchase_time" placeholder="Purchase Time">
              <small id="purchaseTimeError" class="form-text text-danger"></small>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="litres">Litres</label>
              <input type="number" step="0.01" class="form-control" name="litres" id="litres" placeholder="Litres">
              <small id="litresError" class="form-text text-danger"></small>
            </div>
            <div class="form-group col-md-6">
              <label for="amount">Amount</label>
              <input type="number" step="0.01" class="form-control" name="amount" id="amount" placeholder="Amount">
              <small id="amountError" class="form-text text-danger"></small>
            </div>
          </div>
          <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="+810000000000">
            <small id="phoneNumberError" class="form-text text-danger"></small>
          </div>
          <?php if(mysqli_num_rows($stations) > 0){ ?>
            <div class="form-group">
              <label for="station_id">Select Station</label>
              <select class="form-control" id="station_id" name="station_id">
                <option value="0">Select Station</option>
                <?php while($station = mysqli_fetch_assoc($stations)){ ?>
                  <option value="<?php echo $station['id']; ?>"><?php echo $station['station_name']; ?></option>
                <?php } ?>
              </select>
              <small id="stationIdError" class="form-text text-danger"></small>
            </div>
          <?php } ?>
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="attachment" id="attachment">
            <label class="custom-file-label" for="attachment">Upload Photo</label>
          </div>



        </div>
        <div class="modal-footer">
          <input type="hidden" value="fuelPrice" name="form_type">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">ADD</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
    $(document).ready(function() {
      $('#addFuelPrice').on('submit', function(event) {
        event.preventDefault(); // Prevent default form submission
        
        let valid = true;

        // Clear previous errors
        $('#purchaseDateError').text('');
        $('#purchaseTimeError').text('');
        $('#litresError').text('');
        $('#amountError').text('');
        $('#phoneNumberError').text('');
        $('#stationIdError').text('');

        // purchase_date validation
        const purchase_date = $('#purchase_date').val().trim();
        if (purchase_date === '') {
            $('#purchaseDateError').text('purchase date is required');
            valid = false;
        }

        // purchase_time validation
        const purchase_time = $('#purchase_time').val().trim();
        if (purchase_time === '') {
            $('#purchaseTimeError').text('purchase time is required');
            valid = false;
        }

        // litres validation
        const litres = $('#litres').val().trim();
        if (litres === '') {
            $('#litresError').text('litres is required');
            valid = false;
        }

        // amount validation
        const amount = $('#amount').val().trim();
        if (amount === '') {
            $('#amountError').text('amount is required');
            valid = false;
        }

        // phone_number validation
        const phone_number = $('#phone_number').val().trim();
        if (phone_number === '') {
          $('#phoneNumberError').text('phone number is required');
          valid = false;
        }

        // station_id validation
        const station_id = $('#station_id').val();
        if (station_id && station_id === '0') {
          $('#stationIdError').text('Please select a station');
          valid = false;
        }

        if (valid) {
          const formData = new FormData(this);

          $.ajax({
            url: 'process_form.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('#addFuelPrice')[0].reset();
                alert(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error:', textStatus, errorThrown);
            }
          });
        }
      });
    });
</script>


<?php
include("footer.php"); 
?>