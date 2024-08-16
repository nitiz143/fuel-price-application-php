<?php
include('header.php');
?>

			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Change Password</h3>
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
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Old Password <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="password" name="opass" required="required" class="form-control " placeholder="Enter Old Password">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">New Password <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="password" name="npass" required="required" class="form-control "  placeholder="Enter New Password">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Re-enter New Password <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="password" name="cpass" required="required" class="form-control "  placeholder="Enter New Password Again">
											</div>
										</div>


										<!-- <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Brand <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="brandid" required class="form-control">
													<option>Select Brand</option>
													<?php
													while($rowBrand=mysqli_fetch_assoc($resBrand))
													{
														?>
															<option value="<?php echo $rowBrand['id']; ?>"><?php echo $rowBrand['brandname']; ?></option>
														<?php
													} 
													?>
													
												</select>
											</div>
										</div> -->

										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary" type="submit" name="btnreset">Reset</button>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

<?php
include('footer.php');
?>