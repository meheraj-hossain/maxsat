<?php
session_start();
if($_POST){
$ful_name	=	$_POST['ful_name'];
$mail		=	$_POST['mail'];
$phn		=	$_POST['phn'];
$user_name	=	$_POST['user_name'];
$pass		=	$_POST['pass'];


	if($ful_name == ''){
			$_SESSION['msg1']= 'Please insert your full name.<br>';
			header('location:login.php');
				exit;
			}
			
	if($mail == ''){
			$_SESSION['msg1']= 'Please insert your email.<br>';
			header('location:login.php');
				exit;
			}
	if($phn == ''){
			$_SESSION['msg1']= 'Please insert your phone number.<br>';
			header('location:login.php');
				exit;
			}
	
	if($user_name == ''){
			$_SESSION['msg1']= 'Please insert a user name.<br>';
			header('location:login.php');
				exit;
			}
	if($pass == ''){
			$_SESSION['msg1']= 'Please insert a password.<br>';
			header('location:login.php');
				exit;
			}
	if (strlen($pass ) <= '8') {
		$_SESSION['msg1']= 'Your Password Must Contain At Least 8 Characters!<br>';
		header('location:login.php');
		exit;
	}
	elseif(!preg_match("#[0-9]+#",$pass)) {
		$_SESSION['msg1']= 'Your Password Must Contain At Least 1 Number!<br>';
		header('location:login.php');
		exit;
	}
	elseif(!preg_match("#[A-Z]+#",$pass)) {
		$_SESSION['msg1']= 'Your Password Must Contain At Least 1 Capital Letter!<br>';
		header('location:login.php');
		exit;
	}
	elseif(!preg_match("#[a-z]+#",$pass)) {
		$_SESSION['msg1']= 'Your Password Must Contain At Least 1 Lowercase Letter!<br>';
		header('location:login.php');
		exit;
	}else {

			
		include_once 'dbase_connection.php';
		$conect = connect();

		$sql = "SELECT * FROM customer WHERE cust_username = '$user_name' OR cust_email ='$mail'";
		$output= $conect->query($sql);

		if($output-> num_rows > 0){
			$_SESSION['msg1']= 'Username or email already exists.<br>';
			header('location:login.php');
			exit;
		}else{
			$sql = "INSERT INTO customer (cust_full_name, cust_email, cust_phn, cust_username, cust_pass) VALUES ('$ful_name','$mail','$phn','$user_name','$pass')";
			$conect->query($sql);
			$_SESSION['msg1']= 'Registered Successfully<br>';
			header('location:login.php');
		}
	}

}

?>


