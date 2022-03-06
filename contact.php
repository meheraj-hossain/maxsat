<?php include_once 'template/header.php'; ?>
<?php include_once 'template/naav.php'; ?>	
            <section class="banner-area organic-breadcrumb">
                <div class="container">
                    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                        <div class="col-first">
                            <h1>Contact Us</h1>
                             <nav class="d-flex align-items-center justify-content-start">
                                <a href="index.php">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                <a href="contact.php">Contact Us</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>


	<!-- Page -->
	<div class="CU">
		<div class="container spad">
			<div class="text-center">
				<h4 class="contact-title">Get in Touch</h4>
			</div>
			  <?php 
		if(isset($_SESSION['msg'])){
			$msg = $_SESSION['msg'];
			unset ($_SESSION['msg']);
		?>
		<h4><img src="img/baseline_done_black_18dp.png"><?php echo $msg; ?></h4>
	<?php } ?>
	<br>
			<form class="contact-form" action="contact_us.php" method="POST">
				<div class="row">
					<div class="col-md-6">
						<input type="text" name="f_name" placeholder="First Name *"> 
					</div>

					<div class="col-md-6">
						<input type="text" name="l_name" placeholder="Last Name *"> 
					</div>
					<div class="col-md-6">
						<input type="email" name="m_email" placeholder="Email *"> 
					</div>
					<div class="col-md-6">
						<input type="Text" name="number" placeholder="Number "> 
					</div>

					<div class="col-md-12">
						<input type="text" name="msg_sub" placeholder="Subject"> 
						<textarea rows="6" placeholder="Message" name="c_msg" ></textarea>
						<div class="text-center">
							<button type="submit" class="genric-btn primary circle">Send Message</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

<?php include_once 'template/footer.php'; ?>	