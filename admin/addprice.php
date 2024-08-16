<?php
include('header.php');
?>

<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3><?php if($priceid){ echo 'Edit'; }else{ echo 'Add'; } ?> Price</h3>
			</div>
		</div>

		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 ">
				<div class="x_panel">
					
					<div class="x_content">
						<br />
						<form method="POST" enctype="multipart/form-data"  class="form-horizontal form-label-left">

							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Date <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="date" name="dateofprice" required="required" class="form-control " value="<?php if($priceid){ echo $rowgetprice['dateofprice']; } else{ echo date('Y-m-d'); } ?>" placeholder="Enter Date">
								</div>
							</div>

							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="name" required="required" class="form-control " placeholder="Enter Name" value="<?php echo $rowgetprice['name']; ?>">
								</div>
							</div>

							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Address <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="address" id="search_google" required="required" class="form-control " placeholder="Enter Address" value="<?php echo $rowgetprice['address']; ?>">
								</div>
							</div>

							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Phone Number <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="tel" name="phonenumber" required="required" class="form-control " placeholder="Enter Phone Number" value="<?php echo $rowgetprice['phonenumber']; ?>">
								</div>
							</div>

							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Before 6am Price <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="number" step="any" name="before6amprice" required="required" class="form-control " placeholder="Enter Before 6am Price" value="<?php echo $rowgetprice['before6amprice']; ?>">
								</div>
							</div>

							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">After 6am Price <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="number" step="any" name="after6amprice" required="required" class="form-control " placeholder="Enter After 6am Price" value="<?php echo $rowgetprice['after6amprice']; ?>">
								</div>
							</div>

							<div class="ln_solid"></div>
							<div class="item form-group">
								<div class="col-md-6 col-sm-6 offset-md-3">
									<button class="btn btn-primary" type="submit" name="btnprice"><?php if($priceid){ echo 'Update'; }else{ echo 'Add'; } ?></button>
								</div>
							</div>

						</form>
						<script>
							var placeSearch, autocomplete,autocompleted;
							var componentForm = {
								street_number: 'short_name',
								route: 'long_name',
								locality: 'long_name',
								administrative_area_level_1: 'short_name',
								country: 'long_name',
								postal_code: 'short_name'
							};

							function initAutocomplete() {
								// Create the autocomplete object, restricting the search to geographical
								// location types.
								autocomplete = new google.maps.places.Autocomplete(
									/** @type {!HTMLInputElement} */(document.getElementById('search_google')),
									{types: ['geocode']});
								autocompleted = new google.maps.places.Autocomplete(
									/* * @type {!HTMLInputElement} */(document.getElementById('search_google2')),
									{types: ['geocode']});
								// When the user selects an address from the dropdown, populate the address
								// fields in the form.
								autocomplete.addListener('place_changed', fillInAddress);
								autocompleted.addListener('place_changed', fillInAddress);
							}

							function fillInAddress() {
							// Get the place details from the autocomplete object.
								var place = autocomplete.getPlace();

								for (var component in componentForm) {
									document.getElementById(component).value = '';
									document.getElementById(component).disabled = false;
								}

								// Get each component of the address from the place details
								// and fill the corresponding field on the form.
								for (var i = 0; i < place.address_components.length; i++) {
									var addressType = place.address_components[i].types[0];
									if (componentForm[addressType]) {
									var val = place.address_components[i][componentForm[addressType]];
									document.getElementById(addressType).value = val;
									}
								}
							}

							// Bias the autocomplete object to the user's geographical location,
							// as supplied by the browser's 'navigator.geolocation' object.
							function geolocate() {
								if (navigator.geolocation) {
									navigator.geolocation.getCurrentPosition(function(position) {
									var geolocation = {
										lat: position.coords.latitude,
										lng: position.coords.longitude
									};
									var circle = new google.maps.Circle({
										center: geolocation,
										radius: position.coords.accuracy
									});
									autocomplete.setBounds(circle.getBounds());
									});
								}
							}
						</script>
						<script src="https://maps.googleapis.com/maps/api/js?key=<<API KEY>>&libraries=places&callback=initAutocomplete"
							async defer></script>
						<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
include('footer.php');
?>