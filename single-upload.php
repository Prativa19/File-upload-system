<?php
ob_start();
session_start();

if(isset($_FILES['image']) && !empty($_FILES['image'])){

	$allowed = array("jpeg","jpg","png","gif","bmp");

	$path = "imageuploads/".$_POST['dir'];
	if(!is_dir($path)){
		mkdir($path,0777,true);
	}

//check if file contains error or not
	if($_FILES['image']['error']==0){

		//file size
		if($_FILES['image']['size'] <= 5000000){

			//file type
			$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
			if(in_array(strtolower($ext), $allowed)){
				
				//name
				$file_name = "Image-".date('YmdHis').rand(0,999).".".$ext;   //Eg : Image-20201101237601.jpg

				$success = move_uploaded_file($_FILES['image']['tmp_name'], $path."/".$file_name);
				if($success){
					?>
					<img src="<?php echo $path."/".$file_name; ?>" alt="" style= "max-width: 200px">
					<?php

				}else{
					$_SESSION['error'] = "File could not be uploaded at this moment";
					@header("location:file.php");
					exit();
				}

			}else{
				$_SESSION['error'] = "File format not supported";
				@header("location:file.php");
				exit();
			}

		}else{
			$_SESSION['error']="File size is greater than 5 mb";
			@header("location:file.php");
			exit();
		}
	}else{
		$_SESSION['error']="File contains error";
		@header("location:file.php");
		exit();
	}
}else{
	$_SESSION['error'] ="Upload File first";
	@header("location:file.php");
	exit();
}

ob_flush();
?>