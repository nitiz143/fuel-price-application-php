<?php
session_start();
include('include/db.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['form_type'])) && $_POST['form_type'] == 'login') {
    // Get form data
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $response = [
        "status" => 0,
        "message" => "Email or Password not matched."
    ];
    $results = mysqli_query($conn, "SELECT * FROM 005_fuelprices_users WHERE email = '".$email."' AND password = '".$password."'");
    if(mysqli_num_rows($results) > 0){
        $row = mysqli_fetch_assoc($results);
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['role_id'] = $row['role_id'];
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['email'] = $row['email'];
        $response = [
            "status" => 1,
            "message" => "Login successfully."
        ];
    }
    echo json_encode($response, true);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['form_type'])) && $_POST['form_type'] == 'feedback') {
    // Get form data
    $title = $_POST['title'];
    $comment = $_POST['comment'];
    $rating = $_POST['rating'];

    // Check for file upload
    $destPath = '';
    if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == 0) {
        $fileTmpPath = $_FILES['attachment']['tmp_name'];
        $fileName = $_FILES['attachment']['name'];
        $fileSize = $_FILES['attachment']['size'];
        $fileType = $_FILES['attachment']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Check file size (2MB limit)
        if ($fileSize > 2 * 1024 * 1024) {
            echo 'File size must be less than 2MB';
            exit;
        }

        // Move the uploaded file to a destination directory
        $uploadFileDir = './uploads/feedback/';
        $destPath = $uploadFileDir . $fileName;
        if (!move_uploaded_file($fileTmpPath, $destPath)) {
            echo 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
            exit;
        }
    }
    mysqli_query($conn, "INSERT INTO `005_fuelprices_feedback`(`title`,`comment`,`user_rating`,`attachment`)VALUES('$title','$comment','$rating','$destPath')");
    echo 'Feedback successfully submitted.';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['form_type'])) && $_POST['form_type'] == 'help_desk') {
    // Get form data
    $title = $_POST['title'];
    $comment = $_POST['comment'];
    $status = $_POST['status'];

    // Check for file upload
    $destPath = '';
    if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == 0) {
        $fileTmpPath = $_FILES['attachment']['tmp_name'];
        $fileName = $_FILES['attachment']['name'];
        $fileSize = $_FILES['attachment']['size'];
        $fileType = $_FILES['attachment']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Check file size (2MB limit)
        if ($fileSize > 2 * 1024 * 1024) {
            echo 'File size must be less than 2MB';
            exit;
        }

        // Move the uploaded file to a destination directory
        $uploadFileDir = './uploads/help_desk/';
        $destPath = $uploadFileDir . $fileName;
        if (!move_uploaded_file($fileTmpPath, $destPath)) {
            echo 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
            exit;
        }
    }
    mysqli_query($conn, "INSERT INTO `005_fuelprices_helpdesk`(`title`,`comment`,`status`,`attachment`)VALUES('$title','$comment','$status','$destPath')");
    echo 'Help Desk successfully submitted.';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['form_type'])) && $_POST['form_type'] == 'station') {
    // Get form data
    $station_name = $_POST['station_name'];
    $station_manager = $_POST['station_manager'];
    $station_phone = $_POST['station_phone'];
    $street_address = $_POST['street_address'];
    $street_address_2 = $_POST['street_address_2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipcode = $_POST['zipcode'];
    $country = $_POST['country'];
    $opening_time = $_POST['opening_time'];
    $closing_time = $_POST['closing_time'];
    $comment = $_POST['comment'];

    // Check for file upload
    $destPath = '';
    if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == 0) {
        $fileTmpPath = $_FILES['attachment']['tmp_name'];
        $fileName = $_FILES['attachment']['name'];
        $fileSize = $_FILES['attachment']['size'];
        $fileType = $_FILES['attachment']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Check file size (2MB limit)
        if ($fileSize > 2 * 1024 * 1024) {
            echo 'File size must be less than 2MB';
            exit;
        }

        // Move the uploaded file to a destination directory
        $uploadFileDir = './uploads/station/';
        $destPath = $uploadFileDir . $fileName;
        if (!move_uploaded_file($fileTmpPath, $destPath)) {
            echo 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
            exit;
        }
    }
    mysqli_query($conn, "INSERT INTO `005_fuelprices_stations`(`station_name`,`station_manager`,`station_phone`,`street_address`,`street_address_2`,`city`,`state`,`zipcode`,`country`,`opening_time`,`closing_time`,`comments`,`created_by`,`attachment`)VALUES('$station_name','$station_manager','$station_phone','$street_address','$street_address_2','$city','$state','$zipcode','$country','$opening_time','$closing_time','$comment',1,'$destPath')");
    echo 'Station added successfully.';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['form_type'])) && $_POST['form_type'] == 'fuelStation') {
    // Get form data
    $dateofprice = $_POST['dateofprice'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phonenumber = $_POST['phonenumber'];
    $before6amprice = $_POST['before6amprice'];
    $after6amprice = $_POST['after6amprice'];
    $latitude = 0; //$_POST['latitude'];
    $longitude = 0; //$_POST['longitude'];
    $user_id = 0;

    
    mysqli_query($conn, "INSERT INTO `005_fuelprices_prices`(`dateofprice`,`name`,`address`,`phonenumber`,`before6amprice`,`after6amprice`,`latitude`,`longitude`,`user_id`)VALUES('$dateofprice','$name','$address','$phonenumber','$before6amprice','$after6amprice','$latitude','$longitude','$user_id')");
    echo 'Station added successfully.';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['form_type'])) && $_POST['form_type'] == 'fuelPrice') {
    // Get form data
    $purchase_date = $_POST['purchase_date'];
    $purchase_time = $_POST['purchase_time'];
    $litres = $_POST['litres'];
    $amount = $_POST['amount'];
    $phone_number = $_POST['phone_number'];
    $station_id = $_POST['station_id'];
    $latitude = 0; //$_POST['latitude'];
    $longitude = 0; //$_POST['longitude'];
    $user_id = 0;

    // Check for file upload
    $destPath = '';
    if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == 0) {
        $fileTmpPath = $_FILES['attachment']['tmp_name'];
        $fileName = $_FILES['attachment']['name'];
        $fileSize = $_FILES['attachment']['size'];
        $fileType = $_FILES['attachment']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Check file size (2MB limit)
        if ($fileSize > 2 * 1024 * 1024) {
            echo 'File size must be less than 2MB';
            exit;
        }

        // Move the uploaded file to a destination directory
        $uploadFileDir = './uploads/price/';
        $destPath = $uploadFileDir . $fileName;
        if (!move_uploaded_file($fileTmpPath, $destPath)) {
            echo 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
            exit;
        }
    }
    
    mysqli_query($conn, "INSERT INTO `005_fuelprices_user_price`(`latitude`,`longitude`,`purchase_date`,`purchase_time`,`litres`,`amount`,`phone_number`,`user_id`,`station_id`,`photo`,`status`)VALUES('$latitude','$longitude','$purchase_date','$purchase_time','$litres','$amount','$phone_number','$user_id','$station_id','$destPath',2)");
    echo 'Price added successfully.';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['form_type'])) && $_POST['form_type'] == 'register') {
    //echo '<pre>'; print_r($_POST);
    // Get form data
    //$title_id = $_POST['title'];
    $first_name = $_POST['first_name'];
    //$middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    /*$street_address = $_POST['street_address'];
    $street_address2 = $_POST['street_address_2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zipcode'];
    $country = $_POST['country'];
    $phone1 = $_POST['phone'];
    $phone2 = $_POST['phone2'];
    $dob = $_POST['dob'];
    $make = $_POST['make'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $latitude = 0; //$_POST['lat'];
    $longitute = 0; //$_POST['long'];

    // Check for file upload
    $destPath = '';
    if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == 0) {
        $fileTmpPath = $_FILES['attachment']['tmp_name'];
        $fileName = $_FILES['attachment']['name'];
        $fileSize = $_FILES['attachment']['size'];
        $fileType = $_FILES['attachment']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Check file size (2MB limit)
        if ($fileSize > 2 * 1024 * 1024) {
            echo 'File size must be less than 2MB';
            exit;
        }

        // Move the uploaded file to a destination directory
        $uploadFileDir = './uploads/user/';
        $destPath = $uploadFileDir . $fileName;
        if (!move_uploaded_file($fileTmpPath, $destPath)) {
            echo 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
            exit;
        }
    }
    mysqli_query($conn, "INSERT INTO `005_fuelprices_users`(`role_id`,`title_id`,`first_name`,`middle_name`,`last_name`,`dob`,`street_address`,`street_address2`,`city`,`state`,`country`,`zip`,`phone1`,`phone2`,`make`,`model`,`year`,`email`,`password`,`photo`,`latitude`,`longitute`)VALUES('2','$title_id','$first_name','$middle_name','$last_name','$dob','$street_address','$street_address2','$city','$state','$country','$zip','$phone1','$phone2','$make','$model','$year','$email','$password','$destPath','$latitude','$longitute')");*/
    mysqli_query($conn, "INSERT INTO `005_fuelprices_users`(`role_id`,`first_name`,`last_name`,`email`,`password`)VALUES('2','$first_name','$last_name','$email','$password')");
    echo 'Register successfully.';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['form_type'])) && $_POST['form_type'] == 'vehicle') {
    //echo '<pre>'; print_r($_POST);
    // Get form data
    $user_id = $_SESSION['user_id'];
    $title_id = $_POST['title'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    //$email = $_POST['email'];
    //$password = md5($_POST['password']);
    $street_address = $_POST['street_address'];
    $street_address2 = $_POST['street_address_2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zipcode'];
    $country = $_POST['country'];
    $phone1 = $_POST['phone'];
    $phone2 = $_POST['phone2'];
    $dob = $_POST['dob'];
    $make = $_POST['make'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $latitude = 0; //$_POST['lat'];
    $longitute = 0; //$_POST['long'];

    // Check for file upload
    $destPath = '';
    if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == 0) {
        $fileTmpPath = $_FILES['attachment']['tmp_name'];
        $fileName = $_FILES['attachment']['name'];
        $fileSize = $_FILES['attachment']['size'];
        $fileType = $_FILES['attachment']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Check file size (2MB limit)
        if ($fileSize > 2 * 1024 * 1024) {
            echo 'File size must be less than 2MB';
            exit;
        }

        // Move the uploaded file to a destination directory
        $uploadFileDir = './uploads/user/';
        $destPath = $uploadFileDir . $fileName;
        if (!move_uploaded_file($fileTmpPath, $destPath)) {
            echo 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
            exit;
        }
    }
    mysqli_query($conn, "INSERT INTO `005_fuelprices_vehicle`(`user_id`,`title_id`,`first_name`,`middle_name`,`last_name`,`dob`,`street_address`,`street_address2`,`city`,`state`,`country`,`zip`,`phone1`,`phone2`,`make`,`model`,`year`,`photo`,`latitude`,`longitute`)VALUES($user_id,'$title_id','$first_name','$middle_name','$last_name','$dob','$street_address','$street_address2','$city','$state','$country','$zip','$phone1','$phone2','$make','$model','$year','$destPath','$latitude','$longitute')");
    echo 'Vehicle added successfully.';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['form_type'])) && $_POST['form_type'] == 'update_profile') {

    $user_id = $_POST['user_id']; // Assuming you pass the user ID to identify which user to update
    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : null;
    $middle_name = isset($_POST['middle_name']) ? $_POST['middle_name'] : null;
    $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $password = isset($_POST['password']) ? md5($_POST['password']) : null;

    // Building the update query dynamically based on provided fields
    $update_fields = [];

    if ($first_name !== null) {
        $update_fields[] = "`first_name`='$first_name'";
    }
    if ($last_name !== null) {
        $update_fields[] = "`last_name`='$last_name'";
    }
    if ($email !== null) {
        $update_fields[] = "`email`='$email'";
    }
    if ($password !== null && !empty($password)) {
        $update_fields[] = "`password`='$password'";
    }

    if (!empty($update_fields)) {
        $update_query = "UPDATE `005_fuelprices_users` SET " . implode(', ', $update_fields) . " WHERE `user_id`='$user_id'";

        if (mysqli_query($conn, $update_query)) {
            echo 'Profile updated successfully.';
        } else {
            echo 'Error updating profile: ' . mysqli_error($conn);
        }
    } else {
        echo 'No fields to update.';
    }
}
?>
