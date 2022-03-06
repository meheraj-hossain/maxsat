<?php 

session_start();

$f_name     = $_POST['f_name'];
$l_name  	= $_POST['l_name'];
$m_email  	= $_POST['m_email'];
$number     = $_POST['number'];
$msg_sub  	= $_POST['msg_sub'];
$c_msg  	= $_POST['c_msg'];


if($f_name == ''){
			$_SESSION['msg']= 'Please insert your first name.<br>';
			header('location:contact.php');
			exit;
		}
if($l_name == ''){
			$_SESSION['msg']= 'Please insert your last name.<br>';
			header('location:contact.php');
			exit;
		}
if($m_email == ''){
			$_SESSION['msg']='Please insert your email address.<br>';
			header('location:contact.php');
			exit;
		}
if($number == ''){
			$_SESSION['msg']= 'Please insert your phone number.<br>';
			header('location:contact.php');
			exit;
		}
if($msg_sub == ''){
			$_SESSION['msg']= 'Please insert the message subject.<br>';
			header('location:contact.php');
			exit;
		}
if($c_msg == ''){
			$_SESSION['msg']='Please write your message.<br>';
			header('location:contact.php');
			exit;
		}

include_once 'dbase_connection.php';
$conect = connect();

$sql="INSERT INTO contact (f_name,l_name,m_email,number,msg_sub,c_msg)
		VALUES ('$f_name','$l_name','$m_email','$number','$msg_sub','$c_msg')";

if($conect->query($sql)){
    $_SESSION['msg']="Your message is sent.";
}else{
    $_SESSION['msg']="Error:".$conect->error;
}

header("location:contact.php");



?>