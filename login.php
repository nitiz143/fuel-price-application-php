<?php
include("header.php"); 
?>
<section id="features" class="features" style="    margin-top: 20px;padding-bottom: 0px !important;">
  <div class="container">
    <div class="row">
        
        <div class="mt-5" style="margin-left: auto; margin-right: auto; width: 500px; margin-bottom: 200px;">
            <div class="">
                <h1>Login</h1>
            </div>
            <form method="POST" class="" id="loginForm">
                <small id="loginError" class="form-text text-danger"></small>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                    <small id="emailError" class="form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                    <small id="passwordError" class="form-text text-danger"></small>
                </div>            
                <div class="form-group">
                    <input type="hidden" value="login" name="form_type">
                    <input type="submit" class="btn btn-primary mt-3" value="Submit">
                </div>
            </form>
            <p>Not a existing user, Please <a href="register.php">Register</a></p>
        </div>
    </div>
  </div>
</section>

<script>
    $(document).ready(function() {
        $('#loginForm').on('submit', function(event) {
            event.preventDefault();
            
            let valid = true;

            // Clear previous errors
            $('#emailError').text('');
            $('#passwordError').text('');
            $('#loginError').text('');
            
            // email validation
            const email = $('#email').val().trim();
            if (email === '') {
                $('#emailError').text('email is required');
                valid = false;
            }

            // password validation
            const password = $('#password').val().trim();
            if (password === '') {
                $('#passwordError').text('password is required');
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
                        var obj = JSON.parse(response);
                        if(obj.status){
                            window.location.href = '<?php echo FRONT_URL; ?>';
                            exit;
                        }else{
                            $('#loginError').text(obj.message);
                        }
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