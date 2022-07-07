<?php
	if(isset($_SESSION['level']) && $_SESSION['level']!=''){
		$level = $_SESSION['level'];
		if($level==1){
			include_once './views/admin.php';

		}
		else{
			include './views/user.php';
			if(isset($_POST['updateavt'])){
				if($_FILES['avt']['error'] > 0){
					echo "Upload failed!";
				}
				else{
					$file_part = explode('.',$_FILES['avt']['name']);
					$file_ext = strtolower(end($file_part));
					$expensions	= array("jpeg","jpg","png",'gif');
					if(in_array($file_ext,$expensions)=== false){
						echo "Only JPG, JPEG or PNG files are supported.";
					}else{
						move_uploaded_file($_FILES['avt']['tmp_name'], 'avatar/'.$_FILES['avt']['name']);
						$updateavt = $crt->updateavt($conn, $_FILES['avt']['name']);		 
					}
				}
			}
		}
	}
	else{
		header('Location:index.php');
	}
?>