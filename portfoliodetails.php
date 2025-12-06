<?php
session_start();
$_SESSION['msg'] = '';
$msg = $_SESSION['msg'];
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d h:i:s', time());

$connection = mysqli_connect("localhost","root","","mahalakshmi");

if (isset($_POST['FavPicsubmit'])) {
	$msg = '';
 	$FavPicDiscription = $_POST['FavPicDiscription'];
 	$FavPicDate = $_POST['FavPicDate'];
 	$FavPicMindset = $_POST['FavPicMindset'];
	$target_dir = "images/portfolio/";
	$uploadFavePicImg = $_FILES["uploadFavePicImg"]["name"];
	$tmpuploadFavePicImg = $_FILES['uploadFavePicImg']['tmp_name'];
	$get = mysqli_query($connection,"SELECT * FROM mahaselfie");
	$getnum = mysqli_num_rows($get);
	$Image = $uploadFavePicImg;
	//echo $Image;
	$FavPicPhotoId = $getnum+1;
	$end = explode(".", basename($Image));
	$extension=end($end);
	$FavPicPhotoName="port".$FavPicPhotoId .".".$extension;
	echo $FavPicPhotoName;
	$target_file = $target_dir . basename($FavPicPhotoName);
	echo "<br>".$target_file."<br>";
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	echo $imageFileType;
	// Check if image file is a actual image or fake image
	if(isset($_POST["FavPicsubmit"])) {
	  $check = getimagesize($_FILES["uploadFavePicImg"]["tmp_name"]);
	  if($check !== false) {
	  	$msg .= "File is an image - " . $check["mime"] . ".";
	  	echo $msg;
	    $uploadOk = 1;
	  } else {
	  	$msg = "File is not an image.<br>";
	  	echo $msg;
	    $uploadOk = 0;
	  }
	}

	// Check if file already exists
	if (file_exists($target_file)) {
		$msg .= "Sorry, file already exists.<br>";
		echo $msg;
	  $uploadOk = 0;
	}

	// Check file size
	// if ($_FILES["uploadImg"]["size"] > 500000) {
	//   $msg =  "Sorry, your file is too large.<br>";
	//   echo $msg;
	//   $uploadOk = 0;
	// }

	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	  $msg .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
	echo $msg;
	  $uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	  $msg .="Sorry, your file was not uploaded.<br>";
	  echo $msg;
	// if everything is ok, try to upload file
	} else {
	  if (move_uploaded_file($_FILES["uploadFavePicImg"]["tmp_name"], $target_file)) {
	    $msg .= "The file ". htmlspecialchars( basename( $FavPicPhotoName)). " has been uploaded.<br>";
	    echo $msg;
	    $insertFavPic = mysqli_query($connection,"INSERT INTO mahaselfie VALUES ('','$FavPicPhotoName','$FavPicDiscription','$FavPicDate','$FavPicMindset',0)"); 
	  } else {
	    $msg .= "Sorry, there was an error uploading your file and Data is not inserted in Database.<br>";
	    echo $msg;
	  }
	}

	header("Location: portfolio.php");

}
?>