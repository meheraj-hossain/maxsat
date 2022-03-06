<?php include_once 'template/header.php'; ?>

<?php include_once 'template/naav.php'; ?>

	
            <section class="banner-area organic-breadcrumb">
                <div class="container">
                    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                        <div class="col-first">
                            <h1>Blog</h1>
                             <nav class="d-flex align-items-center justify-content-start">
                                <a href="index.php">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                <a href="blog.php">Blog</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>


	<div class="text-center">
<?php 
						if(isset($_SESSION['loggedin']) && $_SESSION['userRole']!=1){ ?>
		<a href="blog_write.php"><button type="button" class="btn booktraining btn-outline-info"><b>Write a Blog</b></button></a><?php } ?>

	</div><br><br>
		<?php
			include_once 'dbase_connection.php';
			$conect = connect();

			$sql = "SELECT * FROM blog WHERE b_approval ='Approve'";
			$output = $conect->query($sql);
			foreach($output AS $row){

			?>

<div class="container" >
<div class="card mb-3">
  <img  src="img/Blog/<?=$row['b_image']?>" style="height: 800px;width:100%; padding: 30px;" alt="..." >
  <div class="card-body">
    <h2 class="card-title"><?=$row['b_title']?></h2><br>
	    <h4 class="card-title" > <img src="img/baseline_schedule_black_36dp.png"> <?=$row['b_time']?></h4>
	    <h4 class="card-title"><img src="img/baseline_account_circle_black_36dp.png"> <?=$row['b_name']?></h4>
		
    <p class="card-text"><?=$row['b_blog']?> </p>
	 <a href="single-blog.php?blogid=<?php echo $row['blog_id'];?>" class="genric-btn primary circle">Continue Reading</a>
  </div>
</div>
</div>
<?php } ?>


  <?php include_once 'template/footer.php'; ?>