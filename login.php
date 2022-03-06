<?php include_once 'template/header.php'; ?>
<?php include_once 'template/naav.php'; ?>	
            <!-- End Header Area -->

            <!-- Start Banner Area -->
            <section class="banner-area organic-breadcrumb">
                <div class="container">
                    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                        <div class="col-first">
                            <h1>Login or Registration</h1>
                             <nav class="d-flex align-items-center justify-content-start">
                                <a href="index.php">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                <a href="login.php">Login or Registration</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Banner Area -->

		<!-- Start My Account -->
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="login-form">
						<h3 class="billing-title text-center">Login</h3>
						<?php 
					if(!isset($_COOKIE['loginCounter'])){?>
						<p class="text-center mt-80 mb-40">Welcome back! Sign in to your account </p>
													<?php 
			if(isset($_SESSION['msg'])){
				$msg = $_SESSION['msg'];
				unset ($_SESSION['msg']);
			?>
		<h5><img src="img/baseline_error_black_18dp.png " style="margin-left:150px;"><?php echo $msg; ?></h5>
		<?php } ?>
						<form action="UserLogin.php" method ="POST">
							<input type="text" name="email" placeholder="Username or Email*"required class="common-input mt-20">
							<input type="password"  name="Pass" placeholder="Password*" required class="common-input mt-20">
							<button class="view-btn color-2 mt-20 w-100"><span>Login</span></button>
							
						</form>
						<?php }else{ ?> 
						<h5 style="margin-left:40%;"><img src="img/baseline_error_black_18dp.png"> <?php echo "No result found";?> </h5> <?php } ?>
					</div>
				</div>
				<div class="col-md-6">
					<div class="register-form">
						<h3 class="billing-title text-center">Register</h3>
							<?php 
			if(isset($_SESSION['msg1'])){
				$msg1 = $_SESSION['msg1'];
				unset ($_SESSION['msg1']);
			?>
			<h5><img src="img/baseline_done_black_18dp.png "style="margin-left:120px;"><?php echo $msg1; ?></h5>
		<?php } ?>
						<form action="UserReg.php" method = "POST">
							<input type="text" name = "ful_name" placeholder="Full name*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Full name*'" required class="common-input mt-20">
							<input type="email" name = "mail" placeholder="Email address*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Email address*'" required class="common-input mt-20">
							<input type="text" name = "phn" placeholder="Phone number*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Phone number*'" required class="common-input mt-20">
							<input type="text" name = "user_name" placeholder="Username*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Username*'" required class="common-input mt-20">
							<input type="password" name = "pass" placeholder="Password*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Password*'" required class="common-input mt-20">
							<button class="view-btn color-2 mt-20 w-100"><span>Register</span></button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- End My Account -->
		



<?php include_once 'template/footer.php'; ?>	