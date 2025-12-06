<?php
session_start();
$_SESSION['msg'] = '';
$msg = $_SESSION['msg'];
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d h:i:s', time());

$connection = mysqli_connect("localhost","root","""","mahalakshmi");

if (isset($_POST['blogsubmit'])) {
	$msg = '';
 	$BlogName = $_POST['BlogName'];
 	$VisitPlace = $_POST['Place'];
 	$BlogDetails = $_POST['BlogDetails'];
 	$Highlights = $_POST['Highlights'];
	$target_dir = "images/blog/";
	$uploadImg = $_FILES["uploadImg"]["name"];
	$tmpuploadImg = $_FILES['uploadImg']['tmp_name'];
	$get = mysqli_query($connection,"SELECT * FROM blogdairy");
	$getnum = mysqli_num_rows($get);
	$Image = $uploadImg;
	//echo $Image;
	$BlogPhotoId = $getnum+1;
	$end = explode(".", basename($Image));
	$extension=end($end);
	$BlogPhotoName=$BlogPhotoId .".".$extension;
	echo $BlogPhotoName;
	$target_file = $target_dir . basename($BlogPhotoName);
	echo "<br>".$target_file."<br>";
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	echo $imageFileType;
	// Check if image file is a actual image or fake image
	if(isset($_POST["blogsubmit"])) {
	  $check = getimagesize($_FILES["uploadImg"]["tmp_name"]);
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
	  if (move_uploaded_file($_FILES["uploadImg"]["tmp_name"], $target_file)) {
	    $msg .= "The file ". htmlspecialchars( basename( $BlogPhotoName)). " has been uploaded.<br>";
	    echo $msg;
	    $insertBlog = mysqli_query($connection,"INSERT INTO blogDairy VALUES ('','$BlogPhotoId','$BlogName','$BlogDetails','$Highlights', '$BlogPhotoId', '$BlogPhotoName', '$VisitPlace', '$date',0)"); 
	  } else {
	    $msg .= "Sorry, there was an error uploading your file and Data is not inserted in Database.<br>";
	    echo $msg;
	  }
	}

	header("Location: blog.php");

}
?>