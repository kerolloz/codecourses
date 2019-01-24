<header class="header-desktop">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="header-wrap">
					<button id="delete-submissions-button" class="btn btn-danger" type="button">
						<i class="zmdi zmdi-delete"></i>
						Delete all submissions
					</button>
				<div class="header-button">
					<div class="noti-wrap">

						<div class="account-wrap">
							<div class="account-item clearfix js-item-menu">

								<div class="content">
									<a class="js-acc-btn" href="../profile">
										<?= $_SESSION['fname'] . ' ' . $_SESSION['lname'] ?>
									</a>
								</div>
								<div class="account-dropdown js-dropdown">

									<div class="account-dropdown__body">
										<div class="account-dropdown__item">
											<a href="../profile">
												<i class="zmdi zmdi-account"></i><?= $_SESSION['username'] ?></a>
										</div>

									</div>
									<div class="account-dropdown__footer">
										<a href="../back/logout.php">
											<i class="zmdi zmdi-power"></i>Logout</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</header>
