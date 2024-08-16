<?php
include("../../include/db.php");

$id=$_GET['id'];
mysqli_query($conn,"DELETE FROM `005_fuelprices_stations` WHERE `id`='$id'");

//header("Location: ../index.php");
echo '<script>window.location.href="../stations.php";</script>';
?>