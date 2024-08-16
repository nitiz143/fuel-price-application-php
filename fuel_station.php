<?php
include("header.php"); 
if(!isset($_SESSION['user_id'])){
    header('Location: '.FRONT_URL);
    die();
}
$sql = "SELECT * FROM 005_fuelprices_users where role_id = 2";
$station_manager_list = mysqli_query($conn, $sql);
?>
<section id="features" class="features" style="    margin-top: 20px;padding-bottom: 0px !important;">
  <div class="container">
    <div class="row">
        <div class="section-content" style="margin-left: auto; margin-right: auto;">
            <div class="">
                <h1 class="pb-3" style="font-size:24px;">Add Fuel Station</h1>
            </div>
            <form method="POST" class="" style="width: 500px;" id="myForm" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="station_name">Station Name</label>
                    <input type="text" class="form-control" id="station_name" name="station_name" placeholder="Enter Station Name">
                    <small id="stationError" class="form-text text-danger"></small>
                </div>
                <?php if(mysqli_num_rows($station_manager_list) > 0){ ?>
                    <div class="form-group">
                        <label for="station_manager">Station Manager</label>
                        <select class="form-control" id="station_manager" name="station_manager">
                            <option value="0">Select Station Manager</option>
                            <?php while($s_m_list = mysqli_fetch_assoc($station_manager_list)){ ?>
                                <option value="<?php echo $s_m_list['user_id']; ?>"><?php echo $s_m_list['first_name'].' '.$s_m_list['last_name']; ?></option>
                            <?php } ?>
                        </select>
                        <small id="stationManagerError" class="form-text text-danger"></small>
                    </div>
                <?php } ?>
                <div class="form-group">
                    <label for="station_phone">Station Phone</label>
                    <input type="text" class="form-control" id="station_phone" name="station_phone" placeholder="Enter Station Phone">
                    <small id="stationPhoneError" class="form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label for="street_address">Street Address</label>
                    <input type="text" class="form-control" id="street_address" name="street_address" placeholder="Enter street address">
                    <small id="streetAddressError" class="form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label for="street_address_2">Street Address 2</label>
                    <input type="text" class="form-control" id="street_address_2" name="street_address_2" placeholder="Enter street address 2">
                    <small id="streetAddress2Error" class="form-text text-danger"></small>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Enter city">
                        <small id="cityError" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="state">State</label>
                        <select class="form-control" id="state" name="state">
                            <option value="">Select State</option>
                            <option value="Abia">Abia</option>
                            <option value="Adamawa">Adamawa</option>
                            <option value="Akwa Ibom">Akwa Ibom</option>
                            <option value="Anambra">Anambra</option>
                            <option value="Bauchi">Bauchi</option>
                            <option value="Bayelsa">Bayelsa</option>
                            <option value="Benue">Benue</option>
                            <option value="Borno">Borno</option>
                            <option value="Cross River">Cross River</option>
                            <option value="Delta">Delta</option>
                            <option value="Ebonyi">Ebonyi</option>
                            <option value="Edo">Edo</option>
                            <option value="Ekiti">Ekiti</option>
                            <option value="Enugu">Enugu</option>
                            <option value="Gombe">Gombe</option>
                            <option value="Imo">Imo</option>
                            <option value="Jigawa">Jigawa</option>
                            <option value="Kaduna">Kaduna</option>
                            <option value="Kano">Kano</option>
                            <option value="Katsina">Katsina</option>
                            <option value="Kebbi">Kebbi</option>
                            <option value="Kogi">Kogi</option>
                            <option value="Kwara">Kwara</option>
                            <option value="Lagos">Lagos</option>
                            <option value="Nasarawa">Nasarawa</option>
                            <option value="Niger">Niger</option>
                            <option value="Ogun">Ogun</option>
                            <option value="Ondo">Ondo</option>
                            <option value="Osun">Osun</option>
                            <option value="Oyo">Oyo</option>
                            <option value="Plateau">Plateau</option>
                            <option value="Rivers">Rivers</option>
                            <option value="Sokoto">Sokoto</option>
                            <option value="Taraba">Taraba</option>
                            <option value="Yobe">Yobe</option>
                            <option value="Zamfara">Zamfara</option>
                            <option value="FCT">Federal Capital Territory</option>
                        </select>
                        <small id="stateError" class="form-text text-danger"></small>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="zipcode">Zip Code</label>
                        <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Enter zip code">
                        <small id="zipcodeError" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="country">Country</label>
                        <select class="form-control" id="country" name="country">
                            <option value="Nigeria">Nigeria</option>
                        </select>
                        <small id="countryError" class="form-text text-danger"></small>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="opening_time">Opening Time</label>
                        <input type="time" class="form-control" id="opening_time" name="opening_time" placeholder="Enter zip code">
                        <small id="openingTimeError" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="closing_time">Closing Time</label>
                        <input type="time" class="form-control" id="closing_time" name="closing_time" placeholder="Enter zip code">
                        <small id="closingTimeError" class="form-text text-danger"></small>
                    </div>
                </div>
                <div class="form-group">
                    <label for="comment">Comment</label>
                    <textarea class="form-control" name="comment" id="comment" rows="5" cols="30"></textarea>
                    <small id="commentError" class="form-text text-danger"></small>
                </div>
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" id="attachment" name="attachment">
                    <label class="custom-file-label" for="attachment">Upload Photo</label>
                    <small id="attachmentError" class="form-text text-danger"></small>
                </div>
                
                <div class="form-group">
                    <input type="hidden" value="" name="lat">
                    <input type="hidden" value="" name="long">
                    <input type="hidden" value="station" name="form_type">
                    <input type="submit" class="btn btn-primary mt-3" value="Submit">
                </div>
            </form>
        </div>
    </div>
  </div>
</section>

<script>
    $(document).ready(function() {
        $('#myForm').on('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            let valid = true;

            // Clear previous errors
            $('#stationError').text('');
            $('#stationManagerError').text('');
            $('#stationPhoneError').text('');
            $('#streetAddressError').text('');
            $('#cityError').text('');
            $('#stateError').text('');
            $('#zipcodeError').text('');
            $('#openingTimeError').text('');
            $('#closingTimeError').text('');
            $('#attachmentError').text('');

            // station validation
            const station = $('#station_name').val().trim();
            if (station === '') {
                $('#stationError').text('Station is required');
                valid = false;
            }

            // stationManager validation
            const stationManager = $('#station_manager').val();
            if (stationManager && stationManager === '0') {
                $('#stationManagerError').text('Please station manager');
                valid = false;
            }

            // stationPhone validation
            const station_phone = $('#station_phone').val().trim();
            if (station_phone === '') {
                $('#stationPhoneError').text('Phone is required');
                valid = false;
            }

            // streetAddress validation
            const street_address = $('#street_address').val().trim();
            if (street_address === '') {
                $('#streetAddressError').text('Street Address is required');
                valid = false;
            }

            // city validation
            const city = $('#city').val().trim();
            if (city === '') {
                $('#cityError').text('City is required');
                valid = false;
            }

            // state validation
            const state = $('#state').val().trim();
            if (state === '') {
                $('#stateError').text('State is required');
                valid = false;
            }

            // zipcode validation
            const zipcode = $('#zipcode').val().trim();
            if (zipcode === '') {
                $('#zipcodeError').text('Zip code is required');
                valid = false;
            }

            // opening_time validation
            const opening_time = $('#opening_time').val().trim();
            if (opening_time === '') {
                $('#openingTimeError').text('Opening time is required');
                valid = false;
            }

            // zipcode validation
            const closing_time = $('#closing_time').val().trim();
            if (closing_time === '') {
                $('#closingTimeError').text('Closing time is required');
                valid = false;
            }

            // Attachment validation
            const attachment = $('#attachment')[0].files[0];
            if (attachment && attachment.size > 2 * 1024 * 1024) { // 2MB limit
                $('#attachmentError').text('File size must be less than 2MB');
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
                        $('#myForm')[0].reset();
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