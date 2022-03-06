<?php include_once 'template/header.php'; ?>
<?php include_once 'template/naav.php'; ?>	

            <section class="banner-area organic-breadcrumb">
                <div class="container">
                    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                        <div class="col-first">
                            <h1>Manage user</h1>
                             <nav class="d-flex align-items-center justify-content-start">
                                <a href="index.php">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a> <a href="#">Admin<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                <a href="user_manage.php">Manage user</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </section> 

				<?php 
		if(isset($_SESSION['msg'])){
			$msg = $_SESSION['msg'];
			
		?>
		 <h5><img src="img/baseline_done_black_18dp.png"><?php echo $msg; ?></h5>
		<?php unset ($_SESSION['msg']);}
		?>
<br>
<table class="table table-striped" id="table_id">
		<thead>
		  <tr>
			<th>Full Name</th>
			<th>Username</th>
			<th>Email</th>
			<th>User Role</th>
			<th>Status</th>
		  </tr>
		</thead>
		<tbody>

		<?php 
			include_once 'dbase_connection.php';
			$conect = connect(); 
				
			$sql = "SELECT * FROM customer WHERE cust_username != 'admin'";
			
			$result = $conect->query($sql);
		
		foreach($result AS $row){
		?>
		  <tr>
			<td><?=$row['cust_full_name']?></td>
			<td><?=$row['cust_username']?></td>
			<td><?=$row['cust_email']?></td>
			<td><?=$row['cust_role']?></td>
			<td><?=$row['Status']?></td>
			<td>
				<a class="view-btn color-2" href="deactivate_user.php?custId=<?=$row['cust_id']?>"> <span>Deactivate </span></a>
				<a class="view-btn color-2" href="activate_user.php?custId=<?=$row['cust_id']?>"><span>Activate</span></a>
			</td>
		  </tr>

		<?php } ?> 
		</tbody>
	  </table>


<?php include_once 'template/footer.php'; ?>