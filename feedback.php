<?php
include("header.php"); 
if(!isset($_SESSION['user_id'])){
    header('Location: '.FRONT_URL);
    die();
}
$sql = "SELECT * FROM 005_fuelprices_rating";
$rating_list = mysqli_query($conn, $sql);
?>
<section id="features" class="features" style="    margin-top: 20px;padding-bottom: 0px !important;">
  <div class="container">
    <div class="row">
        <div class="section-content" style="margin-left: auto; margin-right: auto;">
            <div class="col-12">
                <h1 class="pb-3" style="font-size:24px;">User Feedback</h1>
            </div>
            <form method="POST" class="" style="width: 500px;" id="myForm" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
                    <small id="titleError" class="form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label for="comment">Comment</label>
                    <textarea class="form-control" name="comment" id="comment" rows="10" cols="30"></textarea>
                    <small id="commentError" class="form-text text-danger"></small>
                </div>
                <?php if(mysqli_num_rows($rating_list) > 0){ ?>
                    <div class="form-group">
                        <label for="rating">Select Rating</label>
                        <select class="form-control" id="rating" name="rating">
                            <option value="0">Select Rating</option>
                            <?php while($rating_status = mysqli_fetch_assoc($rating_list)){ ?>
                                <option value="<?php echo $rating_status['id']; ?>"><?php echo $rating_status['title']; ?></option>
                            <?php } ?>
                        </select>
                        <small id="ratingError" class="form-text text-danger"></small>
                    </div>
                <?php } ?>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="attachment" name="attachment">
                    <label class="custom-file-label" for="attachment">Upload Photo</label>
                    <small id="attachmentError" class="form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <input type="hidden" value="feedback" name="form_type">
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