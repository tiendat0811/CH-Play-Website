<?php  
	include_once './views/login.php';
?>
<?php
	if(isset($_POST['login']) && $_POST['login']=='Sign in'){
		$userName = $_POST['userName'];
		$userPass = md5($_POST['userPass']);
		$check_login = $crt->check_login($conn,$userName,$userPass);
	}
?>

