<?php
include('header.php');
?>

			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3> Bulk Upload</h3>
							<h2 style="    margin-bottom: 0px;">Upload Excel Containing ASIN numbers</h2>
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
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Excel <span class="required">*</span>  (<a href="sample/excel.xlsx" download class="btn btn-info" style="padding: 0px;font-size: 12px;">Sample</a>)
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="file" class="form-control" name="excel" id="subject" required placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
											</div>
										</div>

										


										

										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button type="submit" name="import" class="btn btn-primary">Upload</button>
											</div>
										</div>

									</form>


									<div style="margin-top:50px">
										<?php
										if($output)
										{
											echo $output;
										} 
										?>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

<?php
include('footer.php');
?>