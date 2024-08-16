<?php
$loggnusersessid=(isset($_SESSION["sessidgn"])) ? $_SESSION["sessidgn"] : '';
if(isset($_POST['adminloginsubmit'])) {
      $username = $_POST['username'];
      $password = md5($_POST['password']);

      $sqllog="SELECT * FROM `005_fuelprices_admin` WHERE `username`='$username' AND `password`='$password'"; 
      $reslog=mysqli_query($conn,$sqllog);
      /*echo mysqli_num_rows($reslog);
      die;*/
      if(mysqli_num_rows($reslog)>0)
      {

        $rowlog=mysqli_fetch_assoc($reslog);
        $_SESSION['idsessuser']=$rowlog['id'];
        //header("Location: content");  
        echo '<script>window.location.href="prices.php";</script>';

      }
      else{
         echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
               <link href="http://tristanedwards.me/u/SweetAlert/lib/sweet-alert.css" rel="stylesheet" />
               <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                    <script>
                    $( document ).ready(function() {
                      var span = document.createElement("span");
                        
                     swal({
                        title: "Incorrect Credentials!",
                        text: "",
                        icon: "error",
                        closeOnClickOutside: false,
                   })
                    });
                    $(document).on("click", "#btnA", function() {
                        alert(this.id);
                  });                  
                  </script>';
      }
}

$priceid = (isset($_GET['priceid'])) ? $_GET['priceid'] : '';
if($priceid)
{
	$sqlgetprice="SELECT * FROM `005_fuelprices_prices` WHERE `id`='$priceid'";
	$resgetprice=mysqli_query($conn,$sqlgetprice);
	$rowgetprice=mysqli_fetch_assoc($resgetprice);
}

if(isset($_POST['btnprice'])) {
	$dateofprice = $_POST['dateofprice'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$phonenumber = $_POST['phonenumber'];
	$before6amprice = $_POST['before6amprice'];
	$after6amprice = $_POST['after6amprice'];


	// Google Maps API Key 
$GOOGLE_API_KEY = '<<API KEY>>'; 
 
// Address from which the latitude and longitude will be retrieved 
/*$address = 'No C/102, 514, near SBI Branch, Mohaddipur, Gorakhpur, Uttar Pradesh 273008'; */
 
// Formatted address 
$formatted_address = str_replace(' ', '+', $address); 
 
// Get geo data from Google Maps API by address 
$geocodeFromAddr = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address={$formatted_address}&key={$GOOGLE_API_KEY}"); 
 
// Decode JSON data returned by API 
$apiResponse = json_decode($geocodeFromAddr); 
 
// Retrieve latitude and longitude from API data 
 $latitude  = $apiResponse->results[0]->geometry->location->lat;  
 $longitude = $apiResponse->results[0]->geometry->location->lng; 

	if($priceid)
	{
		mysqli_query($conn,"UPDATE `005_fuelprices_prices` SET `dateofprice`='$dateofprice',`name`='$name',`address`='$address',`phonenumber`='$phonenumber',`before6amprice`='$before6amprice',`after6amprice`='$after6amprice',`latitude`='$latitude',`longitude`='$longitude' WHERE `id`='$priceid'");

	echo '
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                  <link href="http://tristanedwards.me/u/SweetAlert/lib/sweet-alert.css" rel="stylesheet" />
                  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                <script>
                  $( document ).ready(function() {
                     swal({
                          title:"Price Updated",
                          text: "",
                          icon: "success",
                          closeOnClickOutside: false,                 
                      }).then(function() {
                            window.location = "prices.php";
                      });
                  });
                  $(document).on("click", "#btnA", function() {
                  alert(this.id);
                });
                 
                </script>
                ';
	}
	else
	{
		mysqli_query($conn,"INSERT INTO `005_fuelprices_prices`(`dateofprice`,`name`,`address`,`phonenumber`,`before6amprice`,`after6amprice`,`latitude`,`longitude`)VALUES('$dateofprice','$name','$address','$phonenumber','$before6amprice','$after6amprice','$latitude','$longitude')");

	echo '
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                  <link href="http://tristanedwards.me/u/SweetAlert/lib/sweet-alert.css" rel="stylesheet" />
                  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                <script>
                  $( document ).ready(function() {
                     swal({
                          title:"Price Inserted",
                          text: "",
                          icon: "success",
                          closeOnClickOutside: false,                 
                      }).then(function() {
                            window.location = "prices.php";
                      });
                  });
                  $(document).on("click", "#btnA", function() {
                  alert(this.id);
                });
                 
                </script>
                ';
	}
	
}


$sqlprices="SELECT * FROM `005_fuelprices_prices`";
$resprices=mysqli_query($conn,$sqlprices);
$countprices=mysqli_num_rows($resprices);



if(isset($_POST['btnreset'])) {
      $opass = md5($_POST['opass']);
      $npass = md5($_POST['npass']);
      $cpass = md5($_POST['cpass']);

      if($npass!=$cpass)
      {
        echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            
                      <link href="http://tristanedwards.me/u/SweetAlert/lib/sweet-alert.css" rel="stylesheet" />

                      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>


                    <script>
                    $( document ).ready(function() {
                      var span = document.createElement("span");
                        
                     swal({
                        title: "Passwords Donot Match!",
                        text: "",
                        icon: "error",
                        closeOnClickOutside: false,
                   })
            

                    });
                    $(document).on("click", "#btnA", function() {
                        alert(this.id);
                  });
                   
                  </script>
                    ';
      }
      else{

          $sqllog1="SELECT * FROM `005_fuelprices_admin` WHERE `id`='1'";
          $reslog1=mysqli_query($conn,$sqllog1);
          $rowlog1=mysqli_fetch_assoc($reslog1);
          $odpass=$rowlog1['password'];
          if($opass!=$odpass)
          {
            echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                
                          <link href="http://tristanedwards.me/u/SweetAlert/lib/sweet-alert.css" rel="stylesheet" />

                          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>


                        <script>
                        $( document ).ready(function() {
                          var span = document.createElement("span");
                            
                         swal({
                            title: "Wrong Password!",
                            text: "",
                            icon: "error",
                            closeOnClickOutside: false,
                       })
                

                        });
                        $(document).on("click", "#btnA", function() {
                            alert(this.id);
                      });
                       
                      </script>
                        ';
          }
          else
          {
             $sqldel="UPDATE `005_fuelprices_admin` SET `password`='$npass' WHERE `id`=1";
             if ($conn->query($sqldel) === TRUE) {
             echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            
                      <link href="http://tristanedwards.me/u/SweetAlert/lib/sweet-alert.css" rel="stylesheet" />

                      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>


                    <script>
                    $( document ).ready(function() {
                      var span = document.createElement("span");
                        
                     swal({
                        title: "Password Changed Successfully!",
                        text: "",
                        icon: "success",
                        closeOnClickOutside: false,
                   }).then(function() {
                            window.location = "logout.php";
                        });

            

                    });
                    $(document).on("click", "#btnA", function() {
                        alert(this.id);
                  });
                   
                  </script>
                    ';
                  }
                  else
                  {
                    echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                
                          <link href="http://tristanedwards.me/u/SweetAlert/lib/sweet-alert.css" rel="stylesheet" />

                          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>


                        <script>
                        $( document ).ready(function() {
                          var span = document.createElement("span");
                            
                         swal({
                            title: "Something Went Wrong!",
                            text: "",
                            icon: "error",
                            closeOnClickOutside: false,
                       })
                

                        });
                        $(document).on("click", "#btnA", function() {
                            alert(this.id);
                      });
                       
                      </script>
                        ';
                  }
          }

      }
     



  }

$currenttime=date('Y-m-d');

$sqlprices="SELECT * FROM `005_fuelprices_prices`"; 
$resprices=mysqli_query($conn,$sqlprices);
$countprices=mysqli_num_rows($resprices);

$getfueldetails=array();

if($countprices>0)
{
  while($rowprices=mysqli_fetch_assoc($resprices))
  {
    array_push($getfueldetails,$rowprices);
    $centerlat=$rowprices['latitude'];
    $centerlong=$rowprices['longitude'];
  }
}


$sqlprices1="SELECT * FROM `005_fuelprices_prices`"; /* WHERE `dateofprice`='$currenttime'*/
$resprices1=mysqli_query($conn,$sqlprices1);
$countprices1=mysqli_num_rows($resprices1);



$output = '';
if(isset($_POST["import"]))
{
 $extension = end(explode(".", $_FILES["excel"]["name"]));
 // For getting Extension of selected file
 $allowed_extension = array("xls", "xlsx", "csv"); //allowed extension
 if(in_array($extension, $allowed_extension)) //check selected file extension is present in allowed extension array
 {
  $file = $_FILES["excel"]["tmp_name"]; // getting temporary source of excel file
  include("phpexcel/Classes/PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
  $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file

  $output .= "<label class='text-success'>Data Inserted</label><br /><table class='table table-bordered'>";
  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
  {
   $highestRow = $worksheet->getHighestRow();
   for($row=2; $row<=$highestRow; $row++)
   {
    $output .= "<tr>";
     $name = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
     $address = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
     $phonenumber = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
     $before6amprice = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
     $after6pmprice = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(4, $row)->getValue());





     $sqlcheck="SELECT * FROM `005_fuelprices_prices` WHERE `address`='$address'";
     $rescheck=mysqli_query($conn,$sqlcheck);
     if(mysqli_num_rows($rescheck)>0)
     {
        $query = "UPDATE `005_fuelprices_prices` SET `before6amprice`='$before6amprice',`after6amprice`='$after6pmprice' WHERE `address`='$address'";
        mysqli_query($conn, $query);
        $updchk="1";
     }
     else
     {
      if($address)
      {
               // Google Maps API Key 
        $GOOGLE_API_KEY = '<<API KEY>>'; 
         
        // Address from which the latitude and longitude will be retrieved 
        /*$address = 'No C/102, 514, near SBI Branch, Mohaddipur, Gorakhpur, Uttar Pradesh 273008'; */
         
        // Formatted address 
        $formatted_address = str_replace(' ', '+', $address); 
         
        // Get geo data from Google Maps API by address 
        $geocodeFromAddr = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address={$formatted_address}&key={$GOOGLE_API_KEY}"); 
         
        // Decode JSON data returned by API 
        $apiResponse = json_decode($geocodeFromAddr); 
         
        // Retrieve latitude and longitude from API data 
         $latitude  = $apiResponse->results[0]->geometry->location->lat;  
         $longitude = $apiResponse->results[0]->geometry->location->lng; 
        $query = "INSERT INTO 005_fuelprices_prices(`dateofprice`,`name`,`address`,`phonenumber`,`before6amprice`,`after6amprice`,`latitude`,`longitude`) VALUES ('".$currenttime."','".$name."','".$address."','".$phonenumber."','".$before6amprice."','".$after6pmprice."','".$latitude."','".$longitude."')";
        mysqli_query($conn, $query);
        $output .= '<td>'.$name.'</td>';
        $output .= '<td>'.$address.'</td>';
      }
       
     }
    
   
    $output .= '</tr>';
   }
  } 
  $output .= '</table>';
if($updchk)
{
  $output = '<label class="text-success">Some Data Updated</label>'; //if non excel file then
}
 }
 else
 {
  $output = '<label class="text-danger">Invalid File</label>'; //if non excel file then
 }
}




$type = (isset($_POST['type'])) ? $_POST['type'] : '';
if($type === "approve_price") {

  $priceId = $_POST['price_id'];
	$sql_getprice = "UPDATE `005_fuelprices_prices` SET `status`=1 WHERE `id`='$priceId'";
	mysqli_query($conn,$sql_getprice);

} elseif ($type === "reject_price") {

  $priceId = $_POST['price_id'];
	$sql_getprice = "UPDATE `005_fuelprices_prices` SET `status`=0 WHERE `id`='$priceId'";
	mysqli_query($conn,$sql_getprice);

} elseif ($type === "approve_station") {

  $stationId = $_POST['station_id'];
	$sql_getprice = "UPDATE `005_fuelprices_stations` SET `status`=1 WHERE `id`='$stationId'";
	mysqli_query($conn,$sql_getprice);
  
} elseif ($type === "reject_station") {
  
  $stationId = $_POST['station_id'];
	$sql_getprice = "UPDATE `005_fuelprices_stations` SET `status`=0 WHERE `id`='$stationId'";
	mysqli_query($conn,$sql_getprice);

} elseif ($type === "approve_feedback") {

  $feedbackId = $_POST['feedback_id'];
	$sql_getprice = "UPDATE `005_fuelprices_feedback` SET `status`=1 WHERE `id`='$feedbackId'";
	mysqli_query($conn,$sql_getprice);

} elseif ($type === "reject_feedback") {

  $feedbackId = $_POST['feedback_id'];
	$sql_getprice = "UPDATE `005_fuelprices_feedback` SET `status`=0 WHERE `id`='$feedbackId'";
	mysqli_query($conn,$sql_getprice);

} elseif ($type === "approve_helpdesk") {

  $helpdeskId = $_POST['helpdesk_id'];
	$sql_getprice = "UPDATE `005_fuelprices_helpdesk` SET `status`=1 WHERE `id`='$helpdeskId'";
	mysqli_query($conn,$sql_getprice);

} elseif ($type === "reject_helpdesk") {

  $helpdeskId = $_POST['helpdesk_id'];
	$sql_getprice = "UPDATE `005_fuelprices_helpdesk` SET `status`=0 WHERE `id`='$helpdeskId'";
	mysqli_query($conn,$sql_getprice);

} elseif ($type === "approve_userprice") {

  $userpriceId = $_POST['userprice_id'];
	$sql_getprice = "UPDATE `005_fuelprices_user_price` SET `status`=1 WHERE `serial_number`='$userpriceId'";
	mysqli_query($conn,$sql_getprice);

} elseif ($type === "reject_userprice") {

  $userpriceId = $_POST['userprice_id'];
	$sql_getprice = "UPDATE `005_fuelprices_user_price` SET `status`=0 WHERE `serial_number`='$userpriceId'";
	mysqli_query($conn,$sql_getprice);

}
?>