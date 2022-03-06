<?php
session_start();
$p_title = $_POST['p_title'];
$p_price = $_POST['p_price'];
$p_size = $_POST['p_size'];
$p_type = $_POST['p_type'];
$p_desc = $_POST['p_desc'];


if($p_title == ''){
	$_SESSION['msg'] = 'Insert product title.<br>';
	header('location:product_entry_form.php');
	exit;
	}
	
if($p_price == ''){
	$_SESSION['msg'] = 'Insert product price. <br>';
	header('location:product_entry_form.php');
	exit;
	}
if($p_desc == ''){
	$_SESSION['msg'] = 'Insert product price. <br>';
	header('location:product_entry_form.php');
	exit;
	}


	
	//---- Image Upload 
	$_SESSION['msg'] = '';
	$target_dir = "img/product/";
	$fileName= basename($_FILES["F_file"]["name"]);
	$target_file = $target_dir . $fileName;
	
	$uploadOk = 1; // Flag
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["F_file"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			$_SESSION['msg'] = "File is not an image.<br>";
			$uploadOk = 0;
		}
	}
	
	// Check if file already exists
	if (file_exists($target_file)) {
		$_SESSION['msg'] = "Sorry, file already exists.<br>";
		$uploadOk = 0;
	}
	
	// Check file size
	if ($_FILES["F_file"]["size"] > 500000000) {
		$_SESSION['msg'] = "Sorry, your file is too large.<br>";
		$uploadOk = 0;
	}
	
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
		$_SESSION['msg'] = "Sorry, only JPG,PNG and JPEG files are allowed.";
		$uploadOk = 0;
	}
	
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		$_SESSION['msg'] = "Sorry, your file was not uploaded.";
		header('location:product_entry_form.php');
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["F_file"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["F_file"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}	
	
	//---- End of Image Upload

	
		include_once 'dbase_connection.php';
	$conect = connect();
	
	$sql = "INSERT INTO products(p_title,p_price,p_size,p_file,p_type,p_desc)
			VALUES ('$p_title','$p_price','$p_size','$fileName','$p_type','$p_desc')";
			
	
	if($conect->query($sql)){
		$_SESSION['msg'] = 'product added successfully.';
	}else{
		$_SESSION['msg'] = 'Not Added. '.$conect->error;
	}
	header('location:product_entry_form.php');
?>