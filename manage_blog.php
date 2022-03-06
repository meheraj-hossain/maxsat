<?php include_once 'template/header.php'; ?>
<?php include_once 'template/naav.php'; ?>	

            <section class="banner-area organic-breadcrumb">
                <div class="container">
                    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                        <div class="col-first">
                            <h1>Manage Blogs</h1>
                             <nav class="d-flex align-items-center justify-content-start">
                                <a href="index.php">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a> <a href="#">Admin<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                <a href="manage_blog.php">Manage Blogs</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </section> 

				<?php 
		if(isset($_SESSION['msg'])){
			$msg = $_SESSION['msg'];
			
		?>
			<h4><img src="img/baseline_done_black_18dp.png"><?php echo $msg; ?></h4>
		<?php unset ($_SESSION['msg']);}
		?>
<br>
<table class="table table-striped" id="table_id">
		<thead>
		  <tr>
			<th>Title</th>
			<th>Name</th>
			<th>Blog</th>
			<th>Image</th>
			<th>Approval</th>
		  </tr>
		</thead>
		<tbody>

		<?php 
			include_once 'dbase_connection.php';
			$conect = connect(); 
				
			$sql = "SELECT * FROM blog";
			
			$result = $conect->query($sql);
		
		foreach($result AS $row){
		?>
		  <tr>
			<td><?=$row['b_title']?></td>
			<td><?=$row['b_name']?></td>
			<td><?=$row['b_blog']?></td>
			<td><?=$row['b_image']?></td>
			<td><?=$row['b_approval']?></td>
			<td>
				<a class="view-btn color-2" href="single_blog.php?blogid=<?=$row['blog_id']?>"> <span>Single blog</span></a>
				<a class="view-btn color-2" href="approve_blog.php?blogid=<?=$row['blog_id']?>"><span>Approve</span></a>
				<a class="view-btn color-2" href="delete_blog.php?blogid=<?=$row['blog_id']?>"><span>Delete</span></a>
			</td>
		  </tr>

		<?php } ?> 
		</tbody>
	  </table>


<?php include_once 'template/footer.php'; ?>