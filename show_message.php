<?php include_once 'template/header.php'; ?>
<?php include_once 'template/naav.php'; ?>	

            <section class="banner-area organic-breadcrumb">
                <div class="container">
                    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                        <div class="col-first">
                            <h1>Messages</h1>
                             <nav class="d-flex align-items-center justify-content-start">
                                <a href="index.php">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a> <a href="#">Admin<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                <a href="show_message.php">Message</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </section> 
			
			<table class="table table-striped" id="table_id">
		<thead>
		  <tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Phone Number</th>
			<th>Sub</th>
			<th>Message</th>
		  </tr>
		</thead>
		<tbody>

		<?php 
			include_once 'dbase_connection.php';
			$conect = connect(); 
				
			$sql = "SELECT * FROM contact ";
			
			$result = $conect->query($sql);
		
		foreach($result AS $row){
		?>
		  <tr>
			<td><?=$row['f_name']?></td>
			<td><?=$row['l_name']?></td>
			<td><?=$row['m_email']?></td>
			<td><?=$row['number']?></td>
			<td><?=$row['msg_sub']?></td>
			<td><?=$row['c_msg']?></td>
		  </tr>

		<?php } ?> 
		</tbody>
	  </table>
			

<?php include_once 'template/footer.php'; ?>