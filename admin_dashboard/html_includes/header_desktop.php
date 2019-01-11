<header class="header-desktop">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="header-wrap">
				<form class="form-header" action="" method="POST">
					<input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports...">
					<button class="au-btn--submit" type="submit">
						<i class="zmdi zmdi-search"></i>
					</button>
				</form>
				<div class="header-button">
					<div class="noti-wrap">

						<div class="account-wrap">
							<div class="account-item clearfix js-item-menu">

								<div class="content">
									<a class="js-acc-btn" href="#">
										<?= $_SESSION['username'] ?></a>
								</div>
								<div class="account-dropdown js-dropdown">
									<div class="info clearfix">
										<div class="content">
											<h5 class="name">
												<a href="../profile"></a>
											</h5>
											<span class="email">
												<?= $_SESSION['fname'] . ' ' . $_SESSION['lname'] ?></span>
										</div>
									</div>
									<div class="account-dropdown__body">
										<div class="account-dropdown__item">
											<a href="#">
												<i class="zmdi zmdi-account"></i>Profile</a>
										</div>

									</div>
									<div class="account-dropdown__footer">
										<a href="#">
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
