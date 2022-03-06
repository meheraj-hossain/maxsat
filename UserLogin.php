<?php 
session_start();
	if($_POST){
		$email=$_POST['email'];
		$pass=$_POST['Pass'];
		$_SESSION['msg'] = '';
	
		if(!isset($_SESSION['count'])){
			$_SESSION['count'] = 0;
		}
		
	if($email == ''){
			$_SESSION['msg'] = 'Please insert your Username first.<br>';
			header('location:login.php');exit;
		}
		
	if($pass == ''){
			$_SESSION['msg'] = 'Please insert your Password.<br>';
			header('location:login.php');exit;
	}
	
	include_once 'dbase_connection.php';
	$conect= connect();
	
	$sql = "SELECT * FROM customer WHERE cust_email= '$email' AND cust_pass= '$pass'  OR cust_username= '$email' AND cust_pass= '$pass' ";
	$result = $conect->query($sql);
		
		if($result->num_rows > 0){
			
			foreach($result AS $row){
				$_SESSION['userName'] = $row['cust_username'];
				$_SESSION['userRole'] = $row['cust_role'];
				$_SESSION['userId'] = $row['cust_id'];
			}			
			$_SESSION['loggedin'] = true;
			unset($_SESSION['count']);
							
			header('location:index.php');
		}else{
			$_SESSION['count']++;
			if($_SESSION['count'] >= 3){
				setcookie('loginCounter', true, time() + (60*3));
				$_SESSION['count'] = 0;
			}
			$_SESSION['msg'] = 'Invalid Login.';	
			header('location:login.php');
		}	
	}

?>