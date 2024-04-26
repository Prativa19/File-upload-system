<?php
ob_start();

/*
error
size
type
name
*/

if(isset($_FILES['image']) && !empty($_FILES['image'])){

	$allowed = array("jpeg","jpg","gif","png","bmp");

	$path = "uploads/".$_POST['dir'];
	if(!is_dir($path)){
		mkdir($path,0777,true); //creates dir if it doesn't exist
	}

	//for the length of loop, counting the number of files uploaded
	$num_of_files = count($_FILES['image']['name']);

	$error = 0 ; //assumed value

	//using for loop to upload files at once
	for($i=0; $i < $num_of_files; $i++){
		if($_FILES['image']['error'][$i] == 0){  //error

			if($_FILES['image']['size'][$i] <= 5000000){  //size

				$ext = pathinfo($_FILES['image']['name'][$i],PATHINFO_EXTENSION);  //type
				if(in_array(strtolower($ext), $allowed)){
					$file_name = "Image-".date('YmdHis').rand(0,999).".".$ext;  //name

					$success = move_uploaded_file($_FILES['image']['tmp_name'][$i], $path."/".$file_name);
					if($success){
							?>
								<img src="<?php echo $path."/".$file_name; ?>" alt ="" style="max-width: 150px; margin: 10px;" alt="">
							<?php
					}else{
					   echo "File <em>".$files['name'][$i]."</em> could not be uploaded with unknown reason. <br>";
						 }

				}else{
					echo "File<em>".$_FILES['image']['name'][$i]."</em> is unsupported";
				}
			}else{
				echo "File <em>".$_FILES['image']['name'][$i]."</em> size is greater than 5 mb. <br>";
			}
		}else{
			echo "Files<em>".$_FILES['image']['name'][$i]."</em> contains error.";
		}
	}

}else{
	@header("location:multiple-file.php");
	exit();
}


ob_flush();
?>