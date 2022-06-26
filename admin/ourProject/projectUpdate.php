<!DOCTYPE html>
<html lang="en">
	
<?php

if (basename(__DIR__) != 'admin') {
    $baseUrl = '../';
    $isInternal = true;
} else {
    $baseUrl = '';
    $isInternal = false;
}
include '../includes/head.php';
require '../controller/dbConfig.php';
	
?>			


<body>

	<?php include '../includes/main-nav.php'; ?>



	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold">Victoria Baker</span>
									<div class="text-size-mini text-muted">
										<i class="icon-pin text-size-small"></i> &nbsp;Santa Ana, CA
									</div>
								</div>

								<div class="media-right media-middle">
									<ul class="icons-list">
										<li>
											<a href="#"><i class="icon-cog3"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->
					<?php include '../includes/navigation.php'; ?>
				</div>
			</div>
			<!-- /main sidebar -->

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="index.html"><i class="icon-image-compare position-left"></i> Home</a></li>
							<li><a href="#">Project </a></li>
							<li class="active">Update</li>
						</ul>
					</div>
				</div>
				<!-- /page header -->
				
				<!-- Content area -->
				<div class="content">
					<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Project Update</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<!-- <li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li> -->
			                	</ul>
		                	</div>
						</div>
						<div class="panel-body">	
								
									<?php
											require '../controller/dbConfig.php';
											$project_id = $_GET['project_id'];
											$getSingleDataQry = "SELECT * FROM ourprojects WHERE id={$project_id}";
											$getResult = mysqli_query($dbConnect, $getSingleDataQry);
											?>
																		<form class="form-horizontal" action="../controller/ProjectController.php" method="post">
								<fieldset class="content-group mt-10">

																					<?php
																						if (isset($_GET['msg'])) {
																						?>
																						
																						<div class="alert alert-success no-border">
																						<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
																						<span class="text-semibold">Success!</span> <?php echo $_GET['msg']; ?>
																					</div>
																				<?php }?>


																				<?php
											foreach ($getResult as $key => $project) {
												?>
										<input type="hidden" class="form-control" name="project_id" value="<?php echo $project['id']; ?>">


											<?php
													require '../controller/dbConfig.php';
													$dropdownSelectQry = "SELECT * FROM categories WHERE activeStatus=1";
													$categoryList = mysqli_query($dbConnect, $dropdownSelectQry);
													?>
													<div class="form-group">
															<label class="control-label col-lg-2" for="category_id">Category</label>
															<div class="col-lg-10">
																<select name="category_id" class="form-control" id="category_id">
																	<option value="">Select Category</option>
																<?php

													if (!empty($categoryList)) {
														foreach ($categoryList as $category) {
															?>
																<option value="<?php echo $category['id']; ?>"><?php echo $category['categoryName']; ?></option>
																<?php }}?>
				                            </select>
													</div>
													</div>

										<div class="form-group">
											<label class="control-label col-lg-2" for="projectName">Project Name</label>
											<div class="col-lg-10">
												<input type="text" class="form-control" id="projectName" name="projectName" required value="<?php echo $project['projectName']; ?>">
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-lg-2" for="projectLink">Project Link</label>
											<div class="col-lg-10">
												<input type="text" class="form-control" id="projectLink" name="projectLink" required value="<?php echo $project['projectLink']; ?>">
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-lg-2" for="project_image">Project Thumbnail</label>
											<div class="col-lg-10">
												<input type="file" class="form-control" id="project_image" name="project_image">
											</div>
										</div>
									<?php }?>
								</fieldset>

								<div class="text-right">
									<button type="submit" class="btn btn-primary" name="updateProject">Submit</button>
									<a href="projectList.php" class="btn btn-default">Back To List </a>
								</div>
							</form>
						
						</div>
					</div>
					<!-- /basic datatable -->




					<!-- Footer -->
					<div class="footer text-muted">
						&copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->


		<?php include '../includes/script.php'; ?>
</body>
</html>
