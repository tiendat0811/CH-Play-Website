<?php  
	include_once './views/register.php';
?>
<?php
	if(isset($_POST['register']) && $_POST['register']=='Register'){
		$email = $_POST['email'];
		$fullName = $_POST['fullName'];
		$userName = $_POST['userName'];
		$userPass = md5($_POST['userPass']);
		$register = $crt->register($conn,$email,$fullName,$userName,$userPass);
	}
?>
