<?php
include("../../include/db.php");

$id=$_GET['id'];
mysqli_query($conn,"DELETE FROM `005_fuelprices_helpdesk` WHERE `id`='$id'");

//header("Location: ../index.php");
echo '<script>window.location.href="../help_desk.php";</script>';
?>