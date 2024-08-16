<?php
include("header.php"); 
if(!isset($_SESSION['user_id'])){
    header('Location: '.FRONT_URL);
    die();
}
$sql = "SELECT * FROM 005_fuelprices_users where user_id = ".$_SESSION['user_id'];
$user_data = mysqli_query($conn, $sql);
$user_arr = $user_data->fetch_assoc();


?><section id="features" class="features" style="margin-top: 20px;padding-bottom: 0px !important;">
<div class="container">
  <div class="row">
      <div class="section-content" style="margin-left: auto; margin-right: auto;">
          <div class="">
              <h1 class="pb-3" style="font-size:24px;">Profile</h1>
          </div>
          <form method="POST" class="" style="width: 100%; min-height: 500px;" id="myForm" enctype="multipart/form-data">
              <div class="form-row">
                    <input type="hidden" name="user_id" value="<?php echo $user_arr['user_id']; ?>">
                  <div class="form-group col-md-6">
                      <label for="first_name">First Name<span class="required">*</span></label>
                      <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?php echo $user_arr['first_name']; ?>">
                      <small id="firstNameError" class="form-text text-danger"></small>
                  </div>
                  <div class="form-group col-md-6">
                      <label for="last_name">Last Name<span class="required">*</span></label>
                      <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="<?php echo $user_arr['last_name']; ?>">
                      <small id="lastNameError" class="form-text text-danger"></small>
                  </div>
              </div>
              <div class="form-group">
                  <label for="email">Email<span class="required">*</span></label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" value="<?php echo $user_arr['email']; ?>">
                  <small id="emailError" class="form-text text-danger"></small>
              </div>
              <div class="form-group">
                  <label for="password">Password<span class="required"></span></label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                  <small id="passwordError" class="form-text text-danger"></small>
              </div>
              <div class="form-group">
                  <label for="confirm_password">Confirm Password<span class="required"></span></label>
                  <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Enter password">
                  <small id="confirmPasswordError" class="form-text text-danger"></small>
              </div>
              
              <div class="form-group">
                  <input type="hidden" value="update_profile" name="form_type">
                  <button type="submit" class="btn btn-primary">Update Profile</button>
              </div>
          </form>
      </div>
  </div>
</div>
</section>
<style>
#myForm label .required{
  color: red;
}
</style>
<script>
  $(document).ready(function() {
      $('#myForm').on('submit', function(event) {
          event.preventDefault(); // Prevent default form submission

          let valid = true;

          // Clear previous errors
          $('#firstNameError').text('');
          $('#middleNameError').text('');
          $('#lastNameError').text('');
          $('#emailError').text('');
          $('#passwordError').text('');
          $('#confirmPasswordError').text('');
        


          // First Name validation
          const firstName = $('#first_name').val().trim();
          if (firstName === '') {
              $('#firstNameError').text('First Name is required');
              valid = false;
          }

          // Last Name validation
          const lastName = $('#last_name').val().trim();
          if (lastName === '') {
              $('#lastNameError').text('Last Name is required');
              valid = false;
          }

          // Email validation
          const email = $('#email').val().trim();
          const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
          if (email === '') {
              $('#emailError').text('Email is required');
              valid = false;
          } else if (!emailPattern.test(email)) {
              $('#emailError').text('Invalid email format');
              valid = false;
          }

          // Password validation
          $('#password').on('input', function() {
            const password = $(this).val().trim();
            if (password === '') {
                $('#passwordError').text('Password is required');
            } else if (password.length < 6) {
                $('#passwordError').text('Password must be at least 6 characters long');
            } else {
                $('#passwordError').text('');
            }
            validateConfirmPassword(); // Call this function to check confirm password
        });

        $('#confirm_password').on('input', function() {
            validateConfirmPassword();
        });

        function validateConfirmPassword() {
            const password = $('#password').val().trim();
            const confirmPassword = $('#confirm_password').val().trim();
            if (password !== '' && confirmPassword === '') {
                $('#confirmPasswordError').text('Confirm Password is required');
            } else if (password !== '' && password !== confirmPassword) {
                $('#confirmPasswordError').text('Passwords do not match');
            } else {
                $('#confirmPasswordError').text('');
            }
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
                    //   $('#myForm')[0].reset();
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