<?php 
	session_start();
	if(isset($_GET['custId'])){
			$Customer_ID = $_GET['custId'];
			
			include_once 'dbase_connection.php';
			$conect = connect(); 
			
			$sql = "UPDATE `customer` SET `Status` = 'Activate' WHERE `customer`. cust_id = '$Customer_ID'";
			
			If($conect->query($sql)){
				$_SESSION['msg'] = "User activated successfully.";
			}else{
				$_SESSION['msg'] = "Error ".$conect->error;
			}
	}
header("location:user_manage.php");
?>