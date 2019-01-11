<?php
if (isset($_POST['submit'])) {
	$Error = null;
    require '../back/contest_creation.php';
}

?>

<!DOCTYPE html>
<html lang="en">

<?php require 'html_includes/head.html'; ?>

<body class="animsition">

	<div class="page-wrapper">

		<<?php require 'html_includes/menu_sidebar.html'; ?>

		<!-- PAGE CONTAINER-->
		<div class="page-container">

			<?php require 'html_includes/header_desktop.php'; ?>

			<!-- MAIN CONTENT-->
			<div class="main-content">

				<div class="section__content section__content--p30">
					<div class="container-fluid">
						<div class="row">

							<div class="col-lg-12">
								<div class="card">
									<div class="card-header">
										<strong>Contest </strong> Form
									</div>
									<div class="card-body card-block">
										<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
											<div class="row form-group">
												<div class="col col-md-3">
													<label for="text-input" class=" form-control-label">Setter</label>
												</div>
												<div class="col-12 col-md-9">
													<input type="text" id="text-input" name="contest_setter" placeholder="Setter" class="form-control" required autofocus>
												</div>
											</div>
											<div class="row form-group">
												<div class="col col-md-3">
													<label for="text-input" class=" form-control-label">Contest Name</label>
												</div>
												<div class="col-12 col-md-9">
													<input type="text" id="text-input" name="contest_name" placeholder="Contest Name" class="form-control" required>
												</div>
											</div>
											<div class="row form-group">
												<div class="col col-md-3">
													<label for="text-input" class=" form-control-label">Date</label>
												</div>
												<div class="col-12 col-md-9">
													<input type="date" id="date-field" name="contest_date" class="form-control" required>
												</div>

											</div>
											<div class="row form-group">
												<div class="col col-md-3">
													<label for="text-input" class=" form-control-label">Time</label>
												</div>
												<div class="col-12 col-md-9">
													<input type="time" id="time-field" name="contest_time" class="form-control" required>
												</div>

											</div>
											<div class="row form-group">
												<div class="col col-md-3">
													<label for="text-input" class=" form-control-label">Duration in minutes</label>
												</div>
												<div class="col-12 col-md-9">
													<input type="number" id="text-input" name="contest_length" class="form-control" min="30" required>
												</div>
											</div>

											<div class="card-footer">
												<button type="submit" name="submit" class="btn btn-primary btn-sm">
													<i class="fa fa-dot-circle-o"></i> Create
												</button>
											</div>
										</form>
									</div>


								</div>
								<?php
					            if(!isset($Error) && isset($_POST['submit'])):
					            ?>
								<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
									<span class="badge badge-pill badge-success">Success</span>
									You successfully created this Contest.
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<?php
								elseif (isset($Error)):
								?>
								<div class="alert alert-danger" role="alert">
									<?=  $Error ?>
									Please make sure MySQL Database is working properly.

								</div>
								<?php
								endif;
								?>
							</div>

						</div>
					</div>
				</div>
			</div>

		</div>

		<?php require 'html_includes/scripts.html'; ?>

</body>

</html>
<!-- end document-->
