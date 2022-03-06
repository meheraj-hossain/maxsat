<?php include_once 'template/header.php'; ?>
<?php include_once 'template/naav.php'; ?>	
            <section class="banner-area organic-breadcrumb">
                <div class="container">
                    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                        <div class="col-first">
                            <h1>Write Blog</h1>
                             <nav class="d-flex align-items-center justify-content-start">
                                <a href="index.php">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                <a href="blog_write.php">Write Blog</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
			
				<div class="CU">
		<div class="container spad">
			<div class="text-center">
				<h4 class="contact-title">Write Blog</h4>
			</div>
				<?php 
		if(isset($_SESSION['msg'])){
			$msg = $_SESSION['msg'];
			
		?>
			 <h4><img src="img/baseline_watch_later_black_18dp.png"><?php echo $msg; ?></h4>
		<?php unset ($_SESSION['msg']);}
		?> <br>
			<form class="contact-form" action="insert_blog.php" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">
						<input type="text" name="b_title" placeholder="Blog title"> 
					</div>

					<div class="col-md-6">
						<input type="text" name="b_name" placeholder="Name"> 
					</div>
				

					<div class="col-md-12"> 
						<textarea placeholder="Blog" name="b_blog" ></textarea>
						<input type="file" name="b_image" style="margin-top:30px;"> 
						<div class="text-center">
							<button type="submit" class="genric-btn primary circle">Send</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
<?php include_once 'template/footer.php'; ?>	