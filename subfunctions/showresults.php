<?php
session_start();
error_reporting(0);
include('../include/db.php');
include('../include/keys.php');
if(isset($_POST['action']) && $_POST['action'] == 'alertquerydplans' ) {
        $currenttime=date('Y-m-d');
        $searchadd=$_POST['searchadd'];
        if($searchadd)
        {
            $sqlprices="SELECT * FROM `005_fuelprices_prices` WHERE `status` = 1 AND `address` LIKE '%$searchadd%'"; 
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


            $sqlprices1="SELECT * FROM `005_fuelprices_prices` WHERE `status` = 1 AND `address` LIKE '%$searchadd%'"; /* WHERE `dateofprice`='$currenttime'*/
            $resprices1=mysqli_query($conn,$sqlprices1);
            $countprices1=mysqli_num_rows($resprices1);
        }
        else
        {
            $currenttime=date('Y-m-d');

            $sqlprices="SELECT * FROM `005_fuelprices_prices` WHERE `status` = 1"; 
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


            $sqlprices1="SELECT * FROM `005_fuelprices_prices` WHERE `status` = 1"; /* WHERE `dateofprice`='$currenttime'*/
            $resprices1=mysqli_query($conn,$sqlprices1);
            $countprices1=mysqli_num_rows($resprices1);
        }
        
       

       
        ?>
        <style>
            #map {
                height: 600px;
                width: 100%;
            }
            .pumpbefore6am{
              font-size: .875rem;
              color: white;
              padding: 6px;
              font-weight:900;
              text-align: center;
              background: #007f84;
            }
            .pumpafter6am{
              font-size: .875rem;
              color: white;
              font-weight:900;
              padding: 5px;
              text-align: center;
              background: #e10004;
            }
            .pumpname{
                  width: 65px;
              font-size: 8px;
              color: brown;
              padding: 8px;
              text-align: center;
              font-weight:900;
            }
            .pumpgetdirections{
              font-size: 10px;
            }
            .gm-style .gm-style-iw-c {
              padding: 0px;
            }
            .gm-style .gm-style-iw-d {
                display: contents;
            }
            button.gm-ui-hover-effect {
                display: none !important;
            }
        </style>
        <script>
            var map;
            var InforObj = [];
            var centerCords = {
                lat: <?php echo $centerlat; ?>,
                lng: <?php echo $centerlong; ?>
            };
            var markersOnMap = [
              <?php
              if($countprices>0)
              {
                  foreach($getfueldetails as $temp)
                  {
                    ?>
                       {
                        placeName: "<div class='pumpbefore6am'><?php echo $temp['before6amprice']; ?></div><div class='pumpafter6am'><?php echo $temp['after6amprice']; ?></div><div class='pumpname'><?php echo $temp['name']; ?></div>",
                                          LatLng: [{
                                              lat: <?php echo $temp['latitude']; ?>,
                                              lng: <?php echo $temp['longitude']; ?>
                                          }],
                        idofmap: <?php echo $temp['id']; ?>
                        },
                    <?php
                  } 
              }

              ?>
                
               
            ];

            window.onload = function () {
                initMap();
            };

            function addMarkerInfo() {
                for (var i = 0; i < markersOnMap.length; i++) {
                    var contentString = '<div style="cursor: pointer;" class="contentmarker" onclick="myFunction('+markersOnMap[i].idofmap+')" id="content'+markersOnMap[i].idofmap+'">' + markersOnMap[i].placeName +
                        '</div>';

                    const marker = new google.maps.Marker({
                        position: markersOnMap[i].LatLng[0],
                        map: map
                    });

                    const infowindow = new google.maps.InfoWindow({
                        content: contentString,
                        maxWidth: 200
                    });

                   /* marker.addListener('click', function () {*/
                       // closeOtherInfo();
                        infowindow.open(marker.get('map'), marker);
                        InforObj[0] = infowindow;
                    /*});*/
                        marker.addListener('click', function () {
                       // closeOtherInfo();
                        infowindow.open(marker.get('map'), marker);
                        InforObj[0] = infowindow;
                    });
                    // marker.addListener('mouseover', function () {
                    //     closeOtherInfo();
                    //     infowindow.open(marker.get('map'), marker);
                    //     InforObj[0] = infowindow;
                    // });
                    // marker.addListener('mouseout', function () {
                    //     closeOtherInfo();
                    //     infowindow.close();
                    //     InforObj[0] = infowindow;
                    // });
                }
            }
            function myFunction(p1){
            // alert(p1);
              //jQuery(".sidebarcontents").hide();
             //document.getElementsByClassName("sidebarcontents").style.visibility = 'hidden'; 
              /*var y =document.getElementsByClassName("sidebarcontents");
              x.style.display = "none";*/
              for (var h = 0; h < markersOnMap.length; h++) {
            document.getElementsByClassName('sidebarcontents')[h].style.display = 'none';
            document.getElementsByClassName('sidebara')[h].style.display = 'none';
              }
              var x = document.getElementsByClassName("sidebarcontent"+p1)[0];
              x.style.display = "block";
            }
            function closeOtherInfo() {
                if (InforObj.length > 0) {
                    /* detach the info-window from the marker ... undocumented in the API docs */
                    InforObj[0].set("marker", null);
                    /* and close it */
                    InforObj[0].close();
                    /* blank the array */
                    InforObj.length = 0;
                }
            }

            function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 17,
                    center: centerCords
                });
                addMarkerInfo();
            }
        </script>

    <!-- ======= Features Section ======= -->
    <section id="features" class="features" style="    margin-top: 20px;min-height: 610px;padding-bottom: 0px !important;">
      <div class="containercc">

        <div class="row">
          <div class="col-lg-3 mb-3 mb-lg-0" data-aos="fade-right" style="overflow-y: scroll;    height: 616px;">
            
            <ul class="nav nav-tabs flex-column">
              
              <?php
              if($countprices>0)
              {
                  foreach($getfueldetails as $temp)
                  {
                    ?>
                    <li class="nav-item">
                      <a class="nav-link active show sidebara sidebar<?php echo $temp['id']; ?>" data-toggle="tab" href="#tab-1">
                        <h4 style="    margin-bottom: 0px;"><?php echo $temp['before6amprice']; ?></h4>
                        <small>Before 6am</small>
                        <h1></h1>
                        <h4 style="    margin-bottom: 0px;"><?php echo $temp['after6amprice']; ?></h4>
                        <small>After 6am</small>
                        <!-- <p><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $temp['phonenumber']; ?></p> -->
                        <p style="    font-weight: 900;"><i class="fa fa-location" aria-hidden="true"></i> <?php echo $temp['name']; ?></p>
                        <p style="font-size:10px"><i class="fa fa-location" aria-hidden="true"></i> <?php echo $temp['address']; ?></p>
                       
                      </a>
                      <!--  <a class='pumpgetdirections' target="_blank" href='http://maps.google.com/?q=<?php echo $temp['address']; ?>'>Get Directions</a> -->
                    </li>
                    <div class="sidebarcontents sidebarcontent<?php echo $temp['id']; ?>" style="padding:15px;border:none;background: transparent;display:none">
                        <div class="row">
                          <div class="col-sm-4" style="margin-top:15px;margin-bottom:15px"><button class="btn btn-primary backbtn" style="font-size: 11px;
    line-height: 0.5;border:1px solid lightgrey"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></div>
                          <div class="col-sm-8" style="margin-top:15px;margin-bottom:15px"><p><?php echo $temp['name']; ?></p></div>
                          <div class="col-sm-12" style="border-top:1px solid lightgrey;border-bottom:1px solid lightgrey"><p style="margin-bottom: 0px;padding-top: 10px;padding-bottom:10px"><i class="fa fa-location-arrow"></i> <?php echo $temp['address']; ?></p></div>
                          <div class="col-sm-12" style="border-top:1px solid lightgrey;border-bottom:1px solid lightgrey"><p style="margin-bottom: 0px;padding-top: 10px;padding-bottom:10px"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $temp['phonenumber']; ?></p></div>
                        </div>
                        <div class="row" style="margin-top:15px;margin-bottom:15px;">
                          <div class="col-sm-12" style=""><h4 style="margin-bottom: 0px;font-family: sans-serif;font-size: 18px;font-weight: 700;padding-bottom:20px">ULP prices</h4>
                            
                          </div>
                          <div class="col-sm-6" style="text-align: center;"><h4 style="    margin-bottom: 0px;    font-family: sans-serif;"><?php echo $temp['before6amprice']; ?></h4>
                             <small>Before 6am</small>
                           </div>
                       
                        
                          <div class="col-sm-6" style="text-align: center;"><h4 style="    margin-bottom: 0px;    font-family: sans-serif;"><?php echo $temp['after6amprice']; ?></h4>
                            <small>After 6am</small>
                          </div>
                          
                        </div>

                        <div class="row" style="padding-top:30px;padding-bottom:30px;border-top:1px solid lightgrey;border-bottom:1px solid lightgrey;">
                          <div class="col-sm-12" ><a class='btn btn-danger' style="background: rebeccapurple;width: 100%;" target="_blank" href='http://maps.google.com/?q=<?php echo $temp['address']; ?>'>Get Directions</a>
                            
                          </div>
                          
                          
                        </div>
                    </div>
                    <script>
                  $(document).ready(function(){
                    $(".sidebar<?php echo $temp['id']; ?>").click(function(){
                      $(".sidebara").hide();
                      $(".sidebarcontent<?php echo $temp['id']; ?>").show();
                    });

                    $(".backbtn").click(function(){
                      $(".sidebarcontents").hide();
                      $(".sidebara").show();
                    });

                    $("#content<?php echo $temp['id']; ?>").click(function(){
                      $(".sidebarcontents").hide();
                      $(".sidebarcontent<?php echo $temp['id']; ?>").show();
                    });
                  });
                  </script>
                    <?php
                  } 
              }
              else
              {
                echo '<p style="text-align:center;margin-top:200px;color:red;font-weight:900">No Data Found</p>';
              }
              ?>
              
              
            </ul>
          </div>
          <div class="col-lg-9 ml-auto" data-aos="fade-left">
            <div class="tab-content">
              <div class="tab-pane active show" id="">
                <figure>
                  <div id="map"></div>
                </figure>
              </div>
              
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Features Section -->

   

  </main><!-- End #main -->
  <script src="https://maps.googleapis.com/maps/api/js?key=<<API KEY>>&callback=initMap" async defer></script>
        <?php
       





}
?>