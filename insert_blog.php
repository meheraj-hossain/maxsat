<?php
session_start();
$b_title = $_POST['b_title'];
$b_name = $_POST['b_name'];
$b_blog = $_POST['b_blog'];


if($b_title == ''){
	$_SESSION['msg'] = 'Insert blog title.<br>';
	header('location:blog_write.php');
	exit;
	}
	
if($b_name == ''){
	$_SESSION['msg'] = 'Insert writer name. <br>';
	header('location:blog_write.php');
	exit;
	}	

if($b_blog == ""){
	$_SESSION['msg'] = 'write something first.<br>';
	header('location:blog_write.php');
	exit;
	}
	
	
	//---- Image Upload 
	$_SESSION['msg'] = '';
	$target_dir = "img/blog/";
	$fileName= basename($_FILES["b_image"]["name"]);
	$target_file = $target_dir . $fileName;
	
	$uploadOk = 1; // Flag
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["b_image"]["tmp_name"]);
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
	if ($_FILES["b_image"]["size"] > 500000000) {
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
		header('location:blog_write.php');
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["b_image"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["b_image"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}	
	
	//---- End of Image Upload
			include_once 'dbase_connection.php';
	$conect = connect();
	
	$sql = "INSERT INTO blog(b_title,b_name,b_blog,b_image)
			VALUES ('$b_title','$b_name','$b_blog','$fileName')";
			
	
	if($conect->query($sql)){
		$_SESSION['msg'] = 'Blog is pending.';
	
	}else{
		$_SESSION['msg'] = 'Not Added. '.$conect->error;
	}
	header('location:blog_write.php');
