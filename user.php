<?php
include("header.php"); 
$sql = "SELECT * FROM 005_fuelprices_users";
$station_manager_list = mysqli_query($conn, $sql);

$sql = "SELECT * FROM `005_fuelprices_user_title`";
$user_titles = mysqli_query($conn, $sql);
?>
<section id="features" class="features" style="    margin-top: 20px;padding-bottom: 0px !important;">
  <div class="container">
    <div class="row">
        <div class="section-content" style="margin-left: auto; margin-right: auto;">
            <div class="">
                <h1 class="pb-3" style="font-size:24px;">Create User</h1>
            </div>
            <form method="POST" class="" style="width: 100%;" id="myForm" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="title">Title</label>
                        <select class="form-control" id="title" name="title">
                            <?php 
                            while($row = mysqli_fetch_assoc($user_titles)) {
                                ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['title']; ?></option>
                                <?php 
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
                        <small id="firstNameError" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="middle_name">Middle Name</label>
                        <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Middle Name">
                        <small id="middleNameError" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
                        <small id="lastNameError" class="form-text text-danger"></small>
                    </div>
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
                    <label for="state">Select State</label>
                    <select class="form-control" id="state" name="state">
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
                        <label for="dob">Date Of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" placeholder="Enter dob">
                        <small id="dobError" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone">
                        <small id="phoneError" class="form-text text-danger"></small>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone2">Phone 2</label>
                    <input type="text" class="form-control" id="phone2" name="phone2" placeholder="Enter Phone 2">
                    <small id="phone2Error" class="form-text text-danger"></small>
                </div>
                <div class="custom-file mb-2">
                    <input type="file" class="custom-file-input" id="attachment" name="attachment">
                    <label class="custom-file-label" for="attachment">Upload Photo</label>
                    <small id="attachmentError" class="form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label for="comment">Comment</label>
                    <textarea class="form-control" name="comment" id="comment" rows="5" cols="30"></textarea>
                    <small id="commentError" class="form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <input type="hidden" value="" name="lat">
                    <input type="hidden" value="" name="long">
                    <input type="hidden" value="user" name="form_type">
                    <button type="submit" class="btn btn-primary">ADD</button>
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
            $('#titleError').text('');
            $('#commentError').text('');
            $('#ratingError').text('');
            $('#attachmentError').text('');

            // Title validation
            const title = $('#title').val().trim();
            if (title === '') {
                $('#titleError').text('Title is required');
                valid = false;
            }

            // Comment validation
            const comment = $('#comment').val().trim();
            if (comment === '') {
                $('#commentError').text('Comment is required');
                valid = false;
            }

            // Rating validation
            const rating = $('#rating').val();
            if (rating && rating === '0') {
                $('#ratingError').text('Please select a rating');
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