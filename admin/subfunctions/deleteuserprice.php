<?php
include("../../include/db.php");

$id=$_GET['id'];
mysqli_query($conn,"DELETE FROM `005_fuelprices_user_price` WHERE `serial_number`='$id'");

//header("Location: ../index.php");
echo '<script>window.location.href="../userprice.php";</script>';
?>